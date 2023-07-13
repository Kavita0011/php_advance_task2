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

// creating objects of UserController and User
$user_control = new UserController();
$create_obj = new User();
// calling edit_action method of UserController class
$edit_user_data = $user_control->edit_action();
$user_id = $edit_user_data[0];
// if submit is pressed then it will execute query
if (isset($_REQUEST['submit'])) {
    // calling setter_id and setter methods to set id and data of user respectively
    $user_data = $create_obj->setter_id($edit_user_data[0]);
    $user_data = $create_obj->setter($edit_user_data[1], $edit_user_data[2], $edit_user_data[3]);
    //   calling function update_row to update the data
    $user_edit_method = $create_obj->update_row('user');
    //   if successfully executed it will store message of successful insertion in array
    if (isset($user_edit_method)) {
        $message = "Dear  candidate , your data has been updated";
    }

} else {
    $result = $create_obj->read_table(
        $table_name = 'user', $columns = '*', $joins = '',
        $condition = ' user_id= ' . $user_id, $order_by_cloumn_name = '', $order_by = '', $limit = ''
    );
    $user_data = mysqli_fetch_row($result);
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
    <title>update page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <!--  start of container class -->
    <div class="container">
        <!--  start of inner-container class -->
        <div class="inner-container">
            <div>
                <h1>Update operation</h1>
            </div>
            <!--  start of myform class -->
            <div class="myform">
                <form method="post" action="#">
                    <!-- hidden input tag to get current id -->
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"><br>
                    <!--  start of input-boxes class -->
                    <div class="input-boxes">
                        <label for="Name">Name</label>
                        <input type="text" name="user_name" value="<?php
                        if (!isset($_REQUEST['user_name'])) {
                            echo $user_data[1];
                        } else {
                            echo $_REQUEST['user_name'];
                        } ?>"><br>
                    </div>
                    <!--  end of input-boxes class -->
                    <!--  start of input-boxes class -->
                    <div class="input-boxes">
                        <label for="Email">Email</label>
                        <input type="email" name="user_email_id" value="<?php
                        // echo $user_data[2];
                        if (!isset($_REQUEST['user_email_id'])) {
                            echo $user_data[2];
                        } else {
                            echo $_REQUEST['user_email_id'];
                        }
                        ?>"><br>
                    </div>
                    <!--  end of input-boxes class -->
                    <!--  start of input-boxes class -->
                    <div class="input-boxes">
                        <label for="Password">Password</label>
                        <!-- <input type="password" name="user_password" id="mypassword"><br> -->
                        <input type="password" name="password" id="Password" value="<?php
                        // echo $user_data[3];
                        if (!isset($_REQUEST['password'])) {
                            echo $user_data[3];
                        } else {
                            echo $_REQUEST['password'];
                        } ?>"><br><br><br>
                        <span>
                            <input type="checkbox" onclick="show_password()">Show Password</span>
                    </div>
                    <!--  end of input-boxes class -->
                    <!--  start of input-boxes class -->
                    <div class="input-boxes">
                        <div class="btn-link-outer-wrap">
                            <button type="submit" name="submit" value="submit">Submit</button>
                        </div>
                        <div class="link"><a href="index.php">Read data</a></div>
                    </div>
                    <!--  end of input-boxes class -->
                </form>
                <!-- print message here -->
                <div id="message">
                    <?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?>
                </div>

            </div>
            <!--  end of myform class -->
        </div>
        <!--  end of inner-container class -->
    </div>
    <!--  end of container class -->
    <!-- closing connection -->
    <?php
    $create_obj->con_close();
    ?>
    <!-- javascript link for update page -->
    <script src="js/index.js"></script>
</body>

</html>