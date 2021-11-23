<?php
session_start();
require "../includes/dbh.php";

if (isset($_POST['signup-submit'])){

    $name = $_POST['name'];
    $username = $_POST['uname'];
    $userpwd = $_POST['pwd'];
    
   
    #error handler
    if (empty($name) || empty($username)  || empty($userpwd)){
        header("Location: ../pages/signupform.php?error=Empty fields&uname".$username."&name".$name);
        exit();
    } else { #insert data in database
        $sql = "SELECT user_name FROM users WHERE user_name=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/signupform.php?error=sqlerror");
            exit();
        } else { //add data to database func
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../pages/signupform.php?error=usertaken&name=".$name);
                exit();
            } else { 
                $sql = "INSERT INTO users (user_name, password, name) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../pages/signupform.php?error=sqlerror");
                    exit();
                } else {
                    //$hashedPwd = password_hash($password, PASSWORD_DEFAULT); //create hash pass
                    mysqli_stmt_bind_param($stmt, "sss", $username, $userpwd, $name);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../pages/signupform.php?signup=sucess");
                    exit();
                }
            }    
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../pages/signupform.php");
    exit();
}
   
