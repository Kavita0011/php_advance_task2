<?php
// namespace App\User created
namespace App\User;

// including file configure.php 
if (file_exists('../config/configure.php')) {
    include_once '../config/configure.php';
}
// creating alias for App\Config\DataBase
use App\Config\DataBase as Db;

// creating class User
class User extends Db
{
    // creating properties of User class
    private $id, $name, $email, $user_password;
    // setter method get data from controller 
    function setter($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->user_password = $password;
    }
    // getter method use data in function for sqlqueries taking from controller
    function getter()
    {
        $get_user_data = ['user_name' => $this->name, 'user_email_id' => $this->email, 'password' => $this->user_password];
        return $get_user_data;
    }
    // setter_id method get data or user id  from controller 
    function setter_id($user_id)
    {
        $this->id = $user_id;
    }
    // getter_id method use data or user id in function for sqlqueries from controller 
    function getter_id()
    {
        $get_user_id = ['user_id' => $this->id];
        return $get_user_id;
    }
    // method to insert data in database
    function insert_row($table_name)
    {
        $table_array = $this->getter();
        $table_columns = array_keys($table_array);
        $table_values = array_values($table_array);
        $table_columns = implode(",", $table_columns);
        $table_values = implode("','", $table_values);
        $sql_query = "INSERT INTO $table_name  ( $table_columns ) VALUES ('$table_values')";
        // echo $sql_query;
        $insert_query = mysqli_query($this->conn, $sql_query);
        return $insert_query;
    }
    // method to read data from database
    function read_table($table_name, $column_name = '', $joins = [], $condition = '', $order_by_cloumn_name = '', $order_by = '', $limit = '')
    {
        // GLOBAL VARIABLES SO THAT WE CAN ACCESS THEM OUTSIDE FUNCTIONS ALSO
        //  QUERY TO READ DATA
        global $total_rows;

        // to get columns
        // if columns are array it will convert it into string
        if (is_array($column_name)) {
            $column_names = implode(',', $column_name);

        } else {
            $column_names = $column_name;
        }
        // basic fetch query
        $sql_fetch_query = "SELECT $column_names FROM  $table_name";
        //  applying joins
        if (empty(!$joins)) {
            // join table name is taking array in table
            $join_table_name = array_keys($joins);
            // join table name is taking array in tables primary key 
            $join_table_id = array_values($joins);
            // echo count($joins);
            for ($join_table = 0; $join_table < count($joins); $join_table++) {

                // $sql_fetch_query .=" JOIN $joins ON $table_name.$joins_id =$joins.$joins_id ";
                $sql_fetch_query .= " JOIN $join_table_name[$join_table] ON $table_name.$join_table_id[$join_table] = $join_table_name[$join_table].$join_table_id[$join_table] ";
            }
        }

        // adding condition to query
        if (empty(!$condition)) {
            $sql_fetch_query .= " WHERE $condition ";
        }
        if (empty(!$limit)) {
            $sql_fetch_query .= " LIMIT $limit ";
        }
        if (empty(!$order_by)) {
            $sql_fetch_query .= "ORDER BY $order_by_cloumn_name  $order_by";
        }
        //    echo $sql_fetch_query;
        $data = mysqli_query($this->conn, $sql_fetch_query);
        $total_rows = mysqli_num_rows($data);
        return $data;
    }
    // method to update data in database
    function update_row($table_name)
    {
        $id_value = $this->getter_id();
        $table_array = $this->getter();
        $column = array();
        foreach ($table_array as $column_names => $column_values) {
            $column[] = "{$column_names} = '$column_values'";
        }
        $update_str = implode(' ,', $column);
        $sql_query = "UPDATE $table_name SET $update_str where " . array_keys($id_value)[0] . " = " . array_values($id_value)[0] . " ";
        // echo $sql_query;
        $update_query = mysqli_query($this->conn, $sql_query);
        return $update_query;
    }
    // method to delete data from database

    function delete_row($table_name)
    {
        $id_value = $this->getter_id();
        // echo array_keys($id_value)[0]."  = ".array_values($id_value)[0]." ";
        $sql_query = "DELETE FROM $table_name where  " . array_keys($id_value)[0] . "  = " . array_values($id_value)[0] . " ";
        // echo $sql_query;
        $delete_query = mysqli_query($this->conn, $sql_query);
        return $delete_query;
    }
}
// end of User class
// end of App\User namespace
?>