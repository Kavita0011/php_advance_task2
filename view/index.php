<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//  including userController.php and user.php files
include_once "../controller/userController.php";
include_once "../model/classes/User.php";
// creating aliases for userController and User
use App\User\User as user;
$create_obj = new user();
// calling read_table()
$result = $create_obj->read_table(
    $table_name = 'user', $columns = '*', $joins = '',
    $condition = '', $order_by_cloumn_name = '', $order_by = '', $limit = ''
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ee598ec6dd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css" />
    <title>read file</title>
</head>

<body>
    <!-- index.page html code -->
    <h1>MVC PROJECT</h1>
    <!-- table to print data -->
    <table border=1px solid align="center">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email_id</th>
            <th>password</th>
            <th>update</th>
            <th>delete</th>
        </tr>

        <?php
        while ($i = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <?php
                echo "<td>" . $i['user_id'] . "</td>";
                echo "<td>" . $i['user_name'] . "</td>";
                echo "<td>" . $i['user_email_id'] . " </td>";
                echo "<td>" . $i['password'] . " </td>";
                // update page link
                echo "<td>" . '<a href="update.php?user_id=' . $i['user_id'] . ' "> '; ?>
                <i class="fa-solid fa-pen-to-square"></i>
                </a></td>
                <td>
                    <?php
                    // storing data in array
                    $user_data = [$i['user_id'], $i['user_name'], $i['user_email_id'], $i['password']];
                    // to encode data from array to string
                    $data = json_encode($user_data);
                    ?>
                    <!-- calling ask_user() in icon to send data and appear confirm box -->
                    <i class="fa-solid fa-trash" onclick=ask_user(<?php echo $data; ?>)></i>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <!-- buuton to send user to the create page -->
        <button class="btns" type="submit" name="submit"><a href="create.php">Add data</a></button>
    </div>
</body>
<?php
// closing connection
$create_obj->con_close();
?>
<!-- javascript file included -->
<script src="assets/js/index.js"></script>
</html>