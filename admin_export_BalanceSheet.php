<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<title>Trang quản trị</title>
<div class="row">
    <div class="col-lg-2">
        <?php include_once 'admin_header.php';
$ngay = date("d"); $thang = date("m"); $nam = date("Y");
if(isset($_POST['get2'])){
    $nam1=$_POST['nam'];
    $thang1=$_POST['thang'];
    $sql="SELECT SUM(SoTien) as SoTien FROM hoadon WHERE YEAR(NgayLap)='$nam1' AND MONTH(NgayLap)='$thang1'"; 
    $resultCustomer = $conn->query($sql);
    if ($resultCustomer->num_rows > 0) {
            $customerData = $resultCustomer->fetch_assoc();
            $doanhthu = $customerData['SoTien'];
            if($doanhthu==null){
                $doanhthu=0;
            }
        }
        $sql="SELECT SUM(SoTien) as SoTien FROM hoadon WHERE YEAR(NgayLap)>='$nam1' AND MONTH(NgayLap)>'$thang1'"; 
    $resultCustomer = $conn->query($sql);
    if ($resultCustomer->num_rows > 0) {
            $customerData = $resultCustomer->fetch_assoc();
            $tonkho = $customerData['SoTien'];
        }
        $sql="SELECT SUM(tonkho.SoLuongTon * mathang.GiaBan) AS Tich, tonkho.SoLuongTon, mathang.GiaBan
        FROM tonkho
        INNER JOIN mathang ON tonkho.MaMH = mathang.MaMH;"; 
    $resultCustomer = $conn->query($sql);
    if ($resultCustomer->num_rows > 0) {
            $customerData = $resultCustomer->fetch_assoc();
            $tonkho1 = $customerData['Tich'];
        }
}
if(isset($_POST['get3'])){
    $nam1=$_POST['nam'];
    $sql="SELECT SUM(SoTien) as SoTien FROM hoadon WHERE YEAR(NgayLap)='$nam1'"; 
    $resultCustomer = $conn->query($sql);
    if ($resultCustomer->num_rows > 0) {
            $customerData = $resultCustomer->fetch_assoc();
            $doanhthu = $customerData['SoTien'];
            if($doanhthu==null){
                $doanhthu=0;
            }
        }
        $sql="SELECT SUM(SoTien) as SoTien FROM hoadon WHERE YEAR(NgayLap)>'$nam1'"; 
    $resultCustomer = $conn->query($sql);
    if ($resultCustomer->num_rows > 0) {
            $customerData = $resultCustomer->fetch_assoc();
            $tonkho = $customerData['SoTien'];
        }
        $sql="SELECT SUM(tonkho.SoLuongTon * mathang.GiaBan) AS Tich, tonkho.SoLuongTon, mathang.GiaBan
        FROM tonkho
        INNER JOIN mathang ON tonkho.MaMH = mathang.MaMH;"; 
    $resultCustomer = $conn->query($sql);
    if ($resultCustomer->num_rows > 0) {
            $customerData = $resultCustomer->fetch_assoc();
            $tonkho1 = $customerData['Tich'];
        }
}

?>
    </div>
    <div class="col-lg-10">
        <div id="container1">
            <br>
            <h1 style="color:red;">BẢNG CÂN ĐỐI KẾ TOÁN</h1>
            <br>
            <div class="phieu" style="border:1px solid black">
                <div class="title" style="display:flex;justify-content: center;">
                    <br>
                    <br>
                    <h2 style="color: red;">BẢNG CÂN ĐỐI KẾ TOÁN</h2>
                    <br>
                </div>
                <div class="day" style="display:flex;justify-content: center;">
                    <?php echo 'Ngày Xuất: ngày '.$ngay.' tháng '.$thang.' năm '.$nam ?></div>
                <div class="employee" style="display:flex;justify-content: center;">Nhân viên xuất bảng:
                    <?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : $_SESSION['employ_name']; ?>
                </div>
            </div>
            <style>
            table.table-bordered th,
            table.table-bordered td {
                border: 2px solid black;
            }
            </style>
        </div>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center; background-color:aquamarine" rowspan="2">
                        <h1>TÊN CHỈ TIÊU</h1>
                    </th>
                    <th scope="col" style="text-align:center; background-color:aquamarine" rowspan="2">
                        <h1>MÃ CHỈ TIÊU</h1>
                    </th>
                    <th scope="col" style="text-align:center; background-color:aquamarine" colspan="2">
                        <h1>SỐ LIỆU TRÊN BÁO CÁO TÀI CHÍNH</h1>
                    </th>
                </tr>
                <tr>
                    <?php
                    if(isset($_POST['get2'])){
                        echo'
                        <th style="text-align:center;background-color:yellow"><h5>'.$_POST['thang'].' / '.$_POST['nam'].'</h5></th>
                        ';
                    }
                    if(isset($_POST['get3'])){
                        echo'
                        <th style="text-align:center;background-color:yellow"><h5>'.$_POST['nam'].'</h5></th>
                        ';
                    }
                ?>
                </tr>
            </thead>
            <tbody>
                <?php
    $i=1;
    // $id=$_GET['id'];
    $tong=0;
    // $sql = "SELECT * FROM cthd INNER JOIN mathang ON cthd.MaMH=mathang.MaMH WHERE MaHD = $id "; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         $TenMH = $row['TenMH'];
    //         $Soluong = $row['Soluong'];
    //         $ThanhTien = $row['ThanhTien'];
    //         $tong=$tong+$ThanhTien;
    //         echo'
    //         <tr>
    //   <th scope="row">'.$i++.'</th>
    //   <td>'.$TenMH.'</td>
    //   <td>'.$Soluong.'</td>
    //   <td>'.$ThanhTien.'</td>
    // </tr>
    //         ';
    //     }
    // }
    ?>
                <style>
                .machiteu {
                    text-align: center;
                    border: 2px solid black;
                }
                </style>

                <tr>
                    <td colspan="">
                        <h5 style="color:red;">TÀI SẢN</h5>
                    </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="">
                        <h6 style="color:red;">A. TÀI SẢN NGẮN HẠN</h6>
                    </td>
                    <td class="machiteu">100</td>
                    <td><?php echo ($tonkho+$tonkho1+$doanhthu); ?></td>
                </tr>
                <tr>
                    <th colspan="">I. Tiền và các khoản tương đương tiền</th>
                    <td class="machiteu">110</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">1. Tiền</td>
                    <td class="machiteu">111</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">2 Các khoản tương đương tiền</td>
                    <td class="machiteu">112</td>
                    <td>0</td>
                </tr>
                <tr>
                    <th colspan="">II. Đầu tư tài chính ngắn hạn</th>
                    <td class="machiteu">120</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">1. Chứng khoán kinh doanh</td>
                    <td class="machiteu">121</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">2. Dự phòng giảm giá chứng khoán kinh doanh(*)(2)</td>
                    <td class="machiteu">122</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">3. Đầu tư năm giữ đến ngày đáo hạn</td>
                    <td class="machiteu">123</td>
                    <td>0</td>
                </tr>
                <tr>
                    <th colspan="">III. Các khoản phải thu ngắn hạn</th>
                    <td class="machiteu">130</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">1. Phải thu ngắn hạn của khách hàng</td>
                    <td class="machiteu">131</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">2. Phải trả trước cho người bán ngắn hạn</td>
                    <td class="machiteu">132</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">3. phải thu nội bộ ngắn hạn</td>
                    <td class="machiteu">133</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">4. Phải thu theo tiến độ kế hoạch hợp đồng xây dựng</td>
                    <td class="machiteu">134</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">5.Phải thu về cho vay ngắn hạn</td>
                    <td class="machiteu">135</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">6. Phải thu ngắn hạn khác</td>
                    <td class="machiteu">136</td>
                    <td><?php echo $doanhthu; ?></td>
                </tr>
                <tr>
                    <td colspan="">7.Dự phòng phải thu ngắn hạn khó đòi(*)</td>
                    <td class="machiteu">137</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">8.Tài sản thiếu chờ xử lý</td>
                    <td class="machiteu">139</td>
                    <td>0</td>
                </tr>
                <tr>
                    <th colspan="">IV. Hàng tồn kho</th>
                    <td class="machiteu">140</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="">1. Hàng tồn kho</td>
                    <td class="machiteu">141</td>
                    <td><?php echo ($tonkho+$tonkho1); ?></td>
                </tr>
                <tr>
                    <td colspan="">2. Dự phòng giảm giá hàng tồn kho(*)</td>
                    <td class="machiteu">149</td>
                    <td>0</td>
                </tr>
                <tr>
                    <th colspan="">V. Tài sản ngắn hạn khác</th>
                    <td class="machiteu">150</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>