<?php
session_start();

include_once "function/koneksi.php";
include_once "function/helper.php";

$page = isset($_GET['page']) ? $_GET['page'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokek - Belanja Aneka Elektronik</title>
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL . "css/style.css"; ?>">
</head>

<body>
    <div id="container">
        <div id="header">
            <a href="<?php echo BASE_URL . "index.php"; ?>">
                <img src="<?php echo BASE_URL . "images/logo.png"; ?>" alt="">
            </a>

            <div id="menu">
                <div id="user">
                    <?php
                    if ($user_id) {
                        echo "Hai <b>$nama</b>, 
                        <a href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
                        <a href='" . BASE_URL . "index.php?page=logout'>Logout</a>";
                    } else {
                        echo "<a href='" . BASE_URL . "index.php?page=login'>Login</a>
                            <a href='" . BASE_URL . "index.php?page=register'>Register</a>";
                    }
                    ?>
                </div>

                <a id="button-keranjang" href="<?php echo BASE_URL . "index.php?page=keranjang"; ?>">
                    <img src="<?php echo BASE_URL . "images/cart.png"; ?>" alt="">
                </a>
            </div>
        </div>

        <div id="content">
            <?php
            $filename = "$page.php";
            if (file_exists($filename)) {
                include_once $filename;
            } else {
                echo "Maaf, laman tidak ditemukan";
            }
            ?>
        </div>

        <div id="footer">
            <p>copyright Tokek 2021</p>
        </div>
    </div>
</body>

</html>