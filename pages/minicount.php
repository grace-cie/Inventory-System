<!-- Footer -->
<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

//require "dbhandler.php"; 
require "../includes/dbh.php";
?>

<?php
   // checking if the variable is set or not and if set adding the set data value to variable userid
   if(isset($_GET['prod_id']))
    {
      $prodid = $_GET['prod_id']; 
    }
      // SQL query to select all the data from the table where id = $userid
      $query="SELECT * FROM productss WHERE id = $prodid ";
      $view_prods= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_prods))
        {              
          $id = $row['id'];                
          $pname = $row['prod_name'];
          $pretprice = $row['prod_retail']; //$pprice     //prod_price      
          $pstck = $row['prod_stock']; //$pqnty        //prod_qnty
        }
 
    //Processing form data when form is submitted
    if(isset($_POST['update'])) 
    {
      $pname = $_POST['pname-inpt'];
      $pretprice = $_POST['pretprice-inpt'];
      $pstck = $_POST['pstck-inpt'];

      $solds = $_POST['sold'];
      $trans = $_POST['dateoftrans'];
      $tot = $_POST['total'];
      
      // SQL query to update the data in user table where the id = $userid 
      $query = "UPDATE productss SET prod_name = '{$pname}' , prod_retail = '{$pretprice}' , prod_stock = '{$pstck}' WHERE id = $prodid";

      $squery = "INSERT INTO trans (prod_name, coutof_sold, date_sold, total) VALUES ('$pname','$solds','$trans','$tot')";
      $update_prod = mysqli_query($conn, $query);
      $insert_trans = mysqli_query($conn, $squery);
      //echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";
      header("Location: ../mainpg.php?sold=sucess");
      exit();
    }             
?>
<head>
  <title>Sold Product</title>
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap');
   body{
		background: #f1f1f1;
	}
  .main-container {
		background: #caebf2;
    height: 1020px;
		width: 600px;
		border-radius: 14px;
		position: relative;
		top: 223px;
	}
  .main-container h1{
    padding-top: 39px;
    font-family: 'Public Sans', sans-serif;
    font-size: 52px;
    color: #2b6777;
  }
  input[name="pname-inpt"]::placeholder {        
		text-align: center;
	}input[name="pretprice-inpt"]::placeholder {        
		text-align: center;
	}input[name="pstck-inpt"]::placeholder {        
		text-align: center;
	}input[name="total"]::placeholder {        
		text-align: center;
	}
  input[name="opr-sub"]{
    margin-top: 121px;
  }
	input {
		height: 70px;
		width: 69%;
		font-size: 41px;
		border: none;
		text-align: center;
		font-family: 'Public Sans', sans-serif;
    margin-top: 8px;
    outline: none;
	}
  input[name="update"]{
		height: 60px;
		width: 70%;
		position: relative;
		top: 7px;
		border: none;
		background: #ff3b3f;
		color: #ffffff;
		font-size: 36px;
		font-family: 'Public Sans', sans-serif;
	}
  img[name="back-btn"]{
    position: absolute;
    height: 62px;
    top: -70px;
    right: 1px;
}
  label {
    font-size: 39px;
    font-family: 'Public Sans', sans-serif;
    color: #a9a9a9;
  }
  #pretprice-inpt{        
    background: #fff url('../img/icons/philippine-peso.png') 128px center no-repeat;
    background-size: 42px
    }
  #total{        
    background: #fff url('../img/icons/philippine-peso.png') 128px center no-repeat;
    background-size: 42px
    }
</style>
<script>
    $(document).ready(function() {
          const def = $("#stock").val()
          $("#sold,#stock").keyup(function() {
              var total = 0;
              var x = Number($("#sold").val());
              var total = def - x;
              $("#stock").val(total); // the result will be showed in "quantity"
          });
          
          $("#sold,#pretprice-inpt").keyup(function() {
              var totalq = 0;
              var a = Number($("#sold").val());
              var b = Number($("#pretprice-inpt").val());
              var totalq = a * b;
              $("#total").val(totalq); 
          });
    });
</script>
<center>
  <div class="main-container">
    <a href="../mainpg.php"><img name="back-btn" src="../img/icons/close-btn.png" alt="Back"></a>
  <h1 class="text-center">Sold Product</h1>
    <form action="" method="post">
        <label for="pname-inpt">Product Name</label><br>
        <input type="text" name="pname-inpt"  value="<?php echo $pname  ?>" readonly><br>
        <label for="pretprice-inpt">Retail Price</label><br>
        <input type="number" name="pretprice-inpt" id="pretprice-inpt" step="any" value="<?php echo $pretprice  ?>" readonly><br>
        <label for="pstck-inpt">Stock Available</label><br>
        <input type="number" name="pstck-inpt" id="stock" value="<?php echo $pstck  ?>" readonly><br>
        <label for="dateoftrans">Date of Transaction</label><br>
        <input type="date" name="dateoftrans" id="dateoftrans"><br>
        <label for="total">Total</label><br>
        <input type="text" name="total" id="total" placeholder="Total Retail" value="0" readonly><br>
        <label for="sold">Qnty of Sold</label><br>
        <input type="number" name="sold" class="sold-inpt" id="sold" placeholder="Quantity" min="1" max="<?php echo $pstck ?>" required>
        <input type="submit"  name="update" value="Sold">
    </form>
    <script>
      // set default date automatically
      var today = new Date();
      var date = today.getFullYear()+'-'+(String(today.getMonth()+1)).padStart(2,'0') +'-'+ String(today.getDate()).padStart(2,'0');
      var dateTime = date
      //document.write(dateTime); //for checking
      document.getElementById("dateoftrans").value = date;
    </script>    
  </div>

    <!-- a BACK button to go to the home page -->
    <div class="container text-center mt-5">
      <a href="home.php"> Back </a>
    <div>
</center>
<?php 
   } else {
        header("Location: index.php");
        exit();
    }
 ?>