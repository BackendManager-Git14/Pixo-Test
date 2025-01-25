<?php
    include 'process.php';

    if(isset($_SESSION['userdata'])){
        echo "<pre>";
        print_r($_SESSION['userdata']);
    }
?>