<?php
include_once 'model/DBConnect.php';
include_once 'model/CustomerDB.php';
include_once 'model/Customer.php';
include_once 'controller/CustomerController.php';

use controller\CustomerController;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
$controller = new CustomerController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
switch ($page) {
    case 'add':
        $controller->add();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'edit':
        $controller->edit();
        break;
    default:
        $controller->index();
        break;
}
?>
</body>
</html>
