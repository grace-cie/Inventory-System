<div id="content">
     <section class="tit-holder">
          <div class="srch-holder" style="position: absolute; left: -39px;">
               <input type="text" name="srch" id="srch" class="srch-nav" placeholder="Search">
          </div>
     </section>
     <?php
        //$ssql = "SELECT min(id) as idm, date_sold, sum(total) as totd FROM trans group by date_sold";
        $sql = "SELECT MONTHNAME(date_sold) as mname, 
                sum(total) as tot
                FROM trans
                GROUP BY MONTH(date_sold)";
        $result = $conn->query($sql);
     ?>

     <div class="get_data">
     <table style="width: 100%;" id="prod-table">
            <tr>
                <th>Month</th>
                <th>Monthtly Solds</th>
            </tr>
        <?php while ($row = $result->fetch_object()): ?>
            <tr>
                <td id="date"><?php echo $row->mname; ?></td>
                <td><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row->tot; ?></td>
            </tr>
        <?php endwhile; ?>
     </table>
     </div>
</div>

<script>
     //search func
     $(document).ready(function(){
          $('#srch').keyup(function(){
               search_table($(this).val());
          });
          function search_table(value){
               $('#ms-table tr').each(function(){
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