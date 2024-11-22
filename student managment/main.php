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
        <h2 class="text-center text-danger pt-3 font-weight-bold">Student managment system</h2>
        <div class="container bg-danger" id="formsetting">
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Welcome to dashboard</h3>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="add_student.php" class="text-white text-center">
                        <i class="fa fa-user"></i><h3>Add student detail</h3></a>
                </div>

                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="view_student.php" class="text-white text-center">
                        <i class="fa fa-eye"></i><h3>View student detail</h3></a>
                </div>

                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="edit_student.php" class="text-white text-center">
                        <i class="fa fa-pencil"></i><h3>Edit student detail</h3></a>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="#" class="text-white text-center">
                        <i class="fa fa-user"></i><h3>Add teacher detail</h3></a>
                </div>

                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="#" class="text-white text-center">
                        <i class="fa fa-eye"></i><h3>View teacher detail</h3></a>
                </div>

                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="#" class="text-white text-center">
                        <i class="fa fa-pencil"></i><h3>Edit teacher detail</h3></a>
                </div>
            </div>

        </div>
    </section>

 
</body>
</html>  