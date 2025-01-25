<?php
    include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect | Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container form-signup">
        <form action="process.php" method="post">
            <div class="header">
                <h1> Sign Up</h1>
            </div>
            <div class="form-body">
                <div class="form-group">
                    <label for="user-email">Email : </label>
                    <input type="text" name="email" id="user-email" class="input" value="<?=showFormData('email');?>">
                    <span style="color:red;" class="errormsg email"><?php 

                        if(isset($_SESSION['mail_error'])){
                            echo $_SESSION['mail_error'];
                        }
                        unset($_SESSION['mail_error']);
                    ?></span>
                </div>
                <div class="form-group">
                    <label for="user-bdate"></label>
                    <input type="date" name="bdate" id="user-bdate">
                    <span class="errormsg"></span>
                </div>
                <div class="form-group">
                    <input type="radio" value="Male" name="gender" id="user-male" checked> Male
                    <input type="radio" value="Female" name="gender" id="user-female"> Female
                </div>
                <div class="form-group">
                    <label for="user-name">Username : </label>
                    <input type="text" name="username" id="user-name" class="input" value="<?=showFormData('username');?>">
                    <span style="color:red;" class="errormsg name">
                        <?php

                            if(isset($_SESSION['user_error'])){
                                echo $_SESSION['user_error'];
                            }
                            unset($_SESSION['user_error']);
                        ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="user-pswd"></label>
                    <input type="password" name="pswd" class="input" id="user-pswd">
                    <span style="color:red;" class="errormsg pswd">
                        <?php
                            if(isset($_SESSION['password_error'])){
                                echo $_SESSION['password_error'];
                            }
                            unset($_SESSION['password_error']);
                        ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="user-con-pswd"></label>
                    <input type="password" name="con-pswd" id="user-con-pswd" onkeyup="ismatched()">
                    <span style="color:red;" class="errormsg-conpswd">
                        <?php
                            if(isset($_SESSION['con_password_error'])){
                                echo $_SESSION['con_password_error'];
                            }
                            unset($_SESSION['con_password_error']);
                        ?>
                    </span>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn-signin" id="btn-signin" value="Sign Up" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <!--<script src="script-signup.js"></script>-->
    <script>
        function ismatched(){

            //confirm password matching script
            const pswd = document.getElementById('user-pswd');
            const con_pswd = document.getElementById('user-con-pswd');

            const pass_error = document.querySelector('.errormsg-conpswd');

            if(con_pswd.value != pswd.value){
                pass_error.innerHTML = "Password does not match ."
            }
            else if(con_pswd.value == pswd.value){
                pass_error.innerHTML = "";
            }
        }

        //client side validations null only

        const sign_Btn = document.getElementById('btn-signin');

        const email = document.getElementById('user-email');
        const username = document.getElementById('user-name');
        const pswd = document.getElementById('user-pswd');
        const con_pswd = document.getElementById('user-con-pswd');

        const email_error = document.querySelector('.errormsg.email');
        const name_error = document.querySelector('.errormsg.name');
        const pswd_error = document.querySelector('.errormsg.pswd');

        const inputs = document.querySelectorAll('.input');
        const error_msgs = document.querySelectorAll('.erromsg');


        sign_Btn.addEventListener('click',function(e){
            
            if(!email.value){
                e.preventDefault();
                email_error.innerHTML = "Bro enter your email address .";
            }
            if(!username.value){
                e.preventDefault();
                name_error.innerHTML = "Bro enter your username .";
            }
            if(!pswd.value){
                e.preventDefault();
                pswd_error.innerHTML = "Bro enter your password .";
            }
        });

        

    </script>
    <?php unset($_SESSION['formdata']);?>  
</body>

</html>