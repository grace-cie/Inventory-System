<div id="content">
        <section class="tit-holder">
                <div class="srch-holder" style="position: absolute; left: -39px;">
                <input type="text" name="srch" id="srch" class="srch-nav" placeholder="Search">
                </div>
                <a class="add" href="pages/addproducts.php">+</a>
                
        </section>
        <table style="width: 100%;" id="prod-table">
        <thead>
                <tr>
                        <th>Roll</th>
                        <th>Product Name</th>
                        <th><a href="?page=wholesale">Wholesale</a></th>
                        <th> <a href="?page=retail">Retail</a></th>
                        <th>Action</th>
                </tr>
        </thead>
        <?php
                //show table from database
                $sql = "SELECT * FROM `productss`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { 
                $id = $row['id'];                
                $pname = $row['prod_name'];        
                $pwhlprice = $row['prod_whlsale'];        
                $pretprice = $row['prod_retail'];  
                ?>
                <tbody id="filt">
                <tr>
                        <td class="pname-s"><?php echo $row['id']."."?></td>
                        <td><?php echo $row['prod_name']?></td>
                        <td><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row['prod_whlsale']?></td>
                        <td><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row['prod_retail']?></td>
                        <td class='btn-wrapper-ed'><?php echo " <a class='oprt-btn' href='pages/minicount.php?edit&prod_id={$id}'>Sold</a>";?></td>
                </tr>
                </tbody>
                <?php
                }
        ?>
        </table>
        <?php 
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($url, "update=sucess") == true){
                        echo "<script type='text/javascript'>
                                Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product updated Succesfully!',
                                showConfirmButton: false,
                                timer: 1500
                                })
                        </script>";
                } elseif (strpos($url, "sold=sucess") == true){
                        echo "<script type='text/javascript'>
                                Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product Sold!',
                                showConfirmButton: false,
                                timer: 1500
                                })
                        </script>";
                }
        ?>
        </body>
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