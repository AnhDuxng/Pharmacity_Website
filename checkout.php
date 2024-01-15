<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacity</title>
    <link rel="icon" href="img/pharmalogo.svg">
    <!---adding logo icon-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/productDetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/c0adbb8084.js" crossorigin="anonymous"></script>
    <style>
    #container {
        box-sizing: border-box;
        padding: 100px 20px !important;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-size: 18px;
        font-weight: bold;
    }

    td img {
        width: 80px;
        height: auto;
    }

    .total-row td {
        font-size: 24px;
        font-weight: bold;
        color: #ff0000;
    }

    #btn {
        display: flex;
        width: 100%;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .form button,
    .form input[type="radio"] {
        width: 50px;
        height: 30px;
        margin-right: 10px;
    }

    .method-group {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .method-group span {
        margin-left: 10px;
        color: #0072bc;
    }

    #btn-momo,
    #btn-payment {
        width: 170px;
        height: 60px;
        border: none;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        border-radius: 10px;



    }

    #btn-momo:hover {
        opacity: 0.9;
        cursor: pointer;
    }

    #btn-payment:hover {
        opacity: 0.9;
        cursor: pointer;
    }

    #btn-payment {
        background-color: #0072bc;
    }

    #btn-momo {
        background-color: #e11b90;
    }
    </style>
</head>

<body>
    <?php include_once 'header.php' ;

    if(isset($_POST['checkout'])){
        $total=$_POST['total'];
        $method=$_POST['method'];
        $MaKH=$_SESSION['MaKH'];
        $sql = "INSERT INTO hoadon(SoTien,PhuongThucTT,MaKH) VALUES($total,'$method','$MaKH')";
        $result = $conn->query($sql);
        $sql = "SELECT * FROM hoadon ORDER BY MaHD DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $MaHD=$row['MaHD'];
        foreach ($_SESSION['cart'] as $key) {
            $MaMH=$key['MaMH'];
            $total=$key['total'];
            $quantity=$key['quantity'];
            $sql = "INSERT INTO cthd(MaHD,MaMH,ThanhTien,Soluong) VALUES($MaHD,'$MaMH',$total,$quantity)";
            $result = $conn->query($sql);
            $sql = "UPDATE tonkho SET SoLuongTon=SoLuongTon-$quantity WHERE MaMH='$MaMH'";
            $result = $conn->query($sql);
        }
        unset($_SESSION['cart']);
    }
    if(isset($_GET['del'])){
        array_splice($_SESSION['cart'], $_GET['del'], 1);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    ?>

    <div id="container" style="display:flex;flex-direction:column;justify-content:center;width:100%">
        <br>
        <br>
        <br>
        <h2 style="color:#0072bc">THÔNG TIN THANH TOÁN</h2>
        <table border="1" style="width:100%;margin-top:30px">
            <thead>
                <tr>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $tong=0;
            $i=0;
                if(isset($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $key) {
                        $tong=$tong+$key['total'];
                        echo'
                        <tr>
            <td><img src="'.$key['img'].'"></td>
            <td>'.$key['nameProduct'].'</td>
            <td>'.$key['price'].' vnđ</td>
            <td>'.$key['quantity'].'</td>
            <td>'.$key['total'].' vnđ</td>
            </tr>
                        ';
                        $i++;
                    }
                }
            ?>
            </tbody>
            <thead>
                <tr>
                    <td colspan="4" style="font-size:24px;font-weight:bold;color:red;">TỔNG TIỀN :</td>
                    <td><?php echo  $tong.' vnđ'; ?></td>
                </tr>
            </thead>
        </table>
        <br>
        <br>
        <br>
        <form action="" target="_blank" method="POST" id="method1-form">
            <div class="btn"
                style="display:flex; width:90%;justify-content:start;place-items:flex-start; flex-direction:column">
                <input type="number" value="<?php echo  $tong; ?>" name="total" hidden>
                <div class="method-group">
                    <input type="radio" id="method1" name="method" checked value="Tiền mặt"><label for="method1">Tiền
                        mặt</label>
                    <span>(Bạn sẽ tiến hành thanh toán sau khi nhận được hàng !)</span>
                </div>
                <div class="method-group">
                    <input type="radio" id="method2" name="method" value="Chuyển khoản"><label for="method2">Chuyển
                        khoản</label>
                    <span>(Vui lòng chuyển khoản qua ngân hàng )</span>
                </div>
                <div class="btn" style="display:flex; width:90%; justify-content:right;">
                    <input type="number" value="<?php echo  $tong; ?>" name="total" hidden>
                    <button id="btn-payment" type="submit" name="checkout">THANH TOÁN</button>
                </div>
            </div>
        </form>
        <br>
        <form action="momo/xulythanhtoanmomo.php" target="_blank" method="POST"
            enctype="application/x-www-form-urlencoded">
            <div class="btn"
                style="display:flex; width:90%;justify-content:start;place-items:flex-start; flex-direction:column">
                <input type="number" value="<?php echo  $tong; ?>" name="total" hidden>
                <button id="btn-momo" type="submit" name="checkout" onclick="submitForm()">QUÉT MÃ MOMO</button>
            </div>
        </form>

        <br>
        <br>
        <br>
    </div>

    <?php include_once 'footer.php' ?>
    <script>
    function submitForm() {
        document.getElementById("method1-form").submit();
    }
    </script>
</body>

</html>