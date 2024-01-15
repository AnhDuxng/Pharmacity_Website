<?php

// Kết nối đến cơ sở dữ liệu thông qua file config.php
@include 'config.php';

session_start();

// Kiểm tra xem nút "submit" đã được nhấn hay chưa
if(isset($_POST['submit'])){

   // Lấy dữ liệu từ form và áp dụng phương thức tránh tấn công SQL injection
   $name = mysqli_real_escape_string($conn, $_POST['TenKH']); // Lấy tên khách hàng
   $email = mysqli_real_escape_string($conn, $_POST['Email']); // Lấy email
   $pass = md5($_POST['Password']); // Lấy mật khẩu và mã hóa bằng phương thức md5 
   $cpass = md5($_POST['cpassword']); // Mật khẩu nhập lại và cũng được mã hóa 
   $user_type = $_POST['VaiTro']; // Lấy vai trò người dùng

   // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập có tồn tại hay không
   $select = "SELECT * FROM khachhang WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select); // Thực hiện truy vấn

   // Kiểm tra kết quả trả về từ cơ sở dữ liệu
   if(mysqli_num_rows($result) > 0){

      // Nếu thông tin chính xác, lấy thông tin người dùng và lưu vào session
      $row = mysqli_fetch_array($result);
      $_SESSION['MaKH']= $row['MaKH']; // Lưu mã khách hàng vào session

      // Phân quyền người dùng dựa trên vai trò và chuyển hướng đến trang tương ứng
      if($row['VaiTro'] == 'admin'){
         $_SESSION['admin_name'] = $row['TenKH']; 
         header('location:admin_page.php'); 
      }elseif($row['VaiTro'] == 'user'){
         $_SESSION['user_name'] = $row['TenKH'];
         header('location:index.php'); 
      }
     
   }else{
      $error[] = 'incorrect email or password!'; 
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="login_style.css">

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>ĐĂNG NHẬP NGAY</h3>
            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <input type="email" name="Email" required placeholder="Nhập Email">
            <input type="password" name="Password" required placeholder="Nhập mật khẩu">
            <input type="submit" name="submit" value="Đăng nhập" class="form-btn">
            <p>Bạn chưa có tài khoản? <a href="register_form.php">Đăng ký ngay</a></p>
        </form>

    </div>

</body>

</html>