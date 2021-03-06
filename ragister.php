<?php

include 'conn.php';
$query = "SELECT  * FROM STUDENT";

$fnamearr = $genderarr = $stdarr = $rollarr = $mobarr = $gamearr = "";
$game = $fname = $std = $mob = $rollno = $gender = "";

if (isset($_REQUEST['submit'])) {
    if (!mysqli_query($conn, $query)) {

        $createtbl = "CREATE TABLE student(
        Id int(10) auto_increment primary key,
        Event text,
        Full_name text,
        Standard int(3),
        Roll_no int(3),
        Mobile int(10),
        Gender text
    )";
        $tblchk = mysqli_query($conn, $createtbl);
        if (!$tblchk) {
            echo mysqli_error($conn);
        }
    }

    if (empty($_POST['event'])) {
        $gamearr = "required";
    } elseif (empty($_POST['fname'])) {
        $fnamearr = "fname is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['fname'])) {
        $fnamearr = "only character and letter ";
    } elseif (empty($_POST['gender'])) {
        $genderarr = "gender is required";
    } elseif (empty($_POST['std'])) {
        $stdarr = "standard is required";
    } elseif (!preg_match("/[0-9]/", $_POST['std'])) {
        $stdarr = "only number of std";
    } elseif (empty($_POST['mob'])) {
        $mobarr = "mobile number is required";
    } elseif (!preg_match("/[0-9]/", $_POST['mob'])) {
        $mobarr = "only mobile no";
    } elseif (empty($_POST['rollno'])) {
        $rollarr = "rollno number is required";
    } elseif (!preg_match("/[0-9]/", $_POST['rollno'])) {
        $rollarr = "only rollno number";
    } else {

        $event = $_POST['event'];
        $fname = $_POST['fname'];
        $std = $_POST['std'];
        $rollno = $_POST['rollno'];
        $mob = $_POST['mob'];
        $gender = $_POST['gender'];


        $insert = "INSERT INTO student
        (`Event`,`Full_name`,`Standard`,`Roll_no`,`Mobile`,`Gender`) VALUES 
        ('$event','$fname','$std','$rollno','$mob','$gender')";

        if (mysqli_query($conn, $insert)) {
            header('location:message.php');
        } else {
            echo mysqli_error($conn);
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
        form {
            padding: 30px;
            background-color: lightgray;
        }

        .error {
            color: red;
        }

        .container {
            margin-top: 30px;
        }
    </style>
    <!-- <script>
                        function showUser(str) {
                            if (str == "") {
                                document.getElementById("txtHint").innerHTML = "";
                                return;
                            } else {
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    console.log("ready state",this.readystate)
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("txtHint").innerHTML = this.responseText;
                                    }
                                };
                                xmlhttp.open("GET", "getuser.php?q=" + str, true);
                                xmlhttp.send();
                            }
                        }
                    </script> -->

</head>

<body>
    <div class="container">
        <h2>Ragister Form</h2>
        <form action="" method="POST">

            <div class="gorm-group">
                <label>GAME</label>
                <?php 
                    $sql = "SELECT event FROM EVENT";
                    $check = mysqli_query($conn,$sql);
                    $rows = mysqli_num_rows($check);
                ?>
                <select class="form-control" name="event">
                    <option value="">--select--</option>
                    <?php 
                        for($i=0;$i<$rows;$i++)
                        {
                            $no = mysqli_fetch_array($check);
                    ?>
                    
                    <option value="<?php echo $no['event'];?>"><?php echo $no['event'];?></option>
                    
                  <?php  } ?>
 
                </select> <span class="error">* <?php echo $gamearr; ?>
            </div>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="fname" value="<?php if (isset($_POST['fname'])) {
                                                                                echo $_POST['fname'];
                                                                            } ?>">
                <span class="error">* <?php echo $fnamearr; ?>
            </div>

            <div class="form-group">
                <label>Standard</label>
                <input type="text" class="form-control" name="std" value="<?php if (isset($_POST['std'])) {
                                                                                echo $_POST['std'];
                                                                            } ?>">
                <span class="error">* <?php echo $stdarr; ?>
            </div>

            <div class="form-group">
                <label>Roll No</label>
                <input type="text" class="form-control" name="rollno" value="<?php if (isset($_POST['rollno'])) {
                                                                                    echo $_POST['rollno'];
                                                                                } ?>">
                <span class="error">* <?php echo $rollarr; ?>
            </div>

            <div class="form-group">
                <label>Mobile No</label>
                <input type="text" class="form-control" name="mob" value="<?php if (isset($_POST['mob'])) {
                                                                                echo $_POST['mob'];
                                                                            } ?>">
                <span class="error">* <?php echo $mobarr; ?>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <input type="radio" name="gender" value="male" <?php if (isset($_POST['gender']) == 'male') {
                                                                    echo 'checked';
                                                                } ?>>MALE
                <input type="radio" name="gender" value="female" <?php if (isset($_POST['gender']) == 'female') {
                                                                        echo 'checked';
                                                                    } ?>>FEMALE
                <span class="error">* <?php echo $genderarr; ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
            </div>

        </form>
    </div>
</body>

</html>