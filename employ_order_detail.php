<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['employ_name']) && !isset($_SESSION['admin_name'])){
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
            <h1 style="color:red;">CHI TIẾT ĐƠN HÀNG <?php echo $_GET['id']; ?></h1>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="background-color: #338ec9; color: white;">STT</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">TÊN SẢN PHẨM</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">SỐ LƯỢNG</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">TỔNG TIỀN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    $i=1;
    $id=$_GET['id'];
    $sql = "SELECT * FROM cthd INNER JOIN mathang ON cthd.MaMH=mathang.MaMH WHERE MaHD = $id "; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $TenMH = $row['TenMH'];
            $Soluong = $row['Soluong'];
            $ThanhTien = $row['ThanhTien'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$TenMH.'</td>
      <td>'.$Soluong.'</td>
      <td>'.$ThanhTien.'</td>
    </tr>
            ';
        }
    }
    ?>
                </tbody>
            </table>
        </div>