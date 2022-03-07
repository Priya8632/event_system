<?php

include 'conn.php';

$query = "SELECT * FROM event";

$name = $edate = $etime = $namearr = $edatearr = $etimearr="";
if(isset($_REQUEST['submit'])){

    if(!mysqli_query($conn,$query)){
        $createtbl = "CREATE TABLE EVENT(
            event text,
            edate date,
            etime text
        )";
    $tblchk = mysqli_query($conn,$createtbl);
    if(!$tblchk){
        echo mysqli_error($conn);
    }
}

        if(empty($_POST['name'])){
            $namearr = "required";}
        elseif(empty($_POST['edate'])){
            $edatearr = "required";}
        elseif(empty($_POST['etime'])){
            $etimearr = "required";}

        else{
        $name = $_POST['name'];
        $edate = $_POST['edate'];
        $etime = $_POST['etime'];

        $insert  = "INSERT INTO EVENT (`event`,`edate`,`etime`)VALUES('$name','$edate','$etime')";
        $yes = mysqli_query($conn,$insert);
        
        if($yes){
            header('location:message.php');
            
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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">ANGEL</a>
    
    <div class="align">
      <a class="navbar-brand" href="display.php">View Sports</a>
    </div>

</nav>
<div class="container">
    <form method="POST">
        <h2>Add Sports Details</h2>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name'];}?>">
        <span class="error">* <?php echo $namearr;?>
    </div>
    <div class="form-group">
        <label>Event Date</label>
        <input type="date" class="form-control" name="edate" value="<?php if(isset($_POST['edate'])) { echo $_POST['edate'];}?>">
        <span class="error">* <?php echo $edatearr;?>
    </div>
    <div class="form-group">
        <label>Time</label>
        <input type="text" class="form-control" name="etime" value="<?php if(isset($_POST['etime'])) { echo $_POST['etime'];}?>">
        <span class="error">* <?php echo $etimearr;?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
    </div>

    </form>
</div>
</body>
</html>