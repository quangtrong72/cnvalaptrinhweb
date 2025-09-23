<?php

include("../connect.php");

if (isset($_GET["idTL"])) {
    $idTL = (int) $_GET["idTL"];

    $sql = "DELETE FROM theloai WHERE idTL = $idTL";

    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('Xóa thành công'); location.href='theloai.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
} else {
    echo "<script>alert('Không tìm thấy idTL'); location.href='theloai.php';</script>";
}
