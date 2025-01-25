<!-- divide the data , validate them , on success create array and send them to database php script -->

<?php
include 'functions.php';

if (isset($_POST['btn-signin'])) {

    $isvalid = true;
    $_SESSION['formdata'] = $_POST;

    //email validations

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $mail_error = "Kindly provide your email in proper format .";
        $isvalid = false;
        $_SESSION['mail_error'] = $mail_error;
        header("location:Connect/conupdated.php");
    }
    //this function will check if email exist in database , in short one email for one user
    else if (emailExist($_POST['email'])) {
        $mail_error = "Email already exist .";
        $isvalid = false;
        $_SESSION['mail_error'] = $mail_error;
        header("location:Connect/conupdated.php");
    } else {
        $email = trim($_POST['email']);
    }

    //username validations

    if (strlen($_POST['username']) <= 5 || strlen($_POST['username']) >= 15) {
        $user_error = "Username must be 6 or 15 characters long .";
        $isvalid = false;
        $_SESSION['user_error'] = $user_error;
        header("location:Connect/conupdated.php");
    } else if (userExist($_POST['username'])) {
        $user_error = "Username already exist .";
        $isvalid = false;
        $_SESSION['user_error'] = $user_error;
        header("location:Connect/conupdated.php");
    } else {
        $username = trim($_POST['username']);
    }

    if ($isvalid == true) {

        $username = mysqli_escape_string($con,$username);

        $bdate = mysqli_escape_string($con,$_POST['bdate']);

        $gender = mysqli_escape_string($con,$_POST['rbtn-gender']);

        $email = mysqli_escape_string($con,$_POST['email']);

        $pswd = md5(mysqli_escape_string($con,$_POST['pswd']));

        $ac_status = 0; //which means unverified user 

        $query = "INSERT INTO `users` (`email`,`password`,`date_of_birth`,`username`,`gender`,`ac_status`) values('$email','$pswd','$bdate','$username','$gender',$ac_status)";
        $run = mysqli_query($con,$query);

        if(!$run){
            die();
        }
        
        header("location:http://localhost/Project%20Tests/result.php");
        
        //Data must be inserted like this
        // Array
        // (
        //     [0] => binaryID
        //     [1] => 2025-01-10
        //     [2] => Male
        //     [3] => patelpravinp66@gmail.com
        //     [4] => a25d2a4d3f57a81cf51d5ce4b8f9c62a password
        // )


    }

}

if(isset($_POST['btn-login'])){
    $_SESSION['userdata'] = $_POST;

    $enc_password = md5(mysqli_escape_string($con,$_POST['log-user-pswd']));

    if(!userExist($_POST['log-user-name'])){
        $login_user_error = "User does not exist .";
        $isvalid = false;
        $_SESSION['login_user_error'] = $login_user_error;
        header("location:Connect/conupdated.php");
    }

    if(!passwordMatch($_POST['log-user-name'],$enc_password)){
        $login_pswd_error = "Incorrect password for ".$_POST['log-user-name'].".";
        $isvalid = false;
        $_SESSION['login_pswd_error'] = $login_pswd_error;
        header("location:Connect/conupdated.php");
    }
}

    // if(!emailExist($_POST['email'])){
    //     $mail_error = "Email not found .";
    //     $isvalid = false;
    //     echo "<script>
    //             document.getElementById('forgot_email_err').innerHTML = $mail_error;
    //          </script>";
    // }
    // if($isvalid == true){
    //     echo "showForm(1)";
    // }

?>