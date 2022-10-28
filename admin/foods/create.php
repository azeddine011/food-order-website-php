<!DOCTYPE html>
<?php include("../../config/connect.php");?>
<?php

    if($_POST){
        // print_r($_FILES["file-input"]);
        $title = $_POST["foodName"];
        if(isset($_POST["foodDropdown"])){$category = $_POST["foodDropdown"];}
        $price = $_POST["foodPrice"];
        $image_name = $_FILES["file-input"]["name"];
        if($title!="" && isset($category) && $price!="" && $image_name!= ""){

            $active = (isset($_POST["check-active"]) != "1")? "0":"1";
            $featured = (isset($_POST["check-featured"]) != "1")? "0":"1";

            // $image_ext = explode('.',$image_name)[array_key_last(explode('.',$image_name))];
            // $image_name = "food_image_".date("Y-m-d_h_i_sa").".".$image_ext;
            
            // $source_path = $_FILES["file-input"]["tmp_name"];
            
            // $imgContent = addslashes(file_get_contents($source_path));
            

            // $destination_path = "../../images/foods-images/".$image_name;

            // //move the image
            // $upload = move_uploaded_file($source_path,$destination_path);
            // if(!$upload){
            //     $failed =  '<div class="alertBox" >
            //     <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
            //     <div class="alert alert-error">
            //         <h4>Error</h4>
            //         <h6>Image didn\'t upload try again please</h6>
            //     </div>
            //     </div>';
                
            // }

            $image_name = basename($_FILES["file-input"]["name"]);
            $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
            
            $allow_ext = array('jpg','png','jpeg','gif');
            if(in_array($image_ext,$allow_ext)){
                $image = $_FILES["file-input"]["tmp_name"];
                $image_content = addslashes(file_get_contents($image));

                $query = "INSERT INTO food (`category-id`,title,price,`image-name`,featured,active) 
                            VALUES (\"$category\",\"$title\",$price,\"$image_content\",\"$featured\",\"$active\");";
    
                $res = mysqli_query($cnx, $query);
                if($res){
                    $success = '<div class="alertBox">
                        <i class="fa-regular fa-circle-check" style="color: rgb(69, 143, 69);font-size: 26px;flex: 0 0 15%;"></i>
                        <div class="alert alert-success">
                            <h4>food Saved</h4>
                            <h6>Food saved successfully</h6>
                        </div>
                    </div>';
                    
                }else{
                    echo "failed";
                }
            }else{
                $failed =  '<div class="alertBox" >
                <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
                <div class="alert alert-error">
                    <h4>Wrong image Format</h4>
                    <h6>Format must be (jpg, png, jpeg, gif)</h6>
                </div>
            </div>';
            }

        }else{
            $failed =  '<div class="alertBox" >
                <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
                <div class="alert alert-error">
                    <h4>Fill all section</h4>
                    <h6>Please fill all inputs</h6>
                </div>
            </div>';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css" integrity="sha512-+VDbDxc9zesADd49pfvz7CgsOl2xREI/7gnzcdyA9XjuTxLXrdpuz21VVIqc5HPfZji2CypSbxx1lgD7BgBK5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

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

            <?php
                if(isset($success)){echo $success;}
                if(isset($failed)){echo $failed;}
            ?>

            <div class="orderHeader">
                <h3>foods</h3>
            </div>
            <div class="table-container">
                <div class="bg-table">
                    <div class="table-header flx-col">
                        <div class="title">
                            <h3>foods</h3>
                        </div>
                        <div class="btn-create">
                            <a href="#" id="saveSubmit">Save</a>
                            <a href="../foods.php">Back</a>
                            </div>
                    </div>
                    <div class="table-wrapper form-wrapper">
                        <form id="myForm" action="" method="POST" enctype="multipart/form-data">
                            <div>
                                <h6>Main information</h6>
                            </div>
                            <div class="form-group">
                                <label for="foodName">Name</label>
                                <input type="text" placeholder="Name" name="foodName" id="foodName" required>
                            </div>
                            <div class="form-group">
                                <label for="foodDropdown">Category</label>
                                <select name="foodDropdown" id="foodDropdown">
                                    <option value="" disabled selected>Choose a category</option>
                                    <?php
                                        $query = "SELECT * FROM CATEGORY";
                                        $res = mysqli_query($cnx,$query);
                                        while($row=mysqli_fetch_assoc($res)){
                                            echo "<option value='".$row["id"]."'>".$row["title"]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foodPrice">Price</label>
                                <input type="text" id="foodPrice" name="foodPrice" placeholder="Price" >
                            </div>
                            <div class="form-group contCombo" style="flex-direction:row;flex-wrap:wrap;">
                                <div>
                                    <label for="checkB-active">Status:</label>
                                    <input type="checkbox" name="check-active" id="check-active" style="margin:0 20px 0.5em 30px;" value='1'>
                                </div>
                                <div>
                                    <label for="checkB-featured">Featured:</label>
                                    <input type="checkbox" name="check-featured" id="check-featured" style="margin:0 20px 0.5em 30px;" value='1'>    
                                </div>
                            </div>
                            <!-- <div class="form-group" style="flex-direction:row;">
                                <label for="checkB-active">Featured:</label>
                                <input type="checkbox" name="check-featured" id="check-active" style="margin:0 20px 0.5em 30px;" value='1'>
                            </div> -->
                            <div class="form-group">
                                <label for="foodPrice">Photo</label>
                                <!-- upload image code start -->
                                <div class="upload-container">
                                    <div class="box d-flx">
                                        <label for="file-input" style="padding:10px 10px 10px 0;color:#5c5c5c;font-weight:450;">Upload Image:</label>
                                        <input type="file" class="custom-file-input" name="file-input" id="file-input" accept="image/*" required>
                                        <span class="upload-trash-icon hide"><i class="fa-solid fa-trash-can"></i></span>
                                    </div>
                                    <div class="d-flx">
                                        <div class="box-2">
                                            <div class="result"></div>
                                        </div>
                                        <!-- right box -->
                                        <div class="box-2 img-result hide">
                                            <img class="cropped" src="" alt="">
                                        </div>
                                    </div>
                                    <!-- save btn -->
                                    <div class="box">
                                        <button class="btn-save hide">Save</button>
                                    </div>
                                </div>
                                <!-- end -->
                                
                            </div>
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
    <!-- cropperjs cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/lib/cropperjs/cropper.js"></script>
</body>
</html>