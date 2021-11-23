<div id="content">
     <section class="tit-holder">
          <div class="srch-holder" style="position: absolute; left: -39px;">
               <input type="text" name="srch" id="srch" class="srch-nav" placeholder="Search">
               <span class="tot-val" id="tot-val"></span>
          </div>
     </section>
     <table style="width: 100%;" id="prod-table">
     <thead>
          <tr>
               <th>Roll</th>
               <th>Product</th> 
               <th>Retail</th>
               <th>Stocks</th>
               <th>Total<img class="coin" src="img/icons/philippine-peso.png" style="right: -7px;"></th>
               <th colspan="2">&nbsp;Operations</th>
          </tr>
     </thead>
     <?php
          //show table from database
          $sql = "SELECT * FROM `productss`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) { 
               $id = $row['id'];                
               $pname = $row['prod_name'];        
               $pretprice = $row['prod_retail']; //$pprice        
               $pstck = $row['prod_stock']; //$pqnty

                // total
               ?>
               <tbody id="filt">
                    <tr>
                         <td class="pname-s"><?php echo $row['id']."."?></td>
                         <td><?php echo $row['prod_name']?></td>
                         <td><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row['prod_retail']?></td>
                         <td><?php echo $row['prod_stock']."pcs"?></td>
                         <td id="total"><?php echo $row['prod_retail'] * $row['prod_stock']?></td>
                         <td class='btn-wrapper-ed'><?php echo " <a class='oprt-btn' href='pages/update.php?edit&prod_id={$id}'>Update</a>";?></td>
                         <!--<td class='btn-wrapper-del'><?php# echo " <a class='oprt-btn-dl' href='#?delete={$id}'>Details</a>";?></td>-->
                    </tr>
               </tbody>
               <?php
           }
     ?>
     </table>
</body>
<script>
          updateSubTotal(); // Initial call

          function updateSubTotal() {
               var table = document.getElementById("prod-table");
               let subTotal = Array.from(table.rows).slice(1).reduce((total, row) => {
                    return total + parseFloat(row.cells[4].innerHTML);
               }, 0);
               document.getElementById("tot-val").innerHTML = "Retail: ₱ " + subTotal.toFixed(2);
          }

          function onClickRemove(deleteButton) {
          let row = deleteButton.parentElement.parentElement;
          row.parentNode.removeChild(row);
          updateSubTotal(); // Call after delete
          }
</script>
<script>
     //search func
     $(document).ready(function(){
          $('#srch').keyup(function(){
               search_table($(this).val());
          });
          function search_table(value){
               $('#filt tr').each(function(){
                    var found = 'false';
                    $(this).each(function(){
                         if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >=0 ) {
                              found = 'true'
                         }
                    });
                    if(found == 'true'){
                         $(this).show();
                    } else {
                         $(this).hide();
                    }
               });
          }
     });
</script>
</div>