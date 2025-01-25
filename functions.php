<?php

    include 'dbconfig.php';
    session_start();

    function showFormData($formField){
        if(isset($_SESSION['formdata']) && $_SESSION['formdata'] != null){
            $data = $_SESSION['formdata'];

            return $data[$formField];
        }
        elseif(isset($_SESSION['userdata']) && $_SESSION['userdata'] != null){
            $data = $_SESSION['userdata'];

            return $data[$formField];
        }
        else{
            return '';
        }

    }



    //to check email or username exist in database 
    function emailExist($input_email){
        global $con;
        $query = "Select count(`email`) as `email_count` from `Users` where `email` = '$input_email'";
        $run = mysqli_query($con,$query);
        $result = mysqli_fetch_assoc($run);
        return $result['email_count'];
    }

    function userExist($input_username){
        global $con;
        $query = "Select count(`username`) as `user_count` from `Users` where `username` = '$input_username'";
        $run = mysqli_query($con,$query);
        $result = mysqli_fetch_assoc($run);
        return $result['user_count'];
    }

    function passwordMatch($input_username,$input_password){
        global $con;
        $query = "Select `username`,`password` from `Users` where `username` = '$input_username' AND `password` = '$input_password'";
        $run = mysqli_query($con,$query);
        $result = mysqli_fetch_assoc($run);
        return $result['username'];
    }
?>

