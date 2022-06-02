<?php 

/**
 * Plugin Name: Standopsætning og fremvisning
 */


$connect = new wpdb('idathoet_com','fxHBp2mG6Ezk','idathoet_com_db_genbrugshallerne','mysql32.unoeuro.com');


function getAllStande(){
   global $connect;

   $sql = "SELECT stand.*, stand_pictures.link 
   FROM stand, stand_pictures
   WHERE stand_pictures.standID AND stand.ID = $id";
   $result = $connect->get_results($sql);

   return $result;
}


function getStand($id){
   global $connect;

   $sql = "SELECT stand.*, stand_pictures.link, pictures.link
   FROM stand, stand_pictures, pictures
   WHERE pictures.standID = stand.ID AND stand_pictures.standID = stand.ID AND stand.ID = $id";
   $result = $connect->get_results($sql);

   return $result;
}  


function getTags(){
   global $connect;

   $sql = "SELECT * FROM tags";
   $result = $connect->get_results($sql);

   return $result;
}  

function login($username, $password){
   global $connect;

   $sql= "SELECT ID, username, password FROM users WHERE username='".$username."'";
   $result = $connect->query($sql);
   $row = $result->fetch_object();

   if (isset($_POST['login'])){
      if ($username == $row->Username && $password == $row->Password){
         $_SESSION['UserID'] = $row->UserID;
         header('location:../home.php');
      } else {
         header('location:../login.php');
      }
   }
}


function uploadPicture(){

   session_start();
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);

   $allowedExts = array("jpg", "jpeg", "gif", "png", "heic", "bmp");
   $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

   if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/png")
      || ($_FILES["file"]["type"] == "image/heic")
      || ($_FILES["file"]["type"] == "image/bmp"))

      && ($_FILES["file"]["size"] < 36000000)
      && in_array($extension, $allowedExts))

   {
    if ($_FILES["file"]["error"] > 0) {
     echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  } else {

  // Verifikation:
  // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  //  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  //  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  //  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

     if (file_exists("../../uploads/user-uploads/" . $_FILES["file"]["name"])){
      echo $_FILES["file"]["name"] . " already exists. ";
   } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
         "../../uploads/user-uploads/" . $_FILES["file"]["name"]);

    //  echo "Stored in: " . "../media/" . $_FILES["file"]["name"];
      header("Location:../upload-done.php");
   }
}
} else {
 echo "Return Code: " . $_FILES["file"]["name"] . "<br />";
 echo "Invalid file";
 print_r($_FILES);
}
}

?>