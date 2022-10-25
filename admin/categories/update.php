<!DOCTYPE html>
<?php include("../../config/connect.php");?>
<?php

    if(isset($_GET["id"])){
        $id = $_GET['id'];
        $query = "SELECT * FROM CATEGORY WHERE id=". $id;
        $res = mysqli_query($cnx,$query);
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $active = $row["active"];
        }
    }else{
        header("location:".siteUrl."admin/categories.php");
    }



    
                                                
    //if save button clicked
    if($_POST){
        $catName = $_POST["catName"];
        $active = (isset($_POST["check-active"]) != "1")? "0":"1";
        if($catName!=""){
            $sql = "SELECT * FROM category WHERE title='$catName' and active='$active' ";
            $res = mysqli_query($cnx,$sql);
            if(mysqli_num_rows($res)!=0){
                    $_SESSION["update"] =  '<div class="alertBox" >
                    <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
                    <div class="alert alert-error">
                        <h4>Category Allready exists</h4>
                        <h6>the category didn\'t update successfully</h6>
                    </div>
                    </div>';
                    header("location:".siteUrl."admin/categories.php");
                    
            }else{
                $active = (isset($_POST["check-active"]) != "1")? "0":"1";
                $query = "UPDATE CATEGORY SET title = '$catName',active ='$active' WHERE id = $id ";
                $res = mysqli_query($cnx, $query);
                if($res){
                    $_SESSION["update"] = '<div class="alertBox">
                    <i class="fa-regular fa-circle-check" style="color: rgb(69, 143, 69);font-size: 26px;flex: 0 0 15%;"></i>
                    <div class="alert alert-success">
                        <h4>Category edited</h4>
                        <h6>category edited successfully</h6>
                    </div>
                    </div>';
                    header("location:".siteUrl."admin/categories.php");
                }else{
                    echo "failed";
                }
            }
        }
    }
                        




?>
<html lang="en">
<head>
    <!-- this code make the page auto Reload -->
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- humburgers menu link -->
    <link rel="stylesheet" href="../js/lib/hamburgers/hamburgers.min.css">
    

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
                        <img src="../../images/FoodLogo3.png" alt="Logo" class="logo-img">
                    </div>
                <!-- </div> -->
                <div class="menu-container">
                    <ul>
                        <li class="left-border ">
                            <i class="fa-regular fa-chart-tree-map"></i>
                            <a href="../dashboard.php" title="Dashboard">Dashboard</a>
                        </li>
                        <li class="left-border ">
                            <i class="fa-regular fa-list-radio"></i>
                            <a href="../orders.php" title="Orders">Orders</a>
                        </li>
                        <li class="left-border ">
                            <i class="fa-regular fa-table-cells"></i>
                            <a href="../categories.php" title="Categories">Categories</a>
                        </li>
                        <li class="left-border ">
                            <i class="fa-regular fa-plate-utensils"></i>
                            <a href="../foods.php" title="Foods">Foods</a>
                        </li>
                    </ul>
                </div>
                <div class="logout-container">
                    <div class="avatar"  >
                        <img src="../../images/avatarProfile.png" alt="Avatar">
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
            <!-- <div class="alertBox" >
                <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
                <div class="alert alert-error">
                    <h4>Category Allready exists</h4>
                    <h6>the category didn't save successfully</h6>
                </div>
            </div> -->

            <div class="orderHeader">
                <h3>Categories</h3>
            </div>
            <div class="table-container">
                <div class="bg-table">
                    <div class="table-header flx-col">
                        <div class="title">
                            <h3>Categories</h3>
                        </div>
                        <div class="btn-create">
                            <a href="#" id="saveSubmit"  name="submit1">Save</a>
                            <a href="../categories.php">Back</a>
                            </div>
                    </div>
                    <div class="table-wrapper form-wrapper">
                        <form id="myForm" method="POST">
                            <div>
                                <h6>Main information</h6>
                            </div>
                            <div class="form-group">
                                <label for="catName">Name</label>
                                <input type="text" placeholder="Name" name="catName" id="catName" value="<?php echo $title; ?>" required>
                            </div>
                            <div class="form-group" style="flex-direction:row;">
                                <label for="checkB-active">Active Category:</label>
                                <input type="checkbox" name="check-active" id="check-active" style="margin:0 20px 0.5em 30px;" value='1' <?php if($active==1){echo "checked";} ?> >
                            </div>
                            <!-- <input type="submit" value="cwx" name="submit1"> -->
                        </form>

                        

                    </div>
                </div>
            </div>
            <div class="footer">
                <footer style="padding:2rem 1rem;">
                    <p>All &copy; <?php echo date("Y"); ?> <a href="#">Azeddine Taki</a></p>
                </footer>
            </div>
        </div>
    </div>

    <script src="../js/lib/jquery/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>
    
</body>
</html>

