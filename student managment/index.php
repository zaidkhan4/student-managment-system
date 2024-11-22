<?php

include 'user.php';
$test = new config();

//Registration  code
if(isset($_POST['submit'])){
    $test->insert($_POST);
}

//login code
if(isset($_POST['submit1'])){
    $test->logincla($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT MANAGMENT SYSTEM</title>
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
    function content1() {
        document.getElementById("div1").style.display="block";
        document.getElementById("div2").style.display="none";
    }

    function content2() {
        document.getElementById("div1").style.display="none";
        document.getElementById("div2").style.display="block";
    }
</script>
</head>
<body>
    <section>
        <h2 class="text-center text-danger pt-5 pb-5 font-weight-bold">Student Managment System</h2>
        <p class="text-center font-weight-bold text-danger"><?php  echo @$_GET['error'];  ?></p>
        <div class="container bg-danger" id="formsetting">
            <h3 class="text-white text-center py-3">Admin Login | Register panel</h3>

            <div class="row">
                <div class="col-md-7 col-sm-7 col-12">
                    <img src="image/bg-img.jfif" style="width: 100%; height: 100%; background-size: cover;"
                    class="img-fluid" alt="Responsive image"> 
                </div>
                <div class="col-md-5 col-sm-5 col-12">

                    <button class="btn btn-info px-5" onclick="content1()">Register</button>
                    <button class="btn btn-info px-5" onclick="content2()">Login</button>

                    <div id="div1" ><br>
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="text-white"> Full Name</label>
                            <input type="text" name="fname" placeholder="Enter your name" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label class="text-white">Email</label>
                            <!-- <span class="float-right text-white font-weight-bold">?php echo $email_err;  ?></span> -->
                            <input type="email" name="email" placeholder="Enter your Email" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label class="text-white">Password</label>
                            <input type="password" name="password" placeholder="Enter your Password" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label class="text-white">Confirm Password</label>
                            <!-- <span class="float-right text-white font-weight-bold">?php echo $pws_err; ?></span> -->
                            <input type="password" name="cpassword" placeholder="RE-enter your Password" class="form-control" required="required">
                        </div>

                        <input type="submit" name="submit" value="Register" class="btn btn-success px-5">

                        <!-- <span class="float-right text-white font-weight-bold"><//?php echo $success; echo $error   ?></span> -->
                    </form>
                    </div>
                    <div id="div2" style="display: none;">
                        <form action="" method="post">
                            <div class="form-group">
                                <label class="text-white">Email</label>
                                <input type="email" name="email" placeholder="Enter your Email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="text-white">Password</label>
                                <input type="password" name="password" placeholder="Enter your Password" class="form-control">
                            </div>

                            <input type="submit" name="submit1" value="Login" class="btn btn-success px-5">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>