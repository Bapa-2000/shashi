<?php
include "config.php";
if(isset($_POST['submit'])){
    $first_name=$_POST['firstname'];   //Data receive by the form in the data base
    $last_name=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];


    $sql="insert into `students`(`firstname`,`lastname`,`email`,`password`,`gender`)values('$first_name','$last_name','$email','$password','$gender')";
    $result=$conn->query($sql);

    if($result==TRUE){
        echo "New record created succesfully";
    }
    else{
        echo "Error:".$sql."<br>".$conn->error;
    }
    $conn->close();

}
?>



<!-- Login form to inserted data  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create yhe data</title>
</head>
<body>
    <h2>Signup form</h2>
    <form action="" method="POST">
<fieldset>
<legend>personal inforamtion</legend>
First name:<br>
<input type="text" name="firstname">
<br>
Last name:<br>
<input type="text" name="lastname">
<br>
Email:<br>
<input type="email" name="email">
<br>
Password:<br>
<input type="password" name="password">
<br>
Gender:<br>
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="Female">Female
<br><br>
<input type="submit" name="submit" value="submit">
</fieldset>


    </form>
</body>
</html>