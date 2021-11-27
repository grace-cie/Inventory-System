<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <script type="text/javascript" src="../js/sweetalert2@11.js"></script>
    <link rel="stylesheet" href="../styles/sweetalert.css">
</head>
<style>
    body {
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
    }
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap');
    .wrapper-main {
        background: #caebf2;
        height: 434px;
        width: 354px;
        border-radius: 4px;
        position: relative;
        top: 114px;
    }
    input[name="prod-name"]::placeholder {        
		text-align: center;
	}input[name="prod-price"]::placeholder {        
		text-align: center;
	}input[name="prod-qnty"]::placeholder {        
		text-align: center;
	}
	input {
        height: 42px;
        width: 69%;
        font-size: 19px;
        border: none;
        text-align: center;
        font-family: 'Public Sans', sans-serif;
        margin-top: 6px;
    }
    h2 {
        padding-top: 36px;
    	font-family: 'Public Sans', sans-serif;
		font-size: 24px;
    	color: #2b6777;
	}
    input[name="prod-price"]{
        position: relative;
        top: 7px;
    }
    input[name="prod-qnty"]{
        position: relative;
        top: 14px;
    }
    input[name="addprod-submit"]{
        position: relative;
        top: 8px;
        width: 70%;
        background: #ff3b3f;
        color: #ffffff;
    }
    img[name="back-btn"]{
        position: absolute;
        height: 32px;
        top: -36px;
        right: 1px;
    }
</style>
<center>
<body>
<div class="wrapper-main">
            <a href="../mainpg.php"><img name="back-btn" src="../img/icons/close-btn.png" alt="Back"></a>
            <form action="../includes/addpross.php" method="POST">
                    <h2>Add Products</h2>
                    <input type="text" name="prod-name" placeholder="Product Name" >
                    <input type="number" name="prod-price-whl" step="any" placeholder="Wholesale Price">
                    <input type="number" name="prod-qnt" placeholder="Quantity">

                    <input type="number" name="prod-price-ret" step="any" placeholder="Retail Price">
                    <input type="number" name="prod-stck" placeholder="Stock">
                    <br>
                    <input type="submit" name="addprod-submit" value="Add">
            </form>
            <?php 
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($url, "addproduct=sucess") == true){
                        echo "<script type='text/javascript'>
                                Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product Added!',
                                showConfirmButton: false,
                                timer: 1500
                                })
                        </script>";
                }
            ?>
            <?php if (isset($_GET['error'])) { ?>
     		    <p class="error" style="color: red;"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>
    </div>
</body>
</center>
</html>
<?php 
   } else {
        header("Location: index.php");
        exit();
    }
 ?>