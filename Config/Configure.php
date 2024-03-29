<?php
// namespace created
// creating Namespace App\Config\Configure DBCredentials class
namespace App\Config\Configure;

// including database_credentials.php file
include_once 'DBCredentials.php';
// creating alias
use App\Config\DBCredentials\DBCredentials as DBCredentials;
use Exception;

// creating class Configure class to establish connection with mysql server and to close the cconnection
class Configure extends DBCredentials
{
    // properties of Database class
    protected $conn;
    //  constructor created
    function __construct()
    {
      try{
        $this->conn = mysqli_connect($this->host, $this->user_name, $this->password, $this->Db_name);
        if ($this->conn){
            // echo "it's working";
        } 
        else{
            throw new Exception('Unable to connect to the DataBase');
        }

      }
      catch( Exception $e){
        echo " Error Message : ".$e->getMessage() ."<br>";
      }
        
        // // establishing connection with mysql server
        // $this->conn = mysqli_connect($this->host, $this->user_name, $this->password, $this->Db_name);
        // if ($this->conn) {
        //     // echo"it's working";
        // } else {
        //     echo "couldn't connect";
        // }
    }
    // method to close mysql connection
    function con_close()
    { try{
        mysqli_close($this->conn);
    }
    catch( Exception $e){
        echo $e->getMessage();
    }
    }
}
// $my_obj=new Configure();
// end of class Configure
// end of namespace App\Config\Configure
?>