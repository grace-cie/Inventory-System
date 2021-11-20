<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    $page = (isset($_GET['page']) &&  !empty($_GET['page']) ? $_GET['page'] : '');
    $file = "";
    if ($page == 'wholesale'){
        $file = "pages/wholesalechrt.php";
    }
    else if ($page == 'retail'){
        $file = "pages/retail.php";
    }
    else if ($page == 'dailysales'){
        $file = "pages/dailysales.php";
    }
    else if ($page == 'monthly'){
        $file = "pages/monthlysales.php";
    }
    else if ($page == 'users'){
        $file = "pages/users.php";
    }

    else if ($page == 'sales'){
        $file = "pages/sales.php";
    }

    else {
        $file = "pages/home.php";//products
    }
    
    include "temps/content.php"; //content

} else {
    header("Location: index.php");
    exit();
}

?>