<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
  header('location:login_form.php');
}

?>
<title>admin page</title>
<div class = "row">
    <div class= "col-lg-2">
    <?php include_once 'admin_header.php';
if (isset($_POST['get1'])) {
  $timestamp = strtotime($_POST['ngay']);
  $ngay_da_chuyen_doi = date("Y-m-d", $timestamp);
  $sql = "SELECT COUNT(*) as 'SoDon',SUM(SoTien) as 'Tong',PhuongThucTT FROM  hoadon WHERE NgayLap='$ngay_da_chuyen_doi'  GROUP BY PhuongThucTT  ";
  $sql1 = "  SELECT MONTH(NgayLap) AS Thang, SUM(SoTien) AS TongTien
  FROM hoadon
  GROUP BY MONTH(NgayLap) ";
  $result4 = $conn->query($sql1);

  $result = $conn->query($sql);
  $result1 = $conn->query($sql);
  $result2 = $conn->query($sql);
} else if (isset($_POST['get2'])) {
  $nam_da_chuyen_doi = $_POST['nam'];
  $thang_da_chuyen_doi = $_POST['thang'];
  $sql1 = "  SELECT MONTH(NgayLap) AS Thang, SUM(SoTien) AS TongTien
  FROM hoadon
  GROUP BY MONTH(NgayLap) ";
  $sql = "SELECT COUNT(*) as 'SoDon',SUM(SoTien) as 'Tong',PhuongThucTT FROM  hoadon WHERE YEAR(NgayLap)='$nam_da_chuyen_doi' AND MONTH(NgayLap)='$thang_da_chuyen_doi'  GROUP BY PhuongThucTT  ";
  $result = $conn->query($sql);
  $result1 = $conn->query($sql);
  $result4 = $conn->query($sql1);
  $result2 = $conn->query($sql);
} else if (isset($_POST['get3'])) {
  $nam_da_chuyen_doi = $_POST['nam'];
  $sql = "SELECT COUNT(*) as 'SoDon',SUM(SoTien) as 'Tong',PhuongThucTT FROM  hoadon WHERE YEAR(NgayLap)='$nam_da_chuyen_doi' GROUP BY PhuongThucTT  ";
  $result = $conn->query($sql);
  $result1 = $conn->query($sql);
  $sql1 = "  SELECT MONTH(NgayLap) AS Thang, SUM(SoTien) AS TongTien
  FROM hoadon
  GROUP BY MONTH(NgayLap) ";
  $result4 = $conn->query($sql1);
  $result2 = $conn->query($sql);
} else {
  $sql = "SELECT COUNT(*) as 'SoDon',SUM(SoTien) as 'Tong',PhuongThucTT FROM  hoadon  GROUP BY PhuongThucTT";
  $result = $conn->query($sql);
  $result1 = $conn->query($sql);
  $sql1 = "  SELECT MONTH(NgayLap) AS Thang, SUM(SoTien) AS TongTien
  FROM hoadon
  GROUP BY MONTH(NgayLap) ";
  $result4 = $conn->query($sql1);
  $result2 = $conn->query($sql);
}

?>
    </div>
    <div class = "col-lg-10">
    <div id="container1">
  <br>
  <h1>XUẤT BẢNG CÂN ĐỐI KẾ TOÁN</h1>
  <br>
  <div class="row">
    <form class="col-md-6" method="POST" action="admin_export_BalanceSheet.php">
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Xuất bảng cân đối kế toán theo tháng năm</label>
        <select id="disabledSelect" name="thang" class="form-select">
          <?php
          for ($i = 1; $i < 13; $i++) {
            echo '<option value="' . $i . '">' . $i . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <select id="disabledSelect" name="nam" class="form-select">
          <?php
          $namHienTai = date("Y");
          for ($i = $namHienTai; $i >= 2020; $i--) {
            echo '<option value="' . $i . '">' . $i . '</option>';
          }
          ?>
        </select>
      </div>
      <button type="submit" name="get2" class="btn btn-primary">Xuất</button>
    </form>

    <form class="col-md-6" method="POST" action="admin_export_BalanceSheet.php">
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Xuất bảng cân đối kế toán theo năm</label>
        <select id="disabledSelect" name="nam" class="form-select">
          <?php
          $namHienTai = date("Y");
          for ($i = $namHienTai; $i >= 2020; $i--) {
            echo '<option value="' . $i . '">' . $i . '</option>';
          }
          ?>
        </select>
      </div>
      <button type="submit" name="get3" class="btn btn-primary">Xuất</button>
    </form>

  </div>

  <br>
  <br>
  
  <script src="js/sheet.js"></script>
  <script src="js/script.js"></script>

</div>   
    </div>
</div>

