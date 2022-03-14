<?php 

include 'conn.php';


//  $query = "SELECT * FROM event WHERE event = 'khokho'";
//  $rslt = mysqli_query($conn,$query);
//  $adarr = mysqli_fetch_array($rslt);

 $selectTable = "SELECT * FROM student";
 $result = mysqli_query($conn, $selectTable);

 if (!$result) {
     echo mysqli_error($conn);
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../emp_demo/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand">ANGEL</a>
</nav>


<div class="table-responsive"> 
        <table class="table table-hover">
            <thead class="thead-success">                
                <tr>
                    <td>EVENT</td>
                    <td>FULL NAME</td>
                    <td>STANDARD</td>
                    <td>ROLL NO</td>
                    <td>MOBILE NO</td>
                    <td>GENDER</td>
                </tr>
            </thead>
            <tbody>
            <?php  while ( $data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <th><?php echo $data['Event'];?></th>
                    <th><?php echo $data['Full_name'];?></th>
                    <th><?php echo $data['Standard'];?></th>
                    <th><?php echo $data['Roll_no'];?></th>
                    <th><?php echo $data['Mobile'];?></th>
                    <th><?php echo $data['Gender'];?></th>
                </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>  
</body>
</html>