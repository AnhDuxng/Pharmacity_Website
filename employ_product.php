<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['employ_name'])){
   header('location:login_form.php');
}

?>
<title>Trang nhân viên</title>
<?php include_once 'admin_header.php';
    if(isset($_GET['del'])){
      $id=$_GET['del'];
      $sql = "UPDATE mathang SET Xoa = 1 WHERE MaMH = '$id'"; 
      $result = $conn->query($sql);
    }
   ?>
<div class="row">
    <div class="col-lg-2">
        <?php include 'admin_header.php' ?>
    </div>
    <div class="col-lg-10">
        <div id="container1">
            <br>
            <h1 style="color:red;">TỔNG HỢP SẢN PHẨM</h1>
            <br>
            <a class="btn btn-primary" href="employ_add_product.php">Thêm sản phẩm</a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col" style="background-color: #338ec9; color: white;">STT</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">HÌNH</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">MÃ SẢN PHẨM</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">TÊN SẢN PHẨM</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">GIÁ</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">NGÀY SẢN XUẤT</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">MÔ TẢ</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">HẠN SỬ DỤNG</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">DANH MỤC</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">CTDM</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">SỬA</th>
                        <th scope="col" style="background-color: #338ec9; color: white;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    $i=1;
    $sql = "SELECT * FROM mathang WHERE Xoa = 0"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaMH = $row['MaMH'];
            $TenMH = $row['TenMH'];
            $GiaBan = $row['GiaBan'];
            $NgaySX = $row['NgaySX'];
            $MoTa = $row['MoTa'];
            $HanSD = $row['HanSD'];
            $HINH = $row['HINH'];
            $DanhMuc = $row['DanhMuc'];
            $CTDM = $row['CTDM'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td><img width="50%" src="'.$HINH.'"></td>
      <td>'.$MaMH.'</td>
      <td>'.$TenMH.'</td>
      <td>'.$GiaBan.'</td>
      <td>'.$NgaySX.'</td>
      <td>'.$MoTa.'</td>
      <td>'.$HanSD.'</td>
      <td>'.$DanhMuc.'</td>
      <td>'.$CTDM.'</td>
      <td><a href="employ_product_fix.php?id='.$MaMH.'">SỬA</a></td>
      <td><a href="employ_product.php?del='.$MaMH.'">XÓA</a></td>
    </tr>
            ';
        }
    }
    ?>
                </tbody>
            </table>
        </div>