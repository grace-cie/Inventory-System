<div id="content">
<section class="tit-holder">
        <center>
            <button style="background-color: #eff1f3; color: #2b6878; outline: none;"><a href="?page=dailysales">View Daily Sales</a></button>
            <button style="background-color: #32639d; outline: none;"><a href="?page=monthly">View Monthly Sales</a></button>
        </center>
     </section>
     <table style="width: 100%;" id="prod-table">
     <thead>
          <tr>
               <th>Roll</th>
               <th>Product Name</th>
               <th>Solds</th>
               <th>Date</th>
               <th>Total</th>
          </tr>
     </thead>
     <?php
          //show table from database
          $sql = "SELECT * FROM `trans`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) { 
               $id = $row['id'];                
               $pname = $row['prod_name'];        
               $coutsold = $row['coutof_sold'];        
               $datesold = $row['date_sold'];
               $tot = $row['total'];  
               ?>
               <tbody id="filt">
               <tr>
                    <td class="pname-s"><?php echo $row['id']."."?></td>
                    <td><?php echo $row['prod_name']?></td>
                    <td><?php echo $row['coutof_sold']?></td>
                    <td class="pname-s"><?php echo $row['date_sold']?></td>
                    <td><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row['total']?></td>
                    
               </tr>
               </tbody>
               <?php
          }
     ?>
     </table>
</div>