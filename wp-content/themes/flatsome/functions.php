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
<form action="./thanh-toan/" method="GET">
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
				<input  type="text" name="number" value="2" >
			</div> 
			<div class="column-halff">
				<input type="date" id="date" name="date">
			</div>
		</div>
		<div class="form-row">
			<div class="column-full">
				<input type="text" name="fullname" value="NHAT PHUC">
			</div>
		</div>
		<div class="form-row">
			<div class="column-full">
				<input type="tel" name="tel" value="0327801523" >
			</div>
		</div>
		<div class="form-row">
			<div class="column-full">
				<input type="email" name="email" value="hdnp5237@gmail.com">
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


/** Thanh toán bằng VNPAY */
function vnpay(){

	?>
	<!DOCTYPE html>
	<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap core CSS -->
        <link href="./././vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="./././vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="./././vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>

    <body>
        <?php require_once("./././vnpay_php/config.php"); ?>  

	<form action="../vnpay_php/" id="create_form-payment" method="post">       

		<div class="form-group">
			<label for="language">Loại hàng hóa</label>
			<select name="order_type" id="order_type" class="form-control">
				<option value="topup">Nạp tiền điện thoại</option>
				<option value="billpayment">Thanh toán hóa đơn</option>
				<option value="fashion">Thời trang</option>
				<option value="other">Khác - Xem thêm tại VNPAY</option>
			</select>
		</div>
		<div class="form-group">
			<label for="order_id">Mã hóa đơn</label>
			<input class="form-control" id="order_id" name="order_id" type="text" 
				value="<?php echo date("His") ?>"/>
		</div>
		<div class="form-group">
			<label for="amount">Số tiền</label>
			<input class="form-control" id="amount" name="amount" type="number" 
				value="<?php if(isset($_GET["number"])) {echo 90000*$_GET["number"];}?>"/>
		</div>
		<div class="form-group">
			<label for="order_desc">Nội dung thanh toán</label>
			<textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2" >TEN KH: <?php if(isset($_GET["fullname"])) { print $_GET["fullname"]; } ?>, SDT: <?php if(isset($_GET["tel"])) { print $_GET["tel"];}?>, Email: <?php if(isset($_GET["email"])) { print $_GET["email"];}?>
			</textarea>
		</div>
		<div class="form-group">
			<label for="language">Ngôn ngữ</label>
			<select name="language" id="language" class="form-control">
				<option value="vn">Tiếng Việt</option>
				<option value="en">English</option>
			</select>
		</div>
		
		<button type="submit" name="redirect" id="redirect" class="btn btn-default">Thanh toán</button>

</form>

    </body>
</html>


	<?php
}
add_shortcode('vnpay','vnpay');
/**  Kết thúc thanh toán bằng VNPAY */

/** Begin handling payment */
function payment(){
	?>
<html>
<head>
	<link rel="stylesheet" href="/wp-content/themes/flatsome/style.css">	
</head>
<body>
	<form action="../vnpay_php/" id="create_form" method="post"> 
		<div id="responsive-forms" class="clearfixs">
			 <div class="form-row">
				<div class="column-half">
					<label >Số tiền thanh toán</label>
					<input id="amount" name="amount" 
						value="<?php if(isset($_GET["number"])) {echo 90000*$_GET["number"];}?>">
				</div>
			</div>
			<div class="form-row">
				<div class="column-halfff">
					<label >Số lượng vé</label>
					<input class="column-1" id="order_tickets" name="order_tickets"
						value="<?php if(isset($_GET["number"])) {echo $_GET["number"];}?>"><p style="color:#000;">vé</p>
				</div>
			</div>
			<div class="form-row">
				<div class="column-half">
					<label >Ngày sử dụng</label>
					<input id="txtexpire" name="txtexpire" 
						value="<?php if(isset($_GET["date"])) { echo $_GET["date"]; } ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="column-full">
					<label >Thông tin liên hệ</label>
					<input class="column-f" id="txt_billing_fullname" name="txt_billing_fullname" 
						value="<?php if(isset($_GET["fullname"])) { print $_GET["fullname"]; } ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="column-full">
					<label >Điện thoại</label>
					<input class="column-f" id="txt_billing_mobile" name="txt_billing_mobile"
						value="<?php if(isset($_GET["tel"])) { print $_GET["tel"];}?>">
				</div>
			</div>
			<div class="form-row">
				<div class="column-full">
					<label >Email</label>
					<input class="column-f" id="txt_billing_email" name="txt_billing_email"
						value="<?php if(isset($_GET["email"])) { print $_GET["email"];}?>">
				</div>
			</div> 
				
		</div>
	</form>
</body>
</html>
	<?php
}
add_shortcode('payment','payment');

/** End handling payment  */

/** Xuất số vé */
function outputticket(){
	?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="./././vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="./././vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="./././vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./././vnpay_php/config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="table-responsive">
				<div class="form-group">
					<img class="alignnone wp-image-763" src="../wp-content/uploads/2022/04/image-3.png" alt="" width="100" height="106" style="padding: 10px 0; margin-top: 4px;" />
				</div>
                <div class="form-group">
                    <label>Mã đơn hàng: <?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">
                    <label>Số tiền: <?php echo $_GET['vnp_Amount'] ?></label>
                </div>
                <div class="form-group">
                    <label>Nội dung thanh toán: <?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label>Mã phản hồi: <?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label>Mã GD Tại VNPAY: <?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label>Mã Ngân hàng: <?php echo $_GET['vnp_BankCode'] ?></label>
                </div>
                <div class="form-group">
                    <label>Kết quả: 
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
								$order_id = $_GET['vnp_TxnRef'];
                                $money = $_GET['vnp_Amount']/100;
                                $note = $_GET['vnp_OrderInfo'];
                                $vnp_response_code = $_GET['vnp_ResponseCode'];
                                $code_vnpay = $_GET['vnp_TransactionNo'];
                                $code_bank = $_GET['vnp_BankCode'];
								$time = $_GET['vnp_PayDate'];
                                $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);
                                
								
								$conn = mysqli_connect("localhost", "root", "", "littleandlittle");
                                $taikhoan = $_SESSION['tk'];
                                $query = mysqli_query($conn, "SELECT * FROM payments WHERE order_id = '$order_id'");
                                $rowcount = mysqli_num_rows($query);
                                if ($rowcount > 0) {
                                    $sql = "UPDATE payments SET order_id = '$order_id', money = '$money', noi_dung_thanh_toan = '$note', vnp_response_code = '$vnp_response_code', code_vnpay = '$code_vnpay', code_bank = '$code_bank' WHERE order_id = '$order_id'";
                                   
                                    mysqli_query($conn, $sql);
                                } else {
                                    $sql = "INSERT INTO payments(order_id, thanh_vien, money, noi_dung_thanh_toan, vnp_response_code, code_vnpay, code_bank, time) 
									VALUES ('$order_id', '$taikhoan', '$money', '$note', '$vnp_response_code', '$code_vnpay', '$code_bank','$date_time')";
                                    mysqli_query($conn, $sql);
                                }


                                echo "<span style='color:blue'>GD Thanh cong</span>
								
								";
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                </div> 
				<p style="text-align: center; margin: 10px 0; color: #44C4A1;">[icon name="check-circle" prefix="fas"]</p>
            </div>
        </div>  
    </body>
</html>



	<?php
}

add_shortcode('outputticket','outputticket');
/** Kết thúc xuất số vé */
