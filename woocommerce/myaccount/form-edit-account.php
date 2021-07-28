<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>
				<div class="acc__rightsect">
					<div class="acc__formwrapper">
						<div class="acc__formwrapper-head">
							<p class="title"><?php _e('Edit Profile', 'claroads') ?></p>
						</div>
						<div class="acc__formwrapper-body">
							<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
								<div class="datailssect">
									<p class="datails__title"><?php _e('Account Details', 'claroads') ?></p>
									<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
									<div class="row">
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<input type="email" placeholder="Your Email Address" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
												<label for="account_email"><?php esc_html_e( 'Email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="account_display_name" ><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
												<input type="text" placeholder="Username" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
												<input type="text" placeholder="First Name" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
												
											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
												<input type="text" placeholder="Last name" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_phone" style='color: black'><?php esc_html_e( 'Phone', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
												<input type="text" placeholder="Phone" class="woocommerce-Input woocommerce-Input--text input-text nummask" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( $user->billing_phone ); ?>" /> 

											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_skype" style='color: black'><?php esc_html_e( 'Skype Name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
												<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_skype" id="billing_skype" value="<?php echo esc_attr( $user->billing_skype ); ?>" /> 
											</div>
										</div>
									</div>
								</div>
								<div class="datailssect">
									<p class="datails__title">User Details</p>
									<div class="row">
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_company"><?php esc_html_e( 'Company', 'woocommerce' ); ?></label>
												<input type="text" placeholder="Company Name" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_company" id="billing_company" value="<?php echo esc_attr( $user->billing_company ); ?>" /> 	
											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_vat"><?php esc_html_e( 'VAT', 'woocommerce' ); ?></label>
												<input type="text" placeholder="VAT" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_vat" id="billing_vat" value="<?php echo esc_attr( $user->billing_vat ); ?>" /> 
											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_country"><?php esc_html_e( 'Country', 'woocommerce' ); ?></label>
												<input type="text" placeholder="Country" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_country" id="billing_country" value="<?php echo esc_attr( $user->billing_country ); ?>" /> 
											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_address"><?php esc_html_e( 'Address', 'woocommerce' ); ?></label>
												<input type="text" placeholder="Address" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_address" id="billing_address" value="<?php echo esc_attr( $user->billing_address ); ?>" /> 
											</div>
										</div>
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_city"><?php esc_html_e( 'City', 'woocommerce' ); ?></label>
												<input type="text" placeholder="City" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_city" id="billing_city" value="<?php echo esc_attr( $user->billing_city ); ?>" /> 
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_state"><?php esc_html_e( 'State/Province', 'woocommerce' ); ?></label>
												<input type="text" placeholder="State/Province" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_state" id="billing_state" value="<?php echo esc_attr( $user->billing_state ); ?>" /> 
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="inpfield inpfield__textinp">
												<label for="billing_zip"><?php esc_html_e( 'ZIP', 'woocommerce' ); ?></label>
												<input type="text" placeholder="ZIP" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_zip" id="billing_zip" value="<?php echo esc_attr( $user->billing_zip ); ?>" /> 
											</div>
										</div>
									</div>
								</div>
								<div class="datailssect">
									<p class="datails__title"><?php _e('User Details', 'claroads') ?></p>
									<div class="row">
										<div class="col-xl-6">
											<div class="inpfield inpfield__textinp">
												<input type="password" placeholder="Your Password" class=" woocommerce-Input--password input-text passinp" name="password_current" id="password_current" autocomplete="off" />
												<label for="password_current"><?php esc_html_e( 'Current password', 'woocommerce' ); ?></label>
												<span class="eye">
													<img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/eye.svg" alt="show password">
												</span>
											</div>
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-xl-6 ">
													<div class="inpfield inpfield__textinp">
														<input type="password" placeholder="Your Password" class="woocommerce-Input--password input-text passinp" name="password_1" id="password_1" autocomplete="off" />
														<label for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?></label>
														<span class="eye">
															<img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/eye.svg" alt="show password">
														</span>
													</div>
												</div>
												<div class="col-xl-6 ">
													<div class="inpfield inpfield__textinp">
														<input type="password" placeholder="Confirm Your Password" class="woocommerce-Input--password input-text passinp" name="password_2" id="password_2" autocomplete="off" />
														<label for="password_2"><?php esc_html_e( 'Confirm', 'woocommerce' ); ?></label>
														<span class="eye">
															<img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/eye.svg" alt="show password">
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php do_action( 'woocommerce_edit_account_form' ); ?>
								<p>
									<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
									<button type="submit" class="woocommerce-Button adsbtn adsbtn__blue accsubmit" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?><span></span></button>
									<input type="hidden" name="action" value="save_account_details" />
								</p>
								<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
						
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php	get_template_part( 'template-parts/sections/buytraffic' );?>

</div>
<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
