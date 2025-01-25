/* logic of sliding form switch */

const toggleform = document.querySelectorAll('.toggle');
const mainsection = document.querySelector('main');

toggleform.forEach((btn) => {
    btn.addEventListener('click', function () {
        mainsection.classList.toggle('form-mode');
    })
})

document.addEventListener('DOMContentLoaded',function(){
    
    const input = document.querySelectorAll('.input-field');
    
    input.forEach((inp) => {
        inp.addEventListener('focus', function () {
            inp.classList.add('active');
        })
        inp.addEventListener('blur', function () {
            if (inp.value != "") return;
            inp.classList.remove('active');
        })
    })
    
})

function ismatched(){

    //confirm password matching script
    const pswd = document.getElementById('user-pswd');
    const con_pswd = document.getElementById('user-con-pswd');

    const pass_error = document.querySelector('.errormsg.conpswd');

    if(con_pswd.value != pswd.value){
        pass_error.innerHTML = "Password does not match ."
    }
    else if(con_pswd.value == pswd.value){
        pass_error.innerHTML = "";
    }
}

//client side validations null only (register)

const sign_Btn = document.getElementById('btn-register');

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

//client side validations login 

const login_user = document.getElementById('log-user-name');
const login_pswd = document.getElementById('log-user-password');
const login_btn = document.getElementById('btn-login');
const login_user_error = document.querySelector('.errormsg.login-username');
const login_pswd_error = document.querySelector('.errormsg.login-pswd');


login_btn.addEventListener('click',function(e){
    if(!login_user.value){
        e.preventDefault();
        login_user_error.innerHTML = "Kindly fill out user name ."
    }
    else if(login_user.value.length <= 5 || login_user.value.length >= 15){
        e.preventDefault();
        login_user_error.innerHTML = "Username must be 6 characters short or 15 characters max long ."
    }
    else{
        login_user_error.innerHTML = "";
    }

    if(!login_pswd.value){
        e.preventDefault();
        login_pswd_error.innerHTML = "Kindly fill out the password ."
    }
    else{
        login_pswd_error.innerHTML = "";
    }
})

//forget password toggle menu 

document.getElementById('forget-link').addEventListener('click',function(){
    document.querySelector('.form-model').classList.toggle('active');
})

//form slider for password forget

const forms = document.querySelectorAll('.forget-password-form');

let currentIndex = 0;

document.querySelector('.close-icon').addEventListener('click',function(){
    document.querySelector('.form-model').classList.remove('active');
    currentIndex = 0;
})

forms[currentIndex].classList.add('active');

function nextForm(){

    if(currentIndex < forms.length - 1){
        forms[currentIndex].classList.remove('active');
        currentIndex++;
        forms[currentIndex].classList.add('active');
    }
}

function prevForm(){

    if(currentIndex > 0){
        forms[currentIndex].classList.remove('active');
        currentIndex--;
        forms[currentIndex].classList.add('active');
    }
}

function showForm(n){
    if(n <= forms.length - 1 && n > 0){
        forms[n-1].classList.remove('active');
        forms[n].classList.add('active');
    }
}

document.getElementById('prev-btn').addEventListener('click',function(e){
    prevForm();
})

const email_submit = document.getElementById('send-code');

email_submit.addEventListener('click',function(e){
    e.preventDefault();
    var email_check = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var email = document.getElementById('forgot-email');
    var isvalid = true;

    if(!email.value){
        document.getElementById('forgot_email_err').innerHTML = "Bro what are you thinking ...?";
        isvalid = false;
    }
    else if(!email.value.match(email_check)){
        document.getElementById('forgot_email_err').innerHTML = "Kindly enter valid email ...";
        isvalid = false;
    }
    else{
        console.log(email.value);
        $.ajax({
            url: './forgotpassword.php', //correct path example url: './forgotpassword.php',
            type: 'Post',
            data: {
                send_email: email.value,
                button: 'send-code' 
            },
            beforeSend: function(){
                console.log("function called");
            },
            success: function(response){
                console.log(response);
                if(response.success === false){
                    document.getElementById('forgot_email_err').innerHTML = response.msg;    
                }
                else if(response.success === true){
                    toastr.success(response.msg,"Pixo - Notification",{timeout: 4000})
                    showForm(1);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
                document.getElementById('forgot_email_err').innerHTML = "An error occurred: " + error;
            }
        })
    }
})

document.getElementById('verify-btn').addEventListener('click',function(){
    if(!document.getElementById('forgot-code').value){
        document.getElementById('forgot_code_err').innerHTML = "Confirmation code is not entered .";
    }
    else{
        const inputCode = document.getElementById('forgot-code').value;

        $.ajax({
            url: 'forgotpassword.php',
            type: 'POST',
            data: {
                'code': inputCode,
                'button': 'verify-btn'
            },
            beforeSend: function(){
                console.log("Code sent to server");
            },
            success: function(response){
                console.log(response);
                if(response.success === false){
                    document.getElementById('forgot_code_err').innerHTML = response.msg;    
                }
                else if(response.success === true){
                    toastr.success(response.msg,"Pixo - Notification",{timeout: 4000})
                    showForm(2);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
                document.getElementById('forgot_code_err').innerHTML = "An error occurred: " + error;
            }
        })
    }
})

function ismatchedPswd(){

    //confirm password matching script
    const pswd = document.getElementById('forgot-password');
    const con_pswd = document.getElementById('forgot-password-confirm');
    const confirmBtn = document.getElementById('confirm-pass');

    confirmBtn.disabled = true;   

    const pass_error = document.querySelector('#forgot_password_confirm_err');

    if(con_pswd.value != pswd.value){
        pass_error.innerHTML = "Password does not match ."
    }
    else if(con_pswd.value == pswd.value){
        pass_error.innerHTML = "";
        confirmBtn.disabled = false;
    }
}

document.getElementById('confirm-pass').addEventListener('click',function(){
    if(!document.getElementById('forgot-password').value){
        document.getElementById('forgot_password_err').innerHTML = "Kindly enter new password .";
    }
})








