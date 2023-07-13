<?php
// namespace created
// creating Namespace App\Config DBCredentials class
namespace App\Config;

// including database_credentials.php file
include_once 'database_credentials.php';
// creating alias
use App\Credentials\DBCredentials as DBCredentials;

// creating class Databse class to establish connection with mysql server and to close the cconnection
class DataBase extends DBCredentials
{
    // properties of Database class
    protected $conn;
    //  constructor created
    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user_name, $this->password, $this->Db_name);
        if ($this->conn) {
            // echo"it's working";
        } else {
            echo "couldn't connect";
        }
    }
    // method to close mysql connection
    function con_close()
    {
        mysqli_close($this->conn);
    }
}
// end of class DataBase
// end of namespace App\Config
?>