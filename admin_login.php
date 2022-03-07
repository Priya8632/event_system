<?php 

include 'conn.php';

$query = "SELECT * FROM Admin";
$tblQuery = mysqli_query($conn,$query) ;

if(!$tblQuery)
{
    $createtbl = "CREATE TABLE  admin ( id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(100) NOT NULL, password varchar(100) NOT NULL )";

   if(!mysqli_query($conn,$createtbl)){
        echo mysqli_errno($conn); 
 }
}
$adminarr = $pwarr = $error ="";

if(isset($_REQUEST['submit'])){

    $uname = $_POST['admin'];
    $pass = $_POST['pw'];
    
    $fetch_array = mysqli_fetch_assoc($tblQuery);
    
    if ($uname == $fetch_array['username'] && $pass == $fetch_array['password']  ) {
        $_SESSION['aid'] = $fetch_array['id'];
        setcookie('aid',$fetch_array['id'],time() + 60*10);
        header('location:sports.php');
        
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="..//emp_demo/bootstrap.min.css" rel="stylesheet">
    <style>
        .container{
            margin-top: 30px;
            padding:40px;
            border:2px solid black;
            opacity: 0.8;
        }
        h2{
            text-align: center;
        }
        .error{
            color:red;
        }
    </style>

</head>
<body>
    <div class="p-5"></div>
    <div class="p-4"></div>
    <div class="container bg-dark text-light">
        <form action="" method="POST">
            <h2>ADMIN LOGIN</h2>
            <div class="form-group">
                <label for="">ADMIN NAME</label>
                <input type="text" class="form-control" name="admin">
            </div>
            <div class="form-group">
                <label for="">PASSWORD</label>
                <input type="password" class="form-control" name="pw">
            </div>
            
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-info">
                <input type="reset"  name="reset" class="btn btn-danger">
            </div>
        </form>
    </div>

</body>
</html>