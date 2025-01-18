<div class="wp-block wp-block-kubio-query-layout  position-relative wp-block-kubio-query-layout__outer dacnis-search__k__1MCYzfcZN-outer dacnis-local-588-outer d-flex h-section-global-spacing align-items-lg-center align-items-md-center align-items-center" data-kubio="kubio/query-layout" id="blog-layout">
	<div class="position-relative wp-block-kubio-query-layout__inner dacnis-search__k__1MCYzfcZN-inner dacnis-local-588-inner h-section-grid-container h-section-boxed-container">
		<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container dacnis-search__k__baLWB4dRKjp-container dacnis-local-589-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-3 gutters-row-v-0" data-kubio="kubio/row">
			<div class="position-relative wp-block-kubio-row__inner dacnis-search__k__baLWB4dRKjp-inner dacnis-local-589-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-3 gutters-col-v-0">
				<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-search__k__kxeqsSpdy-n-container dacnis-local-590-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner dacnis-search__k__kxeqsSpdy-n-inner dacnis-local-590-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-0 h-px-md-0 v-inner-md-0 h-px-2 v-inner-0">
						<div class="position-relative wp-block-kubio-column__align dacnis-search__k__kxeqsSpdy-n-align dacnis-local-590-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
							<div class="wp-block wp-block-kubio-query  position-relative wp-block-kubio-query__container dacnis-search__k__CtKC_EuIZL-container dacnis-local-591-container" data-kubio="kubio/query">
								<div class="wp-block wp-block-kubio-query-loop  position-relative wp-block-kubio-query-loop__container dacnis-search__k__vrf0UGkWrN-container dacnis-local-592-container gutters-row-lg-2 gutters-row-v-lg-0 gutters-row-md-2 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/query-loop" data-kubio-component="masonry" data-kubio-settings="{&quot;enabled&quot;:&quot;1&quot;,&quot;targetSelector&quot;:&quot;.wp-block-kubio-query-loop__inner&quot;}">
									<div class="position-relative wp-block-kubio-query-loop__inner dacnis-search__k__vrf0UGkWrN-inner dacnis-local-592-inner h-row">
										<?php dacnis_theme()->get('archive-loop')->render(array (
  'view' => 'content/search/loop-item',
)); ?>
									</div>
								</div>
								<?php if(dacnis_has_pagination()): ?>
								<div class="wp-block wp-block-kubio-query-pagination  position-relative wp-block-kubio-query-pagination__container dacnis-search__k__vD7AVCTELY-container dacnis-local-603-container gutters-row-lg-0 gutters-row-v-lg-2 gutters-row-md-2 gutters-row-v-md-2 gutters-row-0 gutters-row-v-2" data-kubio="kubio/query-pagination">
									<div class="position-relative wp-block-kubio-query-pagination__inner dacnis-search__k__vD7AVCTELY-inner dacnis-local-603-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-2 gutters-col-md-2 gutters-col-v-md-2 gutters-col-0 gutters-col-v-2">
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-search__k__tBYU0uM8Xx-container dacnis-local-604-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner dacnis-search__k__tBYU0uM8Xx-inner dacnis-local-604-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align dacnis-search__k__tBYU0uM8Xx-align dacnis-local-604-align h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
													<?php if(dacnis_has_pagination_button(true)): ?>
													<div class="position-relative wp-block-kubio-pagination-nav-button__spacing dacnis-search__k__ELgmeRXRD--spacing dacnis-local-605-spacing">
														<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer dacnis-search__k__ELgmeRXRD--outer dacnis-local-605-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
															<a class="position-relative wp-block-kubio-pagination-nav-button__link dacnis-search__k__ELgmeRXRD--link dacnis-local-605-link h-w-100 h-global-transition" href="<?php dacnis_get_navigation_button_link(true); ?>">
																<span class="position-relative wp-block-kubio-pagination-nav-button__text dacnis-search__k__ELgmeRXRD--text dacnis-local-605-text kubio-inherit-typography">
																	<?php esc_html_e('Previous', 'dacnis'); ?>
																</span>
															</a>
														</span>
													</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-search__k__P2OarhUKUK-container dacnis-local-606-container d-flex h-col-lg h-col-md h-col" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner dacnis-search__k__P2OarhUKUK-inner dacnis-local-606-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-2 h-px-md-2 v-inner-md-2 h-px-1 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align dacnis-search__k__P2OarhUKUK-align dacnis-local-606-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-center align-self-md-center align-self-center">
													<div class="wp-block wp-block-kubio-pagination-numbers  position-relative wp-block-kubio-pagination-numbers__outer dacnis-search__k__tRiQFlrj8q-outer dacnis-local-607-outer" data-kubio="kubio/pagination-numbers">
														<?php dacnis_pagination_numbers(); ?>
													</div>
												</div>
											</div>
										</div>
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container dacnis-search__k__2nd5yuWmz9-container dacnis-local-608-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner dacnis-search__k__2nd5yuWmz9-inner dacnis-local-608-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align dacnis-search__k__2nd5yuWmz9-align dacnis-local-608-align h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
													<?php if(dacnis_has_pagination_button()): ?>
													<div class="position-relative wp-block-kubio-pagination-nav-button__spacing dacnis-search__k__ELgmeRXRD--spacing dacnis-local-609-spacing">
														<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer dacnis-search__k__ELgmeRXRD--outer dacnis-local-609-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
															<a class="position-relative wp-block-kubio-pagination-nav-button__link dacnis-search__k__ELgmeRXRD--link dacnis-local-609-link h-w-100 h-global-transition" href="<?php dacnis_get_navigation_button_link(); ?>">
																<span class="position-relative wp-block-kubio-pagination-nav-button__text dacnis-search__k__ELgmeRXRD--text dacnis-local-609-text kubio-inherit-typography">
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
