<?php 

$conn = mysqli_connect("localhost","root","");
if($conn){

    if(!mysqli_select_db($conn,"event")){
        $createdb = " CREATE DATABASE event";
        if(mysqli_query($conn,$createdb)){
            mysqli_select_db($conn,"event");
        }
    }
}
else{
    mysqli_connect_error();
}

?>