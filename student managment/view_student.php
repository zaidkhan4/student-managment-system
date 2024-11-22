<?php

include 'user.php';
$test = new config();

//select student data  code
$sel = $test->select_student_data();

//delete student data code
if(isset($_GET['deletestudent'])){
    $deletestudent = $_GET['deletestudent'];
    $test->DeleteStudentData($deletestudent);
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

    <style>
        .container {
            border-radius: 15px;
        }
        .icon i{
            width: 100px;
            height: 100px;
            background-color: white;
            font-size: 55px;
            color: #dc3545;
            border-radius: 50%;
            padding-top: 18px;
            position: relative;
            left: 35%;
            bottom: 5px;
        }
        .icon i:hover{
            font-size: 65px;
            background: #dc3545;
            color: white;
        }
    </style>


</head>
<body>

    <section id="main-form">

    
    <h3 class="text-center text-success"><?php echo @$_GET['update_success'];
    echo @$_GET['update_error']; echo @$_GET['delete_msg'];    ?></h3>

        <h2 class="text-center text-danger pt-3 font-weight-bold">Student managment system</h2>
        <div class="container bg-info" id="formsetting">
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">View student details</h3>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <table class="table table-bordered  table-responsive ">
                    
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Date of birth</th>
                                <th>Father name</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>District</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Nationality</th>
                                <th>Photos</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead> 
                        <tbody>
                    <?php foreach ($sel as  $val) { ?>
                            <tr>
                                <td><?php echo $val['id']; ?></td>
                                <td><?php echo $val['fname']; ?></td>
                                <td><?php echo $val['lname']; ?></td>
                                <td><?php echo $val['email']; ?></td>
                                <td><?php echo $val['birthdate']; ?></td>
                                <td><?php echo $val['fathername']; ?></td>
                                <td><?php echo $val['mobile']; ?></td>
                                <td><?php echo $val['gender']; ?></td>
                                <td><?php echo $val['district']; ?></td>
                                <td><?php echo $val['city']; ?></td>
                                <td><?php echo $val['state']; ?></td>
                                <td><?php echo $val['nation']; ?></td>
                                <td>
                                    <a href="student_img/<?php echo $val['photos']; ?>">
                                        <img src="student_img/<?php echo $val['photos']; ?> "
                                        width="50" height="50" >
                                    </a>
                                </td>
                                <td>
                                    <a href="edit_student_detail.php?editstudent=<?php echo $val['id']; ?>
                                    " class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>

                                   
                                </td>
                                <td>
                                <a href="view_student.php?deletestudent=<?php echo $val['id']; ?>
                                " class="btn btn-warning"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                    <?php  }   ?>
                        </tbody>                     
                    </table>
                </div>
            </div>
            

        </div>
    </section>

 
</body>
</html>  