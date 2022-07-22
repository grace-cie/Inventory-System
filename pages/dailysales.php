<div id="content">
     <section class="tit-holder">
          <div class="srch-holder" style="position: absolute; left: -42px;">
               <input type="text" name="srch" id="srch" class="srch-nav" placeholder="Search Date..." onfocus="(this.type='date')" onblur="(this.type='text')"> 
          </div>
     </section>
     <?php
        //$ssql = "SELECT min(id) as idm, date_sold, sum(total) as totd FROM trans group by date_sold";
        $sql = "SELECT date_sold as daysold, sum(total) as totd FROM trans GROUP BY date_sold";
        $res = $conn->query($sql);
        
     ?>
     <div class="get_data">
     <table style="width: 100%;" id="prod-table">
     <thead>
            <tr>
                <th>Date Sold</th>
                <th>Daily Total Solds</th>
            </tr>
     </thead>
        <?php while ($row = $res->fetch_object()): ?>
          <tbody id="filt">
            <tr>
                <td id="date"><?php echo $row->daysold; ?></td>
                <td><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row->totd; ?></td>
            </tr>
          </tbody>
        <?php endwhile; ?>
     </table>
     </div>
</div>

<script>
     //search func
     /*
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
     */
$(document).ready(function(){
  $("#srch").on("change", function() {
    let value = $(this).val().toLowerCase();
    console.log(value)
    $("#filt tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>