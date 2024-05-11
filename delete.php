<?php
include "config.php";
if(isset($_GET['id'])){
    $user_id=$_GET['id'];
    $sql="Delete from `students` where `id`='$user_id'";
    $result=$conn->query($sql);
    if($result==True){
        echo "Record delete succesfully";
    }
    else{
        echo "Error:";
    }
}

?>