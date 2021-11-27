<link rel="stylesheet" href="styles/style.css">
<div class="wrapper" style="z-index: 99;">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <div class="sidebar-header">
                <center>
                   <img  src="img/icons/user.png" alt="user" style="height: 60px; margin-top: 24px;">
                   <h1 style="font-size: 14px; margin-top: 7px; color: #222;"><?php echo $_SESSION['name']; ?></h1>
                </center>
            </div> 

            <ul class="list-unstyled components">
                <li>
                    <img src="img/icons/products.png" style="height: 28px; position: absolute; left: 20px;margin-top: 15px;" alt="Products">
                        <a href="?pages=">Products</a>
                    </img>
                </li>
                <li>
                    <img src="img/icons/sales.png" style="height: 28px; position: absolute; left: 20px;margin-top: 15px;" alt="">
                        <a href="?page=sales">Sales</a>
                    </img>
                </li>
                <li>
                    <img id="usric" src="img/icons/user.png" style="height: 28px; position: absolute; left: 20px;margin-top: 15px;" alt="">
                        <a href="?page=users">Users</a>
                    </img>
                </li>
            </ul>
            <a href="https://www.facebook.com/yamo.rey" target="_blank"><img src="img/icons/teamlogo.png" style="height: 106px; position: relative; top: 350px;" alt=""></a>
        </nav>
        <nav class="navbar">
            <div class="container-fluid">
                    
                <span id="sidebarCollapse">
                    <img style="height: 60px; position: relative; right: -6px; bottom: -3px;" src="img/icons/menu-hamb.png" alt="">
                </span>
                <a href="includes/logout.php">Logout</a>     
            </div>
        </nav>

            
        
</div>

<div class="overlay"></div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    
    <!-- jQuery Custom Scroller CDN -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>