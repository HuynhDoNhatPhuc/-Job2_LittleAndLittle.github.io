<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */




// Form đặt vé
function registered(){
	?>

<html>
<head>

</head>
<body>
<form action="./thanh-toan/" method="GET">
	
	<div id="responsive-forms" class="clearfixs">
		<div class="form-row">
			<div class="column-full">
				<!-- Hiển thị sản phẩm -->
				<select name="add-to-cart">			
					<?php 
					 $args = array( 
						 'post_type' => 'product'
						); 
					 $getposts = new WP_query( $args);
					 global $wp_query; $wp_query->in_the_loop = true; 
					 while ($getposts->have_posts()) : $getposts->the_post(); 
					 global $product;
					 $product->get_id();
					?>
						<option value="<?php echo esc_attr($product->id); ?>">
							
							<a><?php the_title();?> <?php echo wc_get_stock_html( $product );?></a>
							
						</option>
					<?php endwhile;  wp_reset_postdata(); ?>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="column-halff">
				<input type="number" size="4" class="input-text qty" title="Số lượng vé" value="1" id="quantity" name="quantity" min="1" step="1">
			</div> 
			<div class="column-halff">
				<input type="date" id="date" name="date">
			</div>
		</div> 
		<div class="form-row">
			<div class="column-full">
				<input type="text" name="fullname" placeholder="Jesse">
			</div>
		</div>
		<div class="form-row">
			<div class="column-full">
				<input type="tel" name="tel" placeholder="0123456789" >
			</div>
		</div>
		<div class="form-row">
			<div class="column-full">
				<input type="email" name="email" placeholder="abc@gmail.com">
			</div>
		</div>

		<button type="submit" class="single_add_to_cart_button button alt">Đặt vé</button>
		
	</div>
</form>
</body>
</html>
		<?php
		
}

add_shortcode('registered','registered');


// Thanh toán thành công và xuất vé
function confirmation_order_details(){
defined( 'ABSPATH' ) || exit;
?>


<div class="roww">
	
	<?php if ( $order ) :
		
		do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>
		<!-- shortcode này chưa nhận đc -->
		<?php if ( $order->has_status( 'failed' ) ) : ?>
		<div class="large-12 col order-failed">
			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>
		</div>

		<?php else : ?>

		<div class="large-5 col">
			<div class="is-well col-inner entry-content">
				
				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details" style="list-style: none;text-align: start;">

					<li class="woocommerce-order-overview__order order">aaaaaaaaaaaa
						<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>

					<li class="woocommerce-order-overview__date date">
						<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
						<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>

					<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
						<li class="woocommerce-order-overview__email email">
							<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
							<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
						</li>
					<?php endif; ?>

					<li class="woocommerce-order-overview__total total">
						<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>

					
					<p style="text-align: center; margin: 10px 0; color: #44C4A1;">[icon name="check-circle" prefix="fas"]</p>	
				</ul>

				<div class="clear"></div>
			</div>
		</div>

		<?php endif; ?>
		
		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received" style="margin: 16px; ">
				
				<img class="alignnone wp-image-763" src="../wp-content/uploads/2022/04/image-3.png" alt="" width="100"  style="padding: 10px 0; margin-top: 4px;" />
				</br>
				<!-- đổi thành mã order_ID -->
				<label style="text-align: center; margin: 0;"><?php the_title(); ?></label>
				</br>

				<label style="text-align: center; margin: 0; color: #FFC226;">VÉ CỔNG</label>
				</br>

				<label style="text-align: center; margin: 0; font-size: 24px; font-weight: 700;">---</label>
				</br>

				<label >Ngày sử dụng: <?php if(isset($_GET["date"])) { echo $_GET["date"]; } ?></label>
				</br>
				
				<a style="text-align: center; margin-top: 10px; color: #44C4A1;">[icon name="check-circle" prefix="fas"]</a>
			</p>
	<?php endif; ?>
	
</div>
<?php

}

add_shortcode('confirmation_order_details','confirmation_order_details');



// Trang Giỏ hàng sẽ được chuyển hướng sang trang Thanh toán.
function skip_cart_page_redirection_to_checkout() {

    if( is_cart() )
        wp_redirect( wc_get_checkout_url() );
}
add_action('template_redirect', 'skip_cart_page_redirection_to_checkout');


// Giỏ hàng sẽ được xóa trước khi sản phẩm khác được thêm vào.
add_filter( 'woocommerce_add_to_cart_validation', 'remove_cart_item_before_add_to_cart', 20, 3 );
function remove_cart_item_before_add_to_cart( $passed, $product_id, $quantity ) {
    if( ! WC()->cart->is_empty())
        WC()->cart->empty_cart();
    return $passed;
}


// Sửa nút ĐẶT HÀNG --> Thanh Toán
add_filter('woocommerce_order_button_text','custom_order_button_text',1);
function custom_order_button_text($order_button_text) {
	$order_button_text = 'Thanh Toán';
	return $order_button_text;
}



// chuyển ra trang thanh toán thành công (cần đổi URL khi up hosting)
add_action( 'template_redirect', 'woo_custom_redirect_after_purchase' );
function woo_custom_redirect_after_purchase() {
	global $wp;
	if ( is_checkout() && !empty( $wp->query_vars['order-received'] ) ) {
		wp_redirect( 'http://localhost:8081/littleandlittle/thanh-toan-thanh-cong/' );
		exit;
	}
}

