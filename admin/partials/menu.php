<!DOCTYPE html>
<html lang="en">
<head>
    <!-- this code make the page auto Reload -->
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- humburgers menu link -->
    <link rel="stylesheet" href="js/lib/hamburgers/hamburgers.min.css">
    

</head>
<body>
    <!-- container -->
    <div class="main-container">
        <!-- side navbar html -->
        <div class="side-navbar split">
            <nav>
                <!-- <div class="upper-navbar"> -->
                    <button class="hamburger hamburger--emphatic-r" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>     
                <!-- </div> -->
                <!-- <div class="logo-container"> -->
                    <div class="logo-image">
                        <img src="../images/FoodLogo3.png" alt="Logo" class="logo-img">
                    </div>
                <!-- </div> -->
                <div class="menu-container">
                    <ul>
                        <li class="left-border ">
                            <i class="fa-regular fa-chart-tree-map"></i>
                            <a href="dashboard.php" title="Dashboard">Dashboard</a>
                        </li>
                        <li class="left-border ">
                            <i class="fa-regular fa-list-radio"></i>
                            <a href="orders.php" title="Orders">Orders</a>
                        </li>
                        <li class="left-border ">
                            <i class="fa-regular fa-table-cells"></i>
                            <a href="categories.php" title="Categories">Categories</a>
                        </li>
                        <li class="left-border ">
                            <i class="fa-regular fa-plate-utensils"></i>
                            <a href="foods.php" title="Foods">Foods</a>
                        </li>
                    </ul>
                </div>
                <div class="logout-container">
                    <div class="avatar"  >
                        <img src="../images/avatarProfile.png" alt="Avatar">
                    </div>
                    <div class="logout-menu">
                        <h3>Avatar Name</h3>
                        <ul>
                            <li><i class="fa-regular fa-arrow-right-from-bracket"></i><a href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main-content-container split">