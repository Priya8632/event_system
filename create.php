<?php 

include 'conn.php';

$query = "SELECT * FROM event";

if(!mysqli_query($conn,$query))
{
   $createtbl ="CREATE TABLE event(
       id int(10) auto_increment primary key,
       gameName varchar(30),
       gdate date,
       gtime text
   )";
}
$tblchk = mysqli_query($conn,$createtbl);
    if(!$tblchk){
        echo mysqli_error($conn);
    }


?>