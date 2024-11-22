<?php
include 'user.php';
$test = new config();

//student data insert
if(isset($_POST['add'])){
    $test->student_da($_POST);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive menu</title>

    <!-- <link rel="stylesheet" href="style.css"> -->
     <!-- Latest compiled and minified CSS --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 

      <!--jQuery library --> 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 

    <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>
<body>

    <section id="main-form">
    <span class="text-center text-success font-weight-bold"><?php echo @$size_error;  echo @$type_error;  ?></span>

        <h2 class="text-center text-danger pt-3 font-weight-bold">Student managment system</h2>
        <div class="container bg-danger" id="formsetting">
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Add student details</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-12 m-auto">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" placeholder="Enter your first name" class="form-control"
                            required="required">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control"required="required">
                        </div>
                        <div class="form-group">
                            <label>Father Name</label>
                            <input type="text" name="fathername" placeholder="Enter your Father Name" class="form-control"required="required">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="radio" name="gender" value="male" class="form-check-input ml-2">
                            <label class="form-check-label pl-4">Male</label>
                            <input type="radio" name="gender" value="female" class="form-check-input ml-2">
                            <label class="form-check-label pl-4">Female</label>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" placeholder="Enter your City" class="form-control"required="required">
                        </div>
                        <div class="form-group">
                            <label>Nationality</label>
                            <input type="text" name="nationality" placeholder="Enter your Nationality" class="form-control"required="required">
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-5 col-12 m-auto">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" placeholder="Enter your last name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Date of birth</label>
                            <input type="date" name="birthdate" placeholder="Enter your Birthdate" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" placeholder="Enter your Mobile" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>District</label>
                            <input type="text" name="district" placeholder="Enter your District" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" placeholder="Enter your State" class="form-control" required="required">
                        </div>                  
            
                        <div class="form-group">
                            <div class="mb-3">
                                <input type="file" name="image" class="form-control" aria-label="file example" required>
                            </div>
                        </div>
                        <input type="submit" name="add" value="Add detail" class="btn btn-success px-5 mt-2">
                        <span class="text-center text-success font-weight-bold"><?php echo @$success;  echo @$error;  ?></span>
                    </div>
                </div>
            </form>
        </div>
    </section>

 
</body>
</html>  