<?php 

include 'conn.php';
$query = "SELECT  * FROM STUDENT";


    if(!mysqli_query($conn,$query)){
    
        $createtbl = "CREATE TABLE student(
        Id int(10) auto_increment primary key,
        Game text,
        Full_name text,
        Standard text,
        Roll_no int(3),
        Mobile int(10),
        gender text
    )";
    $tblchk = mysqli_query($conn,$createtbl);
    if(!$tblchk){
        echo mysqli_error($conn);
    }
    }

if(isset($_REQUEST['submit'])){



    if(empty($_POST['fname'])){
        $fnamearr = "fname is required";}
    elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fname'])){
        $fnamearr = "only character and letter ";    }
    elseif(empty($_POST['gender'])){
        $genderarr = "gender is required";}

    else{

    $game =$_POST['game'];
    $fname = $_POST['fname'];
    $std = $_POST['std'];
    $rollno = $_POST['rollno'];
    $mob = $_POST['mob'];
    $gender = $_POST['gender'];
    

    $insert = "INSERT INTO student
        (`Game`,`Full_name`,`Standard`,`Roll_no`,`Mobile`,`gender`) VALUES 
        ('$fname','$lname','$email','$pw','$cw','$gender','$age','$dept','$doj','$sal','$alldata','$imagepath')";
    
        if(mysqli_query($conn,$insert)){
            header('location:user_login.php');
        } 
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
    <link href="../emp_demo/bootstrap.min.css" rel="stylesheet">
    <style>
        form{
            padding:30px;
            background-color:lightgray;
        }  
        .error{
            color:red;
        }
        .container{
            margin-top:30px;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <h2>Ragister Form</h2>
        <form action="">
            <div class="gorm-group">
                <label>GAME</label>
                <select name="" id="" class="form-control" name="game"> 
                    <option value="">---select---</option> 
                    <option value="chess">CHESS</option>
                    <option value="khokho">KHOKHO</option>
                    <option value="cricket">CRICKET</option>
                    <option value="football">FOOTBALL</option>
                </select>
            </div>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="fname">
            </div>
            <div class="form-group">
                <label>Standard</label>
                <input type="text" class="form-control" name="std">
            </div>
            <div class="form-group">
                <label>Roll No</label>
                <input type="text" class="form-control" name="rollno">
            </div>
            <div class="form-group">
                <label>Mobile No</label>
                <input type="text" class="form-control" name="mobileno">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) == 'male') { echo 'checked';}?>>MALE
                <input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) == 'female') { echo 'checked';}?>>FEMALE
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</body>
</html>