<?php
if (isset($message)) {
    echo "<p>$message</p>";
}
?>

<h1>Thêm mới khách hàng</h1>
<form method="post">
    <table>
        <tr>
            <td>Tên khách hàng: </td>
            <td><input type="text" name="name" placeholder="Nhập tên" required></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type="email" name="email" placeholder="Nhập mail" required></td>
        </tr>
        <tr>
            <td>Địa chỉ: </td>
            <td><input type="text" name="address" placeholder="Nhập địa chỉ" required></td>
        </tr>
        <tr>
            <td><button type="submit">Thêm mới</button></td>
        </tr>
    </table>
</form>
