<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/c0adbb8084.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<style>
.nav {
    padding: 0;
    box-shadow: none;
}

.menu-icon {
    color: #fff
}
</style>
<?php if(isset($_SESSION['admin_name'])){
echo'
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height:100vh;position:fixed">
    <a href="admin_page.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <img src = "img/pharmalogo.svg"
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto mt-3">
      <li class="nav-item">
        <a href="admin_page.php" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="admin_employ.php"" class="nav-link text-white">
          <i class="fa fa-address-card p-2 menu-icon"></i>
          Quản lý nhân viên
        </a>
      </li>
      <li>
        <a href="admin_order_status.php" class="nav-link text-white">
        <i class="fa fa-handshake p-2 menu-icon"></i>
          Trạng thái giao hàng
        </a>
      </li>
      <li>
        <a href="admin_revenue.php" class="nav-link text-white">
        <i class="fa fa-shopping-bag p-2 menu-icon"></i>
          Doanh thu
        </a>
      </li>
      <li>
        <a href="admin_inventory.php" class="nav-link text-white">
        <i class="fa fa-group p-2 menu-icon"></i>
          Tồn kho
        </a>
      </li>
      <li>
      <a href="admin_invoice.php" class="nav-link text-white">
      <i class="fa fa-book p-2 menu-icon"></i>
        Xuất Phiếu Kho
      </a>
    </li>
    <li>
    <a  href="admin_order.php" class="nav-link text-white">
    <i class="fa fa-book p-2 menu-icon"></i>
      Đơn hàng
    </a>
    </li>
    <li>
    <a  href="admin_user.php" class="nav-link text-white">
    <i class="fa fa-bar-chart p-2 menu-icon"></i>
      Khách hàng
    </a>
    </li>
    <li>
    <a  href="admin_BalanceSheet.php" class="nav-link text-white">
    <i class="fa fa-bar-chart p-2 menu-icon"></i>
    Cân đối kế toán
    </a>
    </li>
    </ul>
    <hr>
    <div class="dropdown mb-3">
      <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <strong class ="text-white">'.$_SESSION['admin_name'].'</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a href="logout.php" class="dropdown-item" href="#">Đăng xuất</a></li>
      </ul>
    </div>
  </div>
';}else {
  echo '<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height:100vh;position:fixed">
      <a href="employ_page.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="uploads/logo.svg">
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto mt-3">
        <li class="nav-item">
          <a href="employ_page.php" class="nav-link active" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
            Home
          </a>
        </li>
        <li>
          <a href="employ_order.php" class="nav-link text-white">
            <i class="fa fa-handshake p-2 menu-icon"></i>
            Đơn hàng
          </a>
        </li>
        <li>
          <a href="employ_user.php" class="nav-link text-white">
            <i class="fa fa-group p-2 menu-icon"></i>
            Khách hàng
          </a>
        </li>
        <li>
          <a href="employ_product.php" class="nav-link text-white">
            <i class="fa fa-shopping-bag p-2 menu-icon"></i>
            Sản phẩm
          </a>
        </li>
        <li>
          <a href="employ_order.php" class="nav-link text-white">
            <i class="fa fa-book p-2 menu-icon"></i>
            Đơn hàng
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tùy chọn
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
            <li><a class="dropdown-item" href="#">K</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <hr>
      <div class="dropdown mb-3">
        <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <strong class="text-white">' . $_SESSION['employ_name'] . '</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a href="logout.php" class="dropdown-item" href="#">Đăng xuất</a></li>
        </ul>
      </div>
    </div>';
}