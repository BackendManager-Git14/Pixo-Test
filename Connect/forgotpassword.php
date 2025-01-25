<?php
    include '../functions.php';
    include '../mail-send.php';



    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == 'send-code'){

        $email = $_POST['send_email'];

        if(!emailExist($email)){
            $response = [
                'success' => false,
                'msg' => "Email does not exist kindly enter registered email"
            ];

            header('Content-Type: application/json');
            echo json_encode($response);
        }
        else{
            $verify = rand(1000,9999);

            if(mailSend($email,$verify) === 'ok'){
                $response = [
                    'success' => true,
                    'msg' => 'Confirmation code has been sent to'.$email.' .'
                ];
            
            $_SESSION['forgot-pswd-credentials'] = [
                'user-email' => $email,
                'confirm-code' => $verify
            ];
            
            header('Content-Type: application/json');
            echo json_encode($response);                
            }
            else{

                $response = [
                    'success' => false,
                    'msg' => "Something is wrong ."
                ];
        
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['button'] == 'verify-btn'){
        
        $_SESSION['attempt'] = 0;

        if($_SESSION['attempt'] > 0){
            $response = [
                'success' => false,
                'msg' => "Code expired kindly click on resend code ."
            ];
    
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        else if($_POST['code'] != $_SESSION['forgot-pswd-credentials']['confirm-code']){
            $response = [
                'success' => false,
                'msg' => "Code is not correct ."
            ];

            $_SESSION['attempt'] = 1;
    
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        else{
            $response = [
                'success' => True,
                'msg' => "Verified Successfully ."
            ];
    
            unset($_SESSION['attempt']);
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    if(isset($_POST['confirm-pass'])){

        $filtered_mail = mysqli_escape_string($con,$_SESSION['forgot-pswd-credentials']['user-email']);
        $newPassword = $_POST['forgot-password'];
        $enc_password = md5(mysqli_escape_string($con,$newPassword));

        // UPDATE `users` SET `password` = "aks#4504" WHERE `email` = "axarpatel029@gmail.com";
        $query = "UPDATE `Users` SET `password` = '$enc_password' WHERE `email` = '$filtered_mail'";
        $run = mysqli_query($con,$query);

        unset($_SESSION['forgot-pswd-credentials']);
        $_SESSION['success'] = true;

        if(!$run){
            die("Not working");
        }
        else{
            header("location:http://localhost/Project%20Tests/Connect/conupdated.php");
        }   
    }
?>