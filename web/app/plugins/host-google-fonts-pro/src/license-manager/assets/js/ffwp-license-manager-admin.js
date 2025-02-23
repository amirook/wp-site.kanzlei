/**
 * @package   Daan.dev License Manager
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2022 Daan van den Bergh. All Rights Reserved.
 */

jQuery(document).ready(function ($) {
    var ffwp_license_manager = {
        init: function () {
            $('.ffwp-deactivate-license').on('click', this.deactivate);
            $('.ffwp-activate-license').on('click', this.activate);
            $('.check-license').on('click', this.check);
            $('#ffwp_install_enc_key').on('click', this.install_enc_key);
        },

        /**
         * Hit our licensing API directly from the browser, to avoid blocks by the Firewall.
         */
        activate: function () {
            let license_key = $(this).siblings('.ffwp-license-key').val();
            let item_id = this.dataset.itemId;
            let plugin_file = $(this).siblings('.ffwp-plugin-file').val();
            let nonce = $('#ffwp_license_manager_nonce').val();

            ffwp_license_manager.show_loader();

            $.ajax({
                type: 'POST',
                url: 'https://daan.dev/?daan_action=activate_license',
                data: {
                    edd_action: 'activate_license',
                    license: license_key,
                    item_id: item_id,
                    url: window.location.origin
                },
                success: function (response) {
                    $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: {
                            item_id: item_id,
                            license: license_key,
                            plugin_file: plugin_file,
                            license_data: response,
                            _wpnonce: nonce,
                            action: 'ffwp_license_manager_activate'
                        },
                        complete: function () {
                            location.reload()
                        }
                    });
                }
            });
        },

        /**
         * Returns a decrypted key.
         *
         * @param key encrypted key.
         * @param item_id item ID.
         * @param nonce a valid nonce.
         */
        decrypt: async function (key, item_id, nonce) {
            let response = await ffwp_license_manager.get_decryption_response(key, item_id, nonce);

            return ffwp_license_manager.get_decrypted_key(response);
        },

        /**
         * Fetches the response from the decrypt API.
         *
         * @param key
         * @param item_id
         * @param nonce
         * @returns {*|jQuery}
         */
        get_decryption_response: function (key, item_id, nonce) {
            return $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    item_id: item_id,
                    license_key: key,
                    _wpnonce: nonce,
                    action: 'ffwp_license_manager_decrypt'
                }
            });
        },

        /**
         * Get decrypted key from response.
         *
         * @param response
         * @returns {string}
         */
        get_decrypted_key: function (response) {
            let decrypted_key = '';

            if (response.data !== undefined && response.data.key !== undefined) {
                decrypted_key = response.data.key;
            }

            return decrypted_key;
        },

        /**
         * Loading spinner.
         */
        show_loader: function () {
            $('#wpwrap').append('<div style="background: rgba(255,255,255,0.5); height: 100%; width: 100%; position: absolute; top: 0;"><span style="position: absolute; top: 50%; left: 50%;" class="spinner is-active"></span></div>');
        },

        /**
         * Trigger deactivate method to remove key from db and call deactivate API.
         */
        deactivate: async function () {
            let key = $(this).data('key');
            let item_id = $(this).data('item-id');
            let nonce = $('#ffwp_license_manager_nonce').val();

            if (!key || !item_id || !nonce) {
                return;
            }

            key = await ffwp_license_manager.decrypt(key, item_id, nonce);

            ffwp_license_manager.show_loader();

            $.ajax({
                type: 'POST',
                url: 'https://daan.dev/?daan_action=deactivate_license',
                data: {
                    edd_action: 'deactivate_license',
                    license: key,
                    item_id: item_id,
                    url: window.location.origin
                },
                success: function (response) {
                    $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: {
                            response: response,
                            item_id: item_id,
                            _wpnonce: nonce,
                            action: 'ffwp_license_manager_deactivate'
                        },
                        complete: function () {
                            location.reload()
                        }
                    });
                }
            });
        },

        /**
         * Refresh license information.
         */
        check: async function () {
            let key = $(this).data('key');
            let item_id = $(this).data('item-id');
            let nonce = $(this).data('nonce') ?? $('#ffwp_license_manager_nonce').val();

            if (!key || !item_id || !nonce) {
                return;
            }

            key = await ffwp_license_manager.decrypt(key, item_id, nonce);

            let plugin_file = $(this).data('plugin-file') ?? $(this).parents('p').siblings('.ffwp-plugin-file').val();

            ffwp_license_manager.show_loader();

            $.ajax({
                type: 'POST',
                url: 'https://daan.dev/?daan_action=check_license',
                data: {
                    edd_action: 'check_license',
                    license: key,
                    item_id: item_id,
                    url: window.location.origin
                },
                success: function (response) {
                    $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: {
                            item_id: item_id,
                            license: key,
                            plugin_file: plugin_file,
                            license_data: response,
                            _wpnonce: nonce,
                            action: 'ffwp_license_manager_check'
                        },
                        complete: function () {
                            location.reload()
                        }
                    });
                }
            });
        },

        install_enc_key: function () {
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: 'ffwp_license_manager_install_enc_key'
                },
                complete: function () {
                    /**
                     * Hack to make sure the notice is expired.
                     */
                    setTimeout('location.reload()', 5000);
                }
            });
        }
    }

    ffwp_license_manager.init();
});