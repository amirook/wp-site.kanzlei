( function( api ) {

	// Extends our custom "upgrade-button" section.
	api.sectionConstructor['catch-corporate-upgrade-button'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
