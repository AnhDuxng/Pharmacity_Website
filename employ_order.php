<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['employ_name'])){
   header('location:login_form.php');
}

?>
<title>Trang nhân viên</title>
<div class="row">
    <div class="col-lg-2">
        <?php include 'admin_header.php' ?>
    </div>
    <div class="col-lg-10">
        <div id="container1">
            <br>
            <h1 style="color:red;">TỔNG HỢP ĐƠN HÀNG</h1>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="background-color: #338ec9; color: white;">STT</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">MÃ ĐƠN HÀNG</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">TÊN KHÁCH HÀNG</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">TỔNG TIỀN</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">NGÀY MUA</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">XEM CHI TIẾT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    $i=1;
    $sql = "SELECT * FROM hoadon INNER JOIN khachhang ON hoadon.MaKH=khachhang.MaKH"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaHD = $row['MaHD'];
            $TenKH = $row['TenKH'];
            $SoTien = $row['SoTien'];
            $NgayLap = $row['NgayLap'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$MaHD.'</td>
      <td>'.$TenKH.'</td>
      <td>'.$SoTien.'</td>
      <td>'.$NgayLap.'</td>
      <td><a href="employ_order_detail.php?id='.$MaHD.'">Xem</a></td>
    </tr>
            ';
        }
    }
    ?>
                </tbody>
            </table>
        </div>