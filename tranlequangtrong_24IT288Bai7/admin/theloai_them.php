<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Thêm thể loại</title>
</head>

<body>
    <form action="theloai_them_xl.php" method="post" enctype="multipart/form-data">
        <table align="left" width="400">
            <tr>
                <td align="right">Tên thể loại</td>
                <td><input type="text" name="TenTL" /></td>
            </tr>
            <tr>
                <td align="right">Thứ tự</td>
                <td><input type="text" name="ThuTu" /></td>
            </tr>
            <tr>
                <td align="right">An Hien</td>
                <td>
                    <select name="AnHien">
                        <option value="0">An</option>
                        <option value="1">Hien</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">Icon</td>
                <td><input type="file" name="image" /></td>
            </tr>
            <tr>
                <td align="right"><input type="submit" name="Them" value="Thêm" /></td>
                <td><input type="reset" name="Huy" value="Hủy" /></td>
            </tr>
        </table>
    </form>
</body>

</html>