<?php
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'admin';
    $action     = isset($_GET['action']) ? $_GET['action'] : 'index';
    $controller = ucfirst($controller);
    $fileController = $controller . "Controller.php";
    $pathController = "controller/$fileController";
    if (!file_exists($pathController)) {
        die("Trang bạn tìm không tồn tại"); //Nếu đoạn này xảy ra, chương trình dừng thực hiện
    }
    require_once "$pathController";
    $classController = $controller."Controller";
    $object = new $classController();
    if (!method_exists($object, $action)) {
        die("Phương thức $action không tồn tại trong class $classController"); //Kiểm tra action có tồn tại trong Controller ko
    }
    $object->$action();
?>