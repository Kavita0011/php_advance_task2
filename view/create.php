<?php
//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);
//  including userController.php and user.php files
include_once "../controller/userController.php";
include_once "../model/classes/user.php";
// creating aliases for userController and User
use App\Controller\UserController;
use App\User\User;

//    if submit is pressed then it will execute query
if (isset($_REQUEST['submit'])) {
    // creating objects

    $user_control = new UserController();
    $create_obj = new User();
    // calling add_action() in userController class 
    $add_user = $user_control->add_action();
    $create_obj->setter($add_user[0], $add_user[1], $add_user[2]);
    // calling insert_row() in User class
    $user_added = $create_obj->insert_row('user');
    // if successfully executed it will store message of successful insertion in array
    if (isset($user_added)) {
        $message = "congrats you are added to our mvc family";
    } else {
        $message = "not working";
    }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>create page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/form.css">
</head>

<body>
    <!--  start of container class -->
    <div class="container">
        <!--  start of inner-container class -->
        <div class="inner-container">
            <div>
                <h1>Create operation</h1>
            </div>
            <!--  start of myform class -->

            <div class="myform">
                <form method="post" action="#">
                    <!-- start of input-boxes -->
                    <div class="input-boxes">
                        <label for="Name">Name</label>
                        <input type="text" name="user_name" required><br>
                    </div>
                    <!-- end of input-boxes -->
                    <!-- start of input-boxes -->
                    <div class="input-boxes">
                        <label for="Email">Email</label>
                        <input type="email" name="user_email_id" required><br>
                    </div>
                    <!-- end of input-boxes -->
                    <!-- start of input-boxes -->
                    <div class="input-boxes">
                        <label for="Password" required>Password</label>
                        <input type="password" name="user_password" id="Password"><br><br><br>
                    </div>
                    <!-- end of input-boxes -->
                    <!-- start of input-boxes for button and link -->
                    <div class="input-boxes">
                        <div class="btn-link-outer-wrap">
                            <button type="submit" name="submit" value="submit">Submit</button>
                        </div>
                        <div class="link"><a href="index.php">Read data</a></div>
                    </div>
                    <!-- end of input-boxes for button and link -->
                </form>
                <!-- print the message of successful insertion or error message -->
                <div id="message">
                    <?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?>
                </div>
            </div>
            <!-- end of myform class -->
        </div>
        <!--  end of inner-container class -->
    </div>
    <!--  end of container class -->
    <!-- closing database connection -->
    <?php
    $create_obj->con_close();
    ?>
    <!-- javascript file included here -->
    <script src="assets/js/index.js"></script>
</body>

</html>