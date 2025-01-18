<div id="post-<?php the_ID(); ?>" class=" <?php get_post_class() ?> wp-block wp-block-kubio-query-layout  position-relative wp-block-kubio-query-layout__outer dacnis-single__k__single-lAFSH8Xo9x-outer dacnis-local-721-outer d-flex h-section-global-spacing align-items-lg-center align-items-md-center align-items-center" data-kubio="kubio/query-layout" id="blog-layout">
	<div class="position-relative wp-block-kubio-query-layout__inner dacnis-single__k__single-lAFSH8Xo9x-inner dacnis-local-721-inner h-section-grid-container h-section-boxed-container">
		<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container dacnis-single__k__single-baLWB4dRKjp-container dacnis-local-722-container gutters-row-lg-1 gutters-row-v-lg-0 gutters-row-md-1 gutters-row-v-md-0 gutters-row-3 gutters-row-v-0" data-kubio="kubio/row">
			<div class="position-relative wp-block-kubio-row__inner dacnis-single__k__single-baLWB4dRKjp-inner dacnis-local-722-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-1 gutters-col-v-lg-0 gutters-col-md-1 gutters-col-v-md-0 gutters-col-3 gutters-col-v-0">
				<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-single__k__single-kxeqsSpdy-n-container dacnis-local-723-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner dacnis-single__k__single-kxeqsSpdy-n-inner dacnis-local-723-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-0 h-px-md-2 v-inner-md-3 h-px-2 v-inner-0">
						<div class="position-relative wp-block-kubio-column__align dacnis-single__k__single-kxeqsSpdy-n-align dacnis-local-723-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
							<figure class="wp-block wp-block-kubio-post-featured-image  position-relative wp-block-kubio-post-featured-image__container dacnis-single__k__single-rlYTEhTMib-container dacnis-local-724-container h-aspect-ratio--16-9 <?php dacnis_post_missing_featured_image_class(); ?>" data-kubio="kubio/post-featured-image" data-kubio-settings="{{kubio_settings_value}}">
								<?php if(has_post_thumbnail()): ?>
								<img class='position-relative wp-block-kubio-post-featured-image__image dacnis-single__k__single-rlYTEhTMib-image dacnis-local--image' src='<?php echo esc_url(get_the_post_thumbnail_url());?>' />
								<?php endif; ?>
								<div class="position-relative wp-block-kubio-post-featured-image__inner dacnis-single__k__single-rlYTEhTMib-inner dacnis-local-724-inner">
									<div class="position-relative wp-block-kubio-post-featured-image__align dacnis-single__k__single-rlYTEhTMib-align dacnis-local-724-align h-y-container align-self-lg-end align-self-md-end align-self-end"></div>
								</div>
							</figure>
							<div class="wp-block wp-block-kubio-post-meta  position-relative wp-block-kubio-post-meta__metaDataContainer dacnis-single__k__7IT84Ddn9-metaDataContainer dacnis-local-725-metaDataContainer h-blog-meta" data-kubio="kubio/post-meta" id="post-metadata">
								<span class="metadata-item">
									<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>">
										<?php echo esc_html(get_the_author_meta("display_name",get_post_field("post_author"))); ?>
									</a>
								</span>
								<span class="metadata-separator">
									-
								</span>
								<span class="metadata-item">
									<a href="<?php echo esc_url(get_day_link(get_post_time( 'Y' ),get_post_time( 'm' ),get_post_time( 'j' ))); ?>">
										<?php echo esc_html(get_the_date('j F Y')); ?>
									</a>
								</span>
								<span class="metadata-separator">
									-
								</span>
								<span class="metadata-item">
									<a href="">
										<?php echo esc_html(get_the_time()); ?>
									</a>
								</span>
							</div>
							<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container dacnis-single__k__single-SbdKxHs2YI-container dacnis-local-726-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/row">
								<div class="position-relative wp-block-kubio-row__inner dacnis-single__k__single-SbdKxHs2YI-inner dacnis-local-726-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-0 gutters-col-v-0">
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-single__k__single-3VGwAjm9cX-container dacnis-local-727-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner dacnis-single__k__single-3VGwAjm9cX-inner dacnis-local-727-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-0 h-px-md-0 v-inner-md-0 h-px-0 v-inner-0">
											<div class="position-relative wp-block-kubio-column__align dacnis-single__k__single-3VGwAjm9cX-align dacnis-local-727-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container dacnis-single__k__oBH0ABWoeL-container dacnis-local-728-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/row">
								<div class="position-relative wp-block-kubio-row__inner dacnis-single__k__oBH0ABWoeL-inner dacnis-local-728-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-0 gutters-col-v-0">
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-single__k__wETEbWZUNc-container dacnis-local-729-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner dacnis-single__k__wETEbWZUNc-inner dacnis-local-729-inner d-flex h-flex-basis h-px-lg-3 v-inner-lg-3 h-px-md-3 v-inner-md-3 h-px-3 v-inner-3">
											<div class="position-relative wp-block-kubio-column__align dacnis-single__k__wETEbWZUNc-align dacnis-local-729-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<p class="wp-block wp-block-kubio-text  position-relative wp-block-kubio-text__text dacnis-single__k__single-1pwRcGAnh-text dacnis-local-730-text" data-kubio="kubio/text">
													<?php esc_html_e('CATEGORIES:', 'dacnis'); ?>
												</p>
												<div class="wp-block wp-block-kubio-post-categories  position-relative wp-block-kubio-post-categories__container dacnis-single__k__up5pQ_Cww-container dacnis-local-731-container kubio-post-categories-container" data-kubio="kubio/post-categories">
													<div class="position-relative wp-block-kubio-post-categories__placeholder dacnis-single__k__up5pQ_Cww-placeholder dacnis-local-731-placeholder kubio-post-categories-placeholder"></div>
													<div class="position-relative wp-block-kubio-post-categories__tags dacnis-single__k__up5pQ_Cww-tags dacnis-local-731-tags">
														<?php dacnis_categories_list(__('No category', 'dacnis')); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container dacnis-single__k__single-1uGRU27HVz-container dacnis-local-732-container gutters-row-lg-0 gutters-row-v-lg-1 gutters-row-md-0 gutters-row-v-md-1 gutters-row-0 gutters-row-v-1" data-kubio="kubio/row">
								<div class="position-relative wp-block-kubio-row__inner dacnis-single__k__single-1uGRU27HVz-inner dacnis-local-732-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-start justify-content-md-start justify-content-start gutters-col-lg-0 gutters-col-v-lg-1 gutters-col-md-0 gutters-col-v-md-1 gutters-col-0 gutters-col-v-1">
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-single__k__single-K4Akm2YNqS-container dacnis-local-733-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner dacnis-single__k__single-K4Akm2YNqS-inner dacnis-local-733-inner d-flex h-flex-basis h-px-lg-3 v-inner-lg-3 h-px-md-3 v-inner-md-3 h-px-3 v-inner-3">
											<div class="position-relative wp-block-kubio-column__align dacnis-single__k__single-K4Akm2YNqS-align dacnis-local-733-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<p class="wp-block wp-block-kubio-text  position-relative wp-block-kubio-text__text dacnis-single__k__single-1pwRcGAnh-text dacnis-local-734-text" data-kubio="kubio/text">
													<?php esc_html_e('Tags:', 'dacnis'); ?>
												</p>
												<div class="wp-block wp-block-kubio-post-tags  position-relative wp-block-kubio-post-tags__container dacnis-single__k__single-tlSt_AyBi-container dacnis-local-735-container kubio-post-tags-container" data-kubio="kubio/post-tags">
													<div class="position-relative wp-block-kubio-post-tags__placeholder dacnis-single__k__single-tlSt_AyBi-placeholder dacnis-local-735-placeholder kubio-post-tags-placeholder"></div>
													<div class="position-relative wp-block-kubio-post-tags__tags dacnis-single__k__single-tlSt_AyBi-tags dacnis-local-735-tags">
														<?php dacnis_tags_list(__('No tags', 'dacnis')); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php if(dacnis_has_pagination()): ?>
							<div class="wp-block wp-block-kubio-query-pagination  position-relative wp-block-kubio-query-pagination__container dacnis-single__k__single-nqLiVZCaYo-container dacnis-local-736-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/query-pagination">
								<div class="position-relative wp-block-kubio-query-pagination__inner dacnis-single__k__single-nqLiVZCaYo-inner dacnis-local-736-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-0 gutters-col-v-0">
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-single__k__single-3ndM77FkZV-container dacnis-local-737-container d-flex h-col-lg h-col-md h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner dacnis-single__k__single-3ndM77FkZV-inner dacnis-local-737-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
											<div class="position-relative wp-block-kubio-column__align dacnis-single__k__single-3ndM77FkZV-align dacnis-local-737-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<?php if(dacnis_has_pagination_button(true)): ?>
												<div class="position-relative wp-block-kubio-pagination-nav-button__spacing dacnis-single__k__ELgmeRXRD--spacing dacnis-local-738-spacing">
													<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer dacnis-single__k__ELgmeRXRD--outer dacnis-local-738-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
														<a class="position-relative wp-block-kubio-pagination-nav-button__link dacnis-single__k__ELgmeRXRD--link dacnis-local-738-link h-w-100 h-global-transition" href="<?php dacnis_get_navigation_button_link(true); ?>">
															<span class="position-relative wp-block-kubio-pagination-nav-button__text dacnis-single__k__ELgmeRXRD--text dacnis-local-738-text kubio-inherit-typography">
																<?php esc_html_e('Previous', 'dacnis'); ?>
															</span>
														</a>
													</span>
												</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-single__k__single-mMPMCQqWfs-container dacnis-local-739-container d-flex h-col-lg h-col-md h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner dacnis-single__k__single-mMPMCQqWfs-inner dacnis-local-739-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
											<div class="position-relative wp-block-kubio-column__align dacnis-single__k__single-mMPMCQqWfs-align dacnis-local-739-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<?php if(dacnis_has_pagination_button()): ?>
												<div class="position-relative wp-block-kubio-pagination-nav-button__spacing dacnis-single__k__ELgmeRXRD--spacing dacnis-local-740-spacing">
													<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer dacnis-single__k__ELgmeRXRD--outer dacnis-local-740-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
														<a class="position-relative wp-block-kubio-pagination-nav-button__link dacnis-single__k__ELgmeRXRD--link dacnis-local-740-link h-w-100 h-global-transition" href="<?php dacnis_get_navigation_button_link(); ?>">
															<span class="position-relative wp-block-kubio-pagination-nav-button__text dacnis-single__k__ELgmeRXRD--text dacnis-local-740-text kubio-inherit-typography">
																<?php esc_html_e('Next', 'dacnis'); ?>
															</span>
														</a>
													</span>
												</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<div class="wp-block wp-block-kubio-post-comments kubio-migration--1 position-relative wp-block-kubio-post-comments__commentsContainer dacnis-single__k__single-s5UQRGEAN-commentsContainer dacnis-local-741-commentsContainer" data-kubio="kubio/post-comments">
								<?php dacnis_post_comments(array (
  'none' => __('No responses yet', 'dacnis'),
  'one' => __('One response', 'dacnis'),
  'multiple' => __('{COMMENTS-COUNT} Responses', 'dacnis'),
  'disabled' => __('Comments are closed', 'dacnis'),
  'avatar_size' => __('32', 'dacnis'),
)); ?>
							</div>
							<div class="wp-block wp-block-kubio-post-comments-form  position-relative wp-block-kubio-post-comments-form__container dacnis-single__k__single-oXoikmHxB-container dacnis-local-742-container" data-kubio="kubio/post-comments-form">
								<?php comment_form(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
