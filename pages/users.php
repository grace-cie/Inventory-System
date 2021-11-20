<div id="content">
        <section class="tit-holder">
                <a class="add" href="pages/signup.php">+</a>
                
        </section>
        <table style="width: 100%;" id="prod-table">
                <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                </tr>
        <?php
                //show table from database
                $sql = "SELECT * FROM `users`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { 
                $id = $row['id'];                
                $uname = $row['name'];        
                $usname = $row['user_name'];          
                ?>
                <tr>
                        <td class="pname-s"><?php echo $row['id']."."?></td>
                        <td><?php echo $row['name']?></td>
                        <td style="color: #1b4d89;"><?php echo $row['user_name']?></td>
                </tr>
                <?php
                }
        ?>
        </table>
</div>