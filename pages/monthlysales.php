
<div id="content">
     <section class="tit-holder">
          <a href="pages/monthlychrt.php" style="position: relative; left: 646px; top: 0px;"> <img src="img/icons/stats.png" alt=""> </a>
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
     <thead>
            <tr>
                <th>Month</th>
                <th>Monthtly Solds</th>
            </tr>
     </thead>
        <?php while ($row = $result->fetch_object()): ?>
            <tbody id="filt">
            <tr>
                <td id="date"><?php echo $row->mname; ?></td>
                <td><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row->tot; ?></td>
            </tr>
            </tbody>
        <?php endwhile; ?>
     </table>
     </div>
</div>