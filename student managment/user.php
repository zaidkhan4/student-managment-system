<?php

class config{
    public $server = "localhost";
    public $user = "root";
    public $pass = "";
    public $db = "student_db";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
    //Registration  code start

    public function insert(){
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $sql = $this->conn->prepare("SELECT * FROM  register  WHERE email = :email ");
        $data = [':email' => $email, ];
        $sql->execute($data);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if($result>0){
            echo "<script type='text/javascript'>
                alert('Email id already exists.Please try with another email');        
            </script>";
        }
        else if($password !== $cpassword){
            echo "<script type='text/javascript'>
                alert('Your password do not match');        
            </script>";
        }else{
            $pre = $this->conn->prepare("INSERT INTO register (fullname, email, password, cpassword) VALUES (:fullname, :email, :password, :cpassword) ");
            $data = [
                ':fullname' => $fname,
                ':email' => $email,
                ':password' => $pass,
                ':cpassword' => $cpass,
            ];
            $res = $pre->execute($data);
            if($res){
                echo "Registration successfully";
            }else{ 
                echo "Unable to submit data. please try again...";
            }
        }

    }
    //Registration  code end

    //login code start
    public function logincla(){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = $this->conn->prepare("SELECT * FROM  register  WHERE email = :email ");
        $data = [':email' => $email, ];
        $sql->execute($data);
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $pws_fetch = $result['password'];
        $pws_decode = password_verify($password, $pws_fetch );
        if($pws_decode){
            echo "<script type='text/javascript'>
                window.open('main.php?success=loggedin successfully', '_self')
            </script>";
        }else{
            echo "<script type='text/javascript'>
                window.open('index.php?error=Username or password is incorrect', '_self')
            </script>";
        }
    }

    //login code end

    //student data insert start
    public function student_da(){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $fathername = $_POST['fathername'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $nationality = $_POST['nationality'];
        $image = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];

        if(!$image_type == 'image/jpg' or !$image_type == 'image/png' ) {
            $size_error = "Invalid image formate";
        }else if ($image_size <= 2000) {
            $type_error = "Image size is larger. Image size should be less then 2mb";
        }else {
            move_uploaded_file($image_tmp, "student_img/$image");
            $sql = $this->conn->prepare("INSERT INTO  student_detail (`fname`, `lname`, `email`, `birthdate`, 
            `fathername`, `mobile`, `gender`, `district`, `city`, `state`, `nation`, `photos`) VALUES (:fname, :lname,
            :email, :birthdate, :fathername, :mobile, :gender, :district, :city, :state, :nation, :photos) ");

            $data = [
                ':fname' => $fname,
                ':lname' => $lname,
                ':email' => $email,
                ':birthdate' => $birthdate,
                ':fathername' => $fathername,                
                ':mobile' => $mobile,
                ':gender' => $gender,
                ':district' => $district,
                ':city' => $city,
                ':state' => $state,
                ':nation' => $nationality,
                ':photos' => $image,
            ];
            $result = $sql->execute($data);
            if($result){
                // $success = 
                echo "Data insert successfully";
            }else{ 
                // $error = 
                echo "Error data not inserted";
            }
        }
        

    }

    //student data insert end

    //select student data  code start
    public function select_student_data(){
        $sql = $this->conn->prepare("SELECT * FROM  student_detail ");
        $sql->execute();
        $resu = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resu;
    }

    //select student data  code end

    //get student form data start
    public function getFormData($id){
        $sql = $this->conn->prepare("SELECT * FROM  student_detail  WHERE id = :id ");
        $data = [':id' => $id, ];
        $sql->execute($data);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

  //get student form data end

    //update form data start
    public function UpdateFormData(){
        $sid = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $fathername = $_POST['fathername'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $nationality = $_POST['nationality'];
        $image = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];

            $sql = $this->conn->prepare("SELECT photos FROM student_detail WHERE id = :id");
            $data = [':id' => $id];
            $sql->execute($data);

            $row = $sql->fetch(PDO::FETCH_ASSOC);

            if ($row) { 
                $img = $row['photos']; 
                $filePath = 'student_img/' . $img; 

                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                        echo "File successfully deleted: $filePath";
                    } else {
                        echo "Error deleting the file: $filePath";
                    }
                } else {
                    echo "File does not exist: $filePath";
                }
            } else {
                echo "No record found for the given ID.";
            }

        

        if(!$image_type == 'image/jpg' or !$image_type == 'image/png' ) {
            $size_error = "Invalid image formate";
        }else if ($image_size <= 2000) {
            $type_error = "Image size is larger. Image size should be less then 2mb";
        }else {
            move_uploaded_file($image_tmp, "student_img/$image");

            $sql = $this->conn->prepare("UPDATE student_detail SET 
            `fname`=:fname,
            `lname`=:lname,
            `email`=:email,
            `birthdate`=:birthdate,
            `fathername`=:fathername,
            `mobile`=:mobile,
            `gender`=:gender,
            `district`=:district,
            `city`=:city,
            `state`=:state,
            `nation`=:nation,
            `photos`=:photos 
            WHERE id = :id");


            $data = [
                ':id' => $sid,
                ':fname' => $fname,
                ':lname' => $lname,
                ':email' => $email,
                ':birthdate' => $birthdate,
                ':fathername' => $fathername,                
                ':mobile' => $mobile,
                ':gender' => $gender,
                ':district' => $district,
                ':city' => $city,
                ':state' => $state,
                ':nation' => $nationality,
                ':photos' => $image,
            ];
            $rlt = $sql->execute($data);
            if($rlt){
                echo "<script type='text/javascript'>
                window.open('view_student.php?update_success= Student data Updated Successfully', '_self')
                </script>";
            }else{ 
                echo "<script type='text/javascript'>
                window.open('view_student.php?update_error = Unable to update data. please try again', '_self')
                </script>";
            }

        }


    }

    //update form data end


    //delete student data code start
    public function DeleteStudentData($id){
        $sql = $this->conn->prepare("DELETE FROM  student_detail  WHERE id = :id");
        $data = [ ':id' => $id, ];
        $res = $sql->execute($data);

        if($res){
            header("location: view_student.php");
        }else {
            echo "Data not deleted";
        }

        $fetchSql = $this->conn->prepare("SELECT photos FROM student_detail WHERE id = :id");
        $fetchSql->execute([':id' => $id]);

        $row = $fetchSql->fetch(PDO::FETCH_ASSOC);
        if($row){
            $image = $row['photos'];
            unlink('student_img/' . $image);
        }else{
            echo "image not deleted in folder";
        }

    }

    //delete student data code end

}



?>