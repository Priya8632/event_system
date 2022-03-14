<?php

include 'conn.php';

$q = $_GET['q'];
$sql = "SELECT * FROM EVENT where event = $q";
$check = mysqli_query($conn,$check);

// foreach ($q as $event)
// {
//     echo "<option value='", $event['event'];"'></option>";
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<select>
    <?php
        foreach ($q as $event)
        {
            echo "<option value='", $event['event'];"'></option>";
        }
    ?>
</select>
</body>
</html>