<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<title>admin page</title>
<div class="row">
    <div class="col-lg-2">
        <?php include 'admin_header.php' ?>
    </div>
    <div class="col-lg-10">
        <div id="container1">
            <br>
            <h1 style="color:red;">QUẢN LÝ KHO</h1>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="background-color: #338ec9; color: white;"">STT</th>
      <th scope=" col" style="background-color: #338ec9; color: white;"">MÃ KHO</th>
      <th scope=" col" style="background-color: #338ec9; color: white;"">TÊN KHO</th>
      <th scope=" col" style="background-color: #338ec9; color: white;"">SỨC CHỨA(SẢN PHẨM)</th>
      <th scope=" col" style="background-color: #338ec9; color: white;"">XEM CHI TIẾT</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $sql = "SELECT * FROM kho "; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaKho = $row['MaKho'];
            $TenKho = $row['TenKho'];
            $SucChua = $row['SucChua'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$MaKho.'</td>
      <td>'.$TenKho.'</td>
      <td>'.$SucChua.'</td>
      <td><a href="admin_inventory_detail.php?id='.$MaKho.'">Xem</a></td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
</table>
</div>
    </div>
</div>
   