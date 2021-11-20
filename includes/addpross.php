<?php
if (isset($_POST['addprod-submit'])){
    //require 'dbhandler.php';
    require "../includes/dbh.php";

    //$name = $_POST['name'];
    //$username = $_POST['uname'];
    //$userpwd = $_POST['pwd'];

    $prodname = $_POST['prod-name'];
    $prodwhlprice = $_POST['prod-price-whl'];
    $prodqnt = $_POST['prod-qnt'];

    $prodretprice = $_POST['prod-price-ret']; //$prodprice
    $prodstck = $_POST['prod-stck']; //$prodqnty
    
   
    #error handler
    if (empty($prodname) || empty($prodretprice)  || empty($prodstck) || empty($prodwhlprice) || empty($prodqnt)){
        header("Location: ../pages/addproducts.php?error=Empty fields&prods".$prodretprice.$prodwhlprice."&name".$prodname);
        exit();
    } else { #insert data in database
        $sql = "SELECT id FROM productss WHERE id=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/addproducts.php?error=sqlerror");
            exit();
        } else { //add data to database func
            mysqli_stmt_bind_param($stmt, "s", $prodretprice); //
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../pages/addproducts.php?error=prodtaken&name=".$prodname);
                exit();
            } else { 
                $sql = "INSERT INTO productss (prod_name, prod_retail, prod_stock, prod_whlsale, prod_qnt) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../pages/addproducts.php?error=sqlerror");
                    exit();
                } else {
                    //$hashedPwd = password_hash($password, PASSWORD_DEFAULT); //create hash pass
                    mysqli_stmt_bind_param($stmt, "sssss", $prodname, $prodretprice, $prodstck, $prodwhlprice, $prodqnt);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../pages/addproducts.php?addproduct=sucess");
                    exit();
                }
            }    
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../pages/addproducts.php");
    exit();
}
   
