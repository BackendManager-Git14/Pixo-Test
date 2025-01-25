<?php
include '../functions.php';
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect With Us | PixQuote</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="connectup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lusitana:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <main class="<?php
    if (isset($_SESSION['user_error']) || isset($_SESSION['mail_error']) && ($_SESSION['user_error'] != null || $_SESSION['mail_error'] != null)) {
        echo "form-mode";
    } else {
        echo "";
    } ?>">
        <nav>
            <a href="default.aspx">
                <!-- <img src="/Pixels/pix-quote.jpg" height="200" width="250"> -->
            </a>
            <div id="navp2">

                <h4><a href="#">Content</a></h4>
                <h4><a href="#">About Us</a></h4>

            </div>
        </nav>
        <div class="container box">
            <div class="inner-box">
                <div class="form-section">
                    <form action="../process.php" method="post" id="join-form" class="form">
                        <div class="heading">
                            <h3>Welcome Back </h3>
                            <h6>Not Registered yet? </h6>
                            <a href="#" class="toggle">Sign Up </a>
                        </div>

                        <div class="form-group">
                            <input type="text" autocomplete="off" class="input-field <?php
                            if (isset($_SESSION['userdata']) && $_SESSION['userdata'] != null) {
                                if (showFormData('log-user-name')) {
                                    echo "active";
                                }
                            } ?>" name="log-user-name" id="log-user-name" value="<?php
                             if (isset($_SESSION['userdata']) && $_SESSION['userdata'] != null) {
                                 echo showFormData('log-user-name');
                             } else {
                                 echo "";
                             }
                             ?>" />
                            <label for="user-name">Name </label>
                            <span id="name_err" class="errormsg login-username">
                                <?php
                                if (isset($_SESSION['login_user_error'])) {
                                    echo $_SESSION['login_user_error'];
                                }
                                unset($_SESSION['login_user_error']);
                                ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" autocomplete="off" class="input-field" name="log-user-password"
                                id="log-user-password" />
                            <label for="user-password">Password </label>
                            <span id="pass_err" class="errormsg login-pswd">
                                <?php
                                if (isset($_SESSION['login_pswd_error'])) {
                                    echo $_SESSION['login_pswd_error'];
                                }
                                unset($_SESSION['login_pswd_error']);
                                ?>
                            </span>
                        </div>
                        <div class="form-link" style="margin-bottom: 15px;">
                            <a type="button" class="form-link text-decoration-none" id="forget-link"
                                style="color: white;">Forgot
                                Password..?</a>
                        </div>

                        <input type="submit" name="btn-login" value="Let's Go" id="btn-login" class="form-btns">
                    </form>

                    <form action="../process.php" method="post" id="join-reg-form" class="form"
                        style="margin-left: 3rem;">
                        <div class="heading">
                            <h6>Register Yourself with <i style="color:#e3674b">Pixo </i></h6>

                            <h3 style="margin-top: 0.7rem;">Get Started... </h3>
                            <h6>Already done? </h6>
                            <a href="#" class="toggle">Log in </a>
                        </div>
                        <div class="form-elements">
                            <div class="form-group">

                                <input type="text" name="username" id="user-name" class="input-field <?php
                                if (isset($_SESSION['formdata']) && $_SESSION['formdata'] != null) {
                                    if (showFormData('username')) {
                                        echo " active";
                                    }
                                } ?>" autocomplete="off" value="<?php
                                 if (isset($_SESSION['formdata']) && $_SESSION['formdata'] != null) {
                                     echo showFormData('username');
                                 } else {
                                     echo "";
                                 }
                                 ?>" />
                                <label for="username">Username </label>
                                <span class="errormsg name">
                                    <?php

                                    if (isset($_SESSION['user_error'])) {
                                        echo $_SESSION['user_error'];
                                    }
                                    unset($_SESSION['user_error']);
                                    ?>
                                </span>

                                <!-- <input type="text" autocomplete="off" class="input-field" name="user-reg-name" id="user-reg-name" />
                                    <label for="user-reg-name">Username </label>
                                    <span id="name_reg_err"></span> -->

                            </div>
                            <div class="radio-btns">
                                <label for="gender"
                                    style="position: relative; top: 15px; height: 22px; left: -18px;">Gender:</label>
                                <div class="form-group" style="height: 37px; width: 90px; margin: 0.5rem;">
                                    <input type="radio" name="rbtn-gender" id="user-gender-male" class="rbtn"
                                        value="Male" checked />
                                    <div class="radio-tile">
                                        <label for="rbtn-gender-male" class="rbtn-labels" style="color: white;">M
                                        </label>
                                        <img src="../Visuals/male-gender.png" alt="" height="20" width="20" />
                                    </div>
                                </div>
                                <div class="form-group" style="height: 37px; width: 91px; margin: 0.5rem;">
                                    <input type="radio" name="rbtn-gender" id="user-gender-female" class="rbtn"
                                        value="Female" />
                                    <div class="radio-tile">
                                        <label for="rbtn-gender-male" class="rbtn-labels" style="color: white;">F
                                        </label>
                                        <img src="../Visuals/femenine.png" alt="" height="20" width="20" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="date" name="user-date" class="input-field" id="user-date"
                                    autocomplete="off" />
                            </div>

                            <div class="form-group">
                                <div class="form-group">

                                    <input type="text" name="email" id="user-email" class="input-field <?php
                                    if (isset($_SESSION['formdata']) && $_SESSION['formdata'] != null) {
                                        if (showFormData('email')) {
                                            echo " active";
                                        }
                                    } ?>" autocomplete="off" value="<?php
                                     if (isset($_SESSION['formdata']) && $_SESSION['formdata'] != null) {
                                         echo showFormData('email');
                                     } else {
                                         echo "";
                                     }
                                     ?>">
                                    <label for="email">Email </label>
                                    <span class="errormsg email">
                                        <?php

                                        if (isset($_SESSION['mail_error'])) {
                                            echo $_SESSION['mail_error'];
                                        }
                                        unset($_SESSION['mail_error']);
                                        ?>
                                    </span>
                                </div>

                                <!-- <input type="text" autocomplete="off" class="input-field" name="user-mail" id="user-mail" />
                                    <label for="user-mail">Email </label>
                                    <span id="email_reg_err" ></span> -->
                            </div>
                            <div class="form-group">


                                <input type="password" name="pswd" autocomplete="off" class="input-field"
                                    id="user-pswd" />
                                <label for="pswd">Password </label>
                                <span class="errormsg pswd">
                                    <?php
                                    if (isset($_SESSION['password_error'])) {
                                        echo $_SESSION['password_error'];
                                    }
                                    unset($_SESSION['password_error']);
                                    ?>
                                </span>

                                <!-- <input type="password" autocomplete="off" class="input-field" name="user-reg-password" id="user-reg-password" />
                                    <label for="user-reg-password">Password </label>
                                    <span id="pass_reg_err"></span> -->
                            </div>
                            <div class="form-group">

                                <input type="password" autocomplete="off" class="input-field" name="con-pswd"
                                    id="user-con-pswd" onkeyup="ismatched()" />
                                <label for="con-pswd">Confirm </label>
                                <span class="errormsg conpswd">
                                    <?php
                                    if (isset($_SESSION['con_password_error'])) {
                                        echo $_SESSION['con_password_error'];
                                    }
                                    unset($_SESSION['con_password_error']);
                                    ?>
                                </span>
                                <!-- 
                                    <input type="password" autocomplete="off" class="input-field" name="user-con-password" id="user-con-password" />
                                    <label for="user-con-password">Confirm </label>
                                     <span id="con_pass_err"></span> -->
                            </div>
                            <div class="form-group-checkbox" style="display: flex; font-size: 10px; gap: 10px;">
                                <input type="checkbox" autocomplete="off" class="user-checkbox" name="terms"
                                    id="terms" />
                                <p style="margin: 0;">I have agreed the Terms and Conditions of this site by checking
                                    this box .</p>
                                <span id="term_err" class="errormsg termn"></span>
                            </div>
                        </div>

                        <!-- <input type="submit" value="Alright" id="btn-register" class="form-btns" /> -->
                        <input type="submit" name="btn-signin" id="btn-register" value="Alright" class="form-btns" />

                    </form>
                </div>
                <div class="carousel">
                    <img src="../Visuals/pixo_logo.png" style="height:15rem;" />
                </div>
            </div>
        </div>
        <div class="form-model">
            <img src="../Visuals/remove.png" alt="Close" class="close-icon" />
            <div class="forms">
                <div id="emailForm" class="forget-password-form">

                    <h3 class="emailHeadings" style="font-family: 'Lusitana';font-weight: 600;font-size: 1.9rem;">
                        Set up your Email
                    </h3>
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="input-field" name="forgot-email"
                            id="forgot-email" />
                        <label for="forgot-email">Confirmation Email </label>
                        <span id="forgot_email_err" class="errormsg"></span>
                    </div>

                    <button name="send-code" class="forms-btns" id="send-code" value="Send Code">Send Code</button>
                    <!-- <button name="send-code" class="form-btns" id="send-code">Send</button> -->

                </div>
                <div id="confirmCodeForm" class="forget-password-form">
                    <h2 class="codeHeadings" style="font-family: 'Lusitana';font-weight: 900;font-size: 1.9rem;">
                        Confirmation
                    </h2>
                    <div class="form-group" style="margin-bottom: 10px;">
                        <input type="number" autocomplete="off" class="input-field" name="forgot-code" id="forgot-code"
                            min="1000" max="9999">
                        <label for="forgot-email-code">Confirmation Code </label>
                        <span id="forgot_code_err" class="errormsg"></span>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;">
                        <a href="#" class="resend" style="text-decoration: none;color: black;font-weight: 600;">Resend Code</a>
                    </div>

                    <div class="nav-btns" style="display: flex;gap: 10px;">
                        <button name="prev-btn" class="forms-btns" id="prev-btn">Previous</button>
                        <button name="verify-btn" class="forms-btns" id="verify-btn">Verify</button>
                    </div>

                    <!-- <input type="submit" name="verify-btn" class="forms-btns" id="verify-btn" value="Verified" /> -->
                </div>
                <form action="forgotpassword.php" method="post" id="new_password" class="forget-password-form">
                    <h2 class="passwordHeadings" style="font-family: 'Lusitana';font-weight: 600;font-size: 1.9rem;">
                        Set Up Your New Password
                    </h2>
                    <div class="form-group" style="margin-bottom: 10px">
                        <input type="text" autocomplete="off" class="input-field" name="forgot-password"
                            id="forgot-password"/>
                        <label for="forgot-password">New Password </label>
                        <span id="forgot_password_err" class="errormsg"></span>
                    </div>

                     <div class="form-group" style="margin-bottom: 30px">
                        <input type="text" autocomplete="off" class="input-field" name="forgot-password-confirm"
                            id="forgot-password-confirm" onkeyup="ismatchedPswd()" />
                        <label for="forgot-password-confirm">Confirm Password </label>
                        <span id="forgot_password_confirm_err" class="errormsg"></span>
                    </div>

                    <input type="submit" name="confirm-pass" class="forms-btns" id="confirm-pass" value="Alright" />
                    <!-- <input type="submit" name="confirm-pass" class="forms-btns" id="confirm-pass" value="All Set" /> -->
                </form>
            </div>
            <!-- <div class="imgContainer">
                <img src="../Visuals/mail-removebg.gif" alt="" width="" class="imgContainer-imgs">
                <img src="../Visuals/smartphone-removebg.gif" alt="" width="" class="imgContainer-imgs">
                <img src="../Visuals/password-removebg.gif" alt="" width="" class="imgContainer-imgs">
            </div> -->
        </div>
        <div class="success-popup">
            
        </div>

    </main>

    <script src="connect.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script> -->

    <?php unset($_SESSION['formdata']); ?>
    <?php unset($_SESSION['userdata']); ?>
</body>

</html>