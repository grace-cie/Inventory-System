<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script> 
        <script type="text/javascript" src="../js/Chart.min.js"></script>
        <title>Chart</title>
    </head>
     
    <style id="compiled-css" type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap');
    body{
        font-family: 'Public Sans', sans-serif;
    }
      .chart-toggles a.enabled {
            color: red;
      }
      #LineChart{
         width: 100%;
         height: 640px;
         position: absolute;
         top: 0px;
         left: 0px;
      }
      #chrt-table {
        border-collapse: collapse;
        position: absolute;
        top: 808px;
        text-align: center;
        font-size: 25px;
        left: 0px;
    }
    table {
        display: none;
    }
        th, td {
        border: -1px;
    }
    th {
        background-color: #52ab98;
        color: white;
    }
    tbody tr:nth-child(even) {
        background-color: #c8d8e4;
    }
    .pname-s {
        color: #2b6777;
    }
    .btn-wrapper-ed {
        background: #32639d;
        color: #fff;
    }
    tbody tr:nth-child(even) .btn-wrapper-ed {
        background-color: #1b4d89;
    }
    .coin {
        position: relative;
        top: -3px;
        right: 6px;
    }
    .bck{
        text-decoration: none;
        background: #32639d;
        color: #fff;
        padding: 6px 24px 6px 24px;
        position: relative;
        bottom: -719px;
        border-radius: 5px;
    }
</style> 
      <canvas id="LineChart"></canvas>
      <?php
        //$host= "sql302.epizy.com";
        //$username= "epiz_30186562";
        //$password = "WX6myy2ZDW";
        
        //$db_name = "epiz_30186562_cpsystem";
        $host= "localhost";
        $username= "root";
        $password = "";

        $db_name = "cpsystem";
        
        $conn = mysqli_connect($host, $username, $password, $db_name);
        
        if (!$conn) {
            echo "Connection failed!";
        }
        //$ssql = "SELECT min(id) as idm, date_sold, sum(total) as totd FROM trans group by date_sold";
        $sql = "SELECT MONTHNAME(date_sold) as mname, 
                sum(total) as tot
                FROM trans
                GROUP BY MONTH(date_sold)";
        $result = $conn->query($sql);
     ?>
    <table style="width: 100%;" id="chrt-table" style="position: relative; top: 111px;">
        <tbody>
            <tr>
                <th>Month</th>
                <th>Monthtly Solds</th>
            </tr>
        <?php while ($row = $result->fetch_object()): ?>
            <tr>
                <td id="date"><?php echo $row->mname; ?></td>
                <td><?php echo $row->tot; ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
     </table>
     <center><a class="bck" href="../mainpg.php?page=monthly" style="">Back</a></center>
     
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>      
<script> 
    $(window).load(function(){
      var lineChartData2 = {
         labels: generateLabelsFromTable(),
         datasets: generateDataSetsFromTable()
      };
      var ctx = document.getElementById("LineChart").getContext("2d");
      lineChart = new Chart(ctx).Line(lineChartData2);
      function generateLabelsFromTable() {
      var labels = [];
      var rows = jQuery("tr");
      rows.each(function (index) {
        if (index != 0){
            var cols = $(this).find("td");
            labels.push(cols.first().text());
        }
      });
      return labels;
      }
      function generateDataSetsFromTable() {
      var data;
      var datasets = [];
      var rows = jQuery("tr");
      var data = [];
      rows.each(function (index) {
         if (index != 0)
         {
               var cols = $(this).find("td");
               cols.each(function (innerIndex) {
                  if (innerIndex != 0)
                     data.push($(this).text());
               });
         }
      });
      var dataset = {
         fillColor: "#c8d8e4", //#1b4d89
         strokeColor: "#32639d",
         pointColor: "#1b4d89",
         pointStrokeColor: "#fff",
         pointHighlightFill: "#fff",
         pointHighlightStroke: "rgba(151,187,205,1)",
         data: data
      }
      datasets.push(dataset);
         return datasets;
      }
      });

    

      </script>