<?php
require "./controller.php";

$controller = new Controller();
$userId = $_GET['userID'];
echo $controller->showUserList($userId);

?>
