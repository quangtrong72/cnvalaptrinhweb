<?php
include("../connect.php");

if (isset($_GET['idTL'])) {
    $idTL = $_GET['idTL'];
    $sql = "SELECT * FROM theloai WHERE idTL = $idTL";
    $result = mysqli_query($connect, $sql);
    $d = mysqli_fetch_assoc($result);
}

if (isset($_POST['Sua'])) {
    $theloai = $_POST['TenTL'];
    $thutu   = $_POST['ThuTu'];
    $an      = $_POST['AnHien'];
    $idTL    = $_POST['idTL'];

    $ten_file_moi = $_FILES['image']['name'];
    if ($ten_file_moi != "") {
        $icon = $ten_file_moi;
        move_uploaded_file($_FILES['image']['tmp_name'], "../image/" . $icon);

        $anh_cu = "../image/" . $_POST['ten_anh'];
        if (file_exists($anh_cu)) {
            unlink($anh_cu);
        }
    } else {
        $icon = $_POST['ten_anh'];
    }

    $sql_update = "UPDATE theloai 
                   SET TenTL='$theloai', ThuTu='$thutu', AnHien='$an', icon='$icon' 
                   WHERE idTL='$idTL'";

    if (mysqli_query($connect, $sql_update)) {
        echo "<script>alert('Sửa thành công'); location.href='theloai.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Sửa thể loại</title>
</head>

<body>
    <h2>Sửa thể loại</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table border="0" cellpadding="5" cellspacing="5">
            <tr>
                <td align="right">Tên thể loại:</td>
                <td>
                    <input type="text" name="TenTL" value="<?php echo $d['TenTL']; ?>" required />
                </td>
            </tr>
            <tr>
                <td align="right">Thứ tự:</td>
                <td>
                    <input type="text" name="ThuTu" value="<?php echo $d['ThuTu']; ?>" required />
                </td>
            </tr>
            <tr>
                <td align="right">An / Hien:</td>
                <td>
                    <select name="AnHien">
                        <option value="0" <?php if ($d['AnHien'] == 0) {
                            echo "selected";
                        } ?>>An</option>
                        <option value="1" <?php if ($d['AnHien'] == 1) {
                            echo "selected";
                        } ?>>Hien</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">Icon hiện tại:</td>
                <td>
                    <img src="../image/<?php echo $d['icon']; ?>" width="40" height="40" />
                </td>
            </tr>
            <tr>
                <td align="right">Chọn ảnh mới:</td>
                <td>
                    <input type="file" name="image" />
                    <input type="hidden" name="ten_anh" value="<?php echo $d['icon']; ?>" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="idTL" value="<?php echo $d['idTL']; ?>" />
                    <input type="submit" name="Sua" value="Sửa" />
                    <input type="reset" value="Hủy" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>