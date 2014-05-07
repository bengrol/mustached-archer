<?php 
spl_autoload_register(
        function ($class) {
    include './classes/' . $class . '.php';
}
);
//
//echo 'POST = ';
//var_dump($_POST);
//
//echo '<br/> GET = ';var_dump($_GET);
?>