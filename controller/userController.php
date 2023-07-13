<?php
// creating Namespace App\Config DBCredentials class
namespace App\Controller;
//created userController class handles all the requests from view and send data to model()  
class UserController
{
  // properties of userController class
    public $user_id;
    private $user_name,$user_email,$user_password;
    // add_action method to handle data coming from create page
  function add_action(){
    if (isset($_REQUEST['user_name']) && isset($_REQUEST['user_email_id']) && isset($_REQUEST['user_password']) ) {
    $this->user_name=$_REQUEST['user_name'];
    $this->user_email=$_REQUEST['user_email_id'];
    $this->user_password=$_REQUEST['user_password'];
   $add_data=[$this->user_name,$this->user_email,$this->user_password];
   return $add_data;
  }
}
    // delete_action method to handle data coming from  delete page
  function delete_action(){
    if (isset($_REQUEST['user_id']) ) {
      $this->user_id=$_REQUEST['user_id'];  
      return $this->user_id;
    }
  else{
    echo "error in user data(delete action)";
  }}
  // edit_action method to handle data coming from  update page
  function edit_action() {
    if (isset($_REQUEST['user_id']))
    { 
      $this->user_id=$_REQUEST['user_id'];
      $user_editted_data=[$this->user_id];
      if(isset($_REQUEST['user_name']) && isset($_REQUEST['user_email_id']) && isset($_REQUEST['password']) ) {    
      $this->user_name=$_REQUEST['user_name'];
      $this->user_email=$_REQUEST['user_email_id'];
      $this->user_password=$_REQUEST['password'];    
     array_push($user_editted_data,$this->user_name,$this->user_email,$this->user_password);
    }
   }
    else{
      echo "error in updated data";
    }
    return $user_editted_data;
  }
}
// end of class userController
// end of  Namespace App\Config DBCredentials class
?>