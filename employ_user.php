<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['employ_name'])){
   header('location:login_form.php');
}

?>
<title>Trang nhân viên</title>
<?php include_once 'admin_header.php' ?>
<div class="row">
    <div class="col-lg-2">
        <?php include 'admin_header.php' ?>
    </div>
    <div class="col-lg-10">
        <div id="container1">
            <br>
            <h1 style="color:red;">TỔNG HỢP KHÁCH HÀNG</h1>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="background-color: #338ec9; color: white;">STT</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">TÊN KHÁCH HÀNG</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">SỐ ĐIỆN THOẠI</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">EMAIL</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">ĐỊA CHỈ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    $i=1;
    $sql = "SELECT * FROM khachhang WHERE VaiTro = 'user'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $TenKH = $row['TenKH'];
            $SDT = $row['SDT'];
            $Email = $row['Email'];
            $DiaChi = $row['DiaChi'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$TenKH.'</td>
      <td>'.$SDT.'</td>
      <td>'.$Email.'</td>
      <td>'.$DiaChi.'</td>
    </tr>
            ';
        }
    }
    ?>
                </tbody>
            </table>
        </div>