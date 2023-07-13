<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//  including userController.php and user.php files
include_once "../controller/userController.php";
include_once "../model/classes/user.php";
// creating aliases for userController and User
use App\Controller\UserController;
use App\User\User;

//  creating objects
$user_control = new UserController();
$create_obj = new user();
// calling delete_ction() from handle data coming from index page (read page)
$user_data = $user_control->delete_action();
// setter_id() to set user id
$user = $create_obj->setter_id($user_data);
// delete_row() to execute delete data from database 
$delete = $create_obj->delete_row($table_name = 'user');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <!-- delete query html page -->
    <h1>DELETE QUERY PAGE</h1>
    <?php
    // if query executed print message for user
    if (isset($delete)) {
        echo "Dear candidate, your id is $user_data , is successfully deleted ";
        // header("loaction : index.php"); 
        // die();
        echo "<br> redirecting ..... ";
        ?>
        <!-- scrpit code for redirecting user to index.php -->
        <script>setTimeout(function () { window.location.href = "index.php"; }, 3000); </script>
    <?php } else {
        echo "error occured in deleting row";
    }
    // closing connection
    $create_obj->con_close();
    ?>
</body>

</html>