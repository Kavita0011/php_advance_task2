function show_password() {
  var x = document.getElementById("Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function ask_user(passedArray) {

  console.log(typeof passedArray);
  //    document.write(JSON.stringify(my_array));
  // const vlue =<?php //echo json_encode($i);?>;
  console.log(passedArray[0]);

  // Display the array elements
  var array = "Dear user, \n your id = " + passedArray[0] + " \n your name = " + passedArray[1] + "\n your gmail_id = " + passedArray[2] + "\n your password = " + passedArray[3];
  array += "\n Do you want to delete your data ";
  console.log(array);
  let ask = confirm(array);
  if (ask == true) {
      location.href="delete.php?user_id=" + passedArray[0];
  }
  else {
      document.getElementsByClassName("link").href = "#";
  }
}
