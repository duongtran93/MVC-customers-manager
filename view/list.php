
<h1>Danh sách khách hàng</h1>
<button><a href="index.php?page=add" style="text-decoration: none">Thêm mới</a></button>
<table border="1">
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
    </tr>
    <tr>
        <?php foreach ($customers as $key => $customer): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $customer->name ?></td>
            <td><?php echo $customer->email ?></td>
            <td><?php echo $customer->address ?></td>
            <td><a href="index.php?page=delete&id=<?php echo $customer->id?>">Delete</a></td>
            <td><a href="index.php?page=edit&id=<?php echo $customer->id?>">Update</a></td>
        </tr>
        <?php endforeach; ?>
    </tr>
</table>