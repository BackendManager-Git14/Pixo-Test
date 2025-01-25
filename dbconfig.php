<?php
        $server = 'localhost';
        $database = 'pixo_demo';
        $user = 'root';
        $password = '';

    $con = mysqli_connect($server,$user,$password,$database);

    if(!$con){
        die("   <script>
                    alert('Server is busy now please try again after some time .');
                </script>");
    }
?>