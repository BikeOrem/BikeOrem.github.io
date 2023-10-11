<?php

include('Mail.php');

$con = mysqli_connect('localhost:3306', 'user', 'password', 'db');
if (!$con) {
  die('Connection failed:' . mysqli_connect_error());
}
// else{echo 'Connection success';}

$success = TRUE;

$address = $_POST['address'];
$description = $_POST['description'];
$parking = $_POST['parking'];
$photo = $_POST['photo'];
    
$sql = "INSERT INTO Submissions (address, description, parking, photo) VALUES ('$address', '$description', '$parking', '$photo')";

if (mysqli_query($con, $sql)) {
  echo 'Registration Success, Thank You!';
} else {
  echo 'Error:' . $sql . '<br>' . mysqli_error($con);
  sleep(3);
  if (mysqli_query($con, $sql)) {
     echo 'Registration Success, Thank You!';
  } else {
     echo 'Error:' . $sql . '<br>' . mysqli_error($con);
     sleep(3);
     if (mysqli_query($con, $sql)) {
        echo 'Registration Success, Thank You!';
     } else {
       echo 'Error:' . $sql . '<br>' . mysqli_error($con);
       sleep(3);
       if (mysqli_query($con, $sql)) {
        echo 'Registration Success, Thank You!';
       } else {
         echo 'Error:' . $sql . '<br>' . mysqli_error($con); 
         $success = FALSE;
       }
     }
  }
}

mysqli_close($con);

$to = "timochristensen@gmail.com"; 
$from = "info@bikeorem.org"; 
$subject = "New Parking Map Point";

if($success){
$message = "A new point was submitted at: " . $address . "for the " . $parking . "list." "Description: " . $description;
}
else{
$message = "A new point was submitted at: " . $address . "for the " . $parking . "list." . "but it couldn't be added to the database" . "Description: " . $description;
$subject = "Failed Parking Map Submission";
}

$headers = "From:" . $from;

mail($to,$subject,$message,$headers);

if($success){
    header("Location: https://www.bikeorem.github.io/parking/");
}
else{
    header("Location: https://www.bikeorem.github.io/parking/");
}
die();

?>