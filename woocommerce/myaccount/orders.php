<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>


<?php if ( $has_orders ) : ?>

		
				<div class="acc__rightsect ">
					<div class="acc-orderscontent">
						<div class="acc-filtesect">
							<div class="row">
								<div class="col-xl-4">
									<p class="title"><?php _e('Orders', 'claroads') ?></p>
								</div>
								<div class="col-xl-8">
								<?php	
									$order   = wc_get_order( );
										echo $order;
									?> 
									<div class="filterbox">
										<div class="filterbox__datesort">
											<span class="filterbox__title"><?php _e('Sort by:', 'claroads') ?></span>
											<div class="sortdays">
												<button  class="hihebtn sortOrder sort-1 active" data-sort="myorder:asc">
													<img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/sortday.svg" alt="icon">
													<?php _e('Date', 'claroads') ?>
												</button>
												<button  class="show sortOrder sort-1 " data-sort="myorder:desc">
													<img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/sortday.svg" alt="icon">
													<?php _e('Date', 'claroads') ?>
												</button>
											</div>
										</div>
										<div class="filterbox__statussort">
											<span class="filterbox__title"><?php _e('Status:', 'claroads') ?></span>
											<div class="status-dropdown">
												<div class="sortsection dropdown category-dropdown">
													<a class="mainfield" data-toggle="dropdown" href="#">
														<span class="change-text"><?php _e('All', 'claroads') ?></span>
													</a>
													<ul class="dropdown-menu category-change">
														<li class="allshow">
															<a href="#"><?php _e('All', 'claroads') ?></a>
														</li>
														<li class="actshow">
															<a href="#">
																<img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/active-ic.svg" alt="icon">
																<?php _e('Active', 'claroads') ?>
															</a>
														</li>
														<li class="waitshow">
															<a href="#">
																<img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/waiting-ic.svg" alt="icon">
																<?php _e('Waiting approval', 'claroads') ?>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="scrolltable">
							<div class="acc-tablehead">
								<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
							
									<div class="acc-tablehead__<?php echo esc_attr( $column_id ); ?>">
										<p><?php echo esc_html( $column_name ); ?></p>
									</div>
								<?php endforeach; ?>
								
							</div>
						
							
							<div class="acc-tablebody" id='mix'>
								<?php $count = 1;	foreach ( $customer_orders->orders as $customer_order ) {
									
									$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
									$item_count = $order->get_item_count() - $order->get_item_count_refunded();
									
									// var_dump ($order->get_data()["meta_data"][3]->get_data()["value"]);
									$odrStatus = $order->get_data()["status"];
									// var_dump($order->get_data()["date_modified"]->date('Y-m-d H:i'));
									// var_dump($order->get_data()["date_completed"]->date('Y-m-d H:i'));
									
									?>

									<div class="mix" data-myorder="<?php echo $count; ++$count;?>">

									
										<div class=" acc-tablerow <?php echo ($odrStatus == "processing" ? "waiting-order" : "active-order") ;?> " >
											<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
												<?php
													$orderType = $order->get_data()["meta_data"][0]->get_data()["value"]; 
													
													
												?>
									
												
												<div class="tablerow__ordnum<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
													<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
														<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

													<?php elseif ( 'order-number' === $column_id ) : ?>
														<!-- <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>"> -->
															<?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
														<!-- </a> -->

													<?php elseif ( 'order-date' === $column_id ) : ?>
														
														<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
														<!-- <p class='completed'>
															<?php $coplid = $order->get_data()["date_completed"];
															if (! empty($coplid)) {
																echo $order->get_data()["date_completed"]->date('M j, Y H:i');
															}?>
														</p> -->
													<?php elseif ( 'order-status' === $column_id ) : ?>
														<span class=" <?php echo ($odrStatus == "processing" ? "waitingapproval" : "active") ;?>">
															<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
														</span>
														<?php $coplid = $order->get_data()["date_completed"];
															if (! empty($coplid)) {?>
																<p class='completed'>
																	<span>
																		<?php echo $order->get_data()["date_completed"]->date('M j, Y H:i');?>
																	</span>
																</p>
														<?php }?>
														
													<?php elseif ( 'order-total' === $column_id ) : ?>
														<?php
														/* translators: 1: formatted order total 2: total order items */
														echo wp_kses_post( sprintf(  $order->get_formatted_order_total(), $item_count ) );
														
														?>

													<?php elseif ( 'order-actions' === $column_id ) : ?>
														<?php echo $orderType; ?>
														
													<?php endif; ?>
												</div>
									
											<?php endforeach; ?>
										</div>
									</div>
									<?php
									
								}
								?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php	get_template_part( 'template-parts/sections/buytraffic' );?>
	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php esc_html_e( 'Browse products', 'woocommerce' ); ?></a>
		<?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
