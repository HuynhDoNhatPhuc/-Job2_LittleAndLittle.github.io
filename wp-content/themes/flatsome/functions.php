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

 /** 
* Begin booking form 
*/
function registered(){
	?>
<html>
<head>	
</head>
<body>
<form action="http://localhost:8081/littleandlittle/thanh-toan/" method="get">
	<div id="responsive-forms" class="clearfixs">
		<div class="form-row">
			<div class="column-full">
				<select name="packages">
					<option value="Gói Gia Đình">Gói Gia Đình</option>
					<option value="Gói Gia Đình">Gói cặp đôi</option>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="column-halff">
				<input  type="text" name="number" placeholder="Số lượng vé" >
			</div> 
			<div class="column-halff">
				<input type="date" name="date" placeholder="Ngày sử dụng">
			</div>
		</div>
		<div class="form-row">
			<div class="column-full">
				<input type="text" name="fullname" placeholder="Họ và tên">
			</div>
		</div>
		<div class="form-row">
			<div class="column-full">
				<input type="tel" name="tel" placeholder="Số diện thoại" >
			</div>
		</div>
		<div class="form-row">
			<div class="column-full">
				<input type="email" name="email" placeholder=" Đia chỉ Email">
			</div>
		</div>
		
		<button class="button" type="submit">Đặt vé</button>
		
	</div>
</form>
</body>
</html>
		<?php
}

add_shortcode('registered','registered');
/** 
* End booking form 
*/


/** 
* Begin handling payment
*/
function payment(){
	?>
	<form action="http://localhost:8081/littleandlittle/thanh-toan-thanh-cong/" method="get">
		<div id="responsive-forms" class="clearfixs">
			<div class="form-row">
				<div class="column-half">
					<label >Số tiền thanh toán</label>
					<input name="number" value="<?php if(isset($_GET["number"])) {echo 90000*$_GET["number"];}?> vnđ">
				</div>
			</div>
			<div class="form-row">
				<div class="column-halfff">
					<label >Số lượng vé</label>
					<input class="column-1" name="number" value="<?php if(isset($_GET["number"])) {echo $_GET["number"];}?> vé">
				</div>
			</div>
			<div class="form-row">
				<div class="column-half">
				<label >Ngày sử dụng</label>
					<input name="date" value="<?php if(isset($_GET["date"])) { echo $_GET["date"]; } ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="column-full">
				<label >Thông tin liên hệ</label>
					<input class="column-f" name="fullname" value="<?php if(isset($_GET["fullname"])) { print $_GET["fullname"]; } ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="column-full">
				<label >Điện thoại</label>
					<input class="column-f" name="tel" value="<?php if(isset($_GET["tel"])) { print $_GET["tel"];}?>">
				</div>
			</div>
			<div class="form-row">
				<div class="column-full">
				<label >Email</label>
					<input class="column-f" name="email" value="<?php if(isset($_GET["email"])) { print $_GET["email"];}?>">
				</div>
			</div>
		</div>
	</form>
	<?php
}
add_shortcode('payment','payment');
/** 
* End handling payment
*/

function vnpay(){
	?>
<html>
<head>
	<link rel="stylesheet" href="/wp-content/themes/flatsome/style.css">	
</head>
<body>
	<form action="http://localhost:8081/littleandlittle/vnpay_php/" method="get">
		<div id="form-vnpay" class="clearfixs ">
			<div class="form-vnpay_row">
				<div class="form-vnpay_column-full">
					<label>Số thẻ</label>
					<input  type="text" name="number" placeholder="9704198526191432198" >
				</div>
			</div>
			<div class="form-vnpay_row">
				<div class="form-vnpay_column-full">
					<label>Họ tên chủ thẻ</label>
					<input  type="text" name="name" placeholder="NGUYEN VAN A" >
				</div>
			</div>
			<div class="form-vnpay_row">
				<div class="form-vnpay_column-full">
					<label>Ngày hết hạn</label>
					<input  type="text" name="number" placeholder="07/15" >
				</div>
			</div>
			<div class="form-vnpay_row">
				<div class="form-vnpay_column-half">
					<label>CVV/CVC</label>
					<input  type="text" name="number" placeholder="****" >
				</div>
			</div>
			
			
			<button class="button" type="submit">Đặt vé</button>
			
		</div>
	</form>
</body>
</html>
	<?php
}

add_shortcode('vnpay','vnpay');