<?php include("../../config/connect.php");?>

<?php

    if(isset($_GET["id"])){
        $id = $_GET['id'];
        
        // die();
        $query = "SELECT * FROM food WHERE id=". $id;
        $res = mysqli_query($cnx,$query);
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $food_name = $row['title'];
            $dbPrice = $row['price'];
            $dbActive = $row['active'];
            $dbFeatured = $row['featured'];
            $dbImage_name = $row["image-name"];
        }
    }else{
        header("location:".siteUrl."admin/foods.php");
        exit();
    }


    //if save button clicked
 

    if($_POST){
        // print_r($_FILES["file-input"]);
        $title = $_POST["foodName"];
        if(isset($_POST["foodDropdown"])){$category = $_POST["foodDropdown"];}
        $price = $_POST["foodPrice"];
        $image_name = $_FILES["file-input"]["name"];
        if($title!="" && isset($category) && $price!=""){

            $active = (isset($_POST["check-active"]) != "1")? "0":"1";
            $featured = (isset($_POST["check-featured"]) != "1")? "0":"1";

            
            $image_name = basename($_FILES["file-input"]["name"]);
            $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);

            // echo base64_encode($dbImage_name);
            // header("Content-type: image/jpeg");
            // echo $dbImage_name;
            // $test = pathinfo(base64_encode($dbImage_name),PATHINFO_EXTENSION);
            // echo $test;
            
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                $url = "https://";
            else
                $url = "http://";
            // Append the host(domain name, ip) to the URL.
            $url.= $_SERVER['HTTP_HOST'];
            // Append the requested resource location to the URL
            $url.= $_SERVER['REQUEST_URI'];
                
            // echo $url;
            // echo "<br>";
            // echo "<hr>";

            $html = file_get_contents($url);
            
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            
            $tags = $doc->getElementById("imgBlob");
            $tag = $tags->getAttribute("src");
            // echo $tag;

            $reg = '/(?<=;base64,).*$/i';
            preg_match($reg,$tag,$matches);
            // echo $matches["0"];
            $imgBlob = $matches["0"];

            // $final_img="";

            if($imgBlob == base64_encode($dbImage_name)){
                $final_img = $dbImage_name;

                // // echo $dbImage_name;
                // echo '<br>';
                // echo "azeddine";
                // echo '<br>';
                // // echo $final_img;
                // die();

            }else{
                $allow_ext = array('jpg','png','jpeg','gif');
                if(in_array($image_ext,$allow_ext)){

                    $image = $_FILES["file-input"]["tmp_name"];
                    $image_content = addslashes(file_get_contents($image));
                    $final_img =$image_content;
                }
                else{
                    $_SESSION["update"] =  '<div class="alertBox" >
                    <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
                    <div class="alert alert-error">
                        <h4>Wrong image Format</h4>
                        <h6>Format must be (.jpg, .png, .jpeg, .gif)</h6>
                        </div>
                    </div>';
                    header("location:".siteUrl."admin/foods.php");
                    exit();
                }
            }

            


            
            // die();
            
            // $allow_ext = array('jpg','png','jpeg','gif');
            // if(in_array($image_ext,$allow_ext)){
                // $image = $_FILES["file-input"]["tmp_name"];
                // $image_content = addslashes(file_get_contents($image));
                // if(!isset($image_content)){
                //     $image_content = $dbImage_name;
                // }
                    
                $query = $cnx->prepare("UPDATE food SET `category-id` = ?,title = ?,price = ?, 
                `image-name` = ?, featured = ?, active =? WHERE id=? ;  ");
                
                $query->bind_param("isdbssi",$category,$title,$price,$final_img,$featured,$active,$id);
                $res = $query->execute();


                // $query = "UPDATE food SET `category-id` = \"$category\",title = \"$title\",price = $price, 
                //         `image-name` = \"$final_img\", featured = \"$featured\",
                //          active =\"$active\" WHERE id=$id ;  ";
    
                // $res = mysqli_query($cnx, $query);
                if($res){
                    $_SESSION["update"] = '<div class="alertBox">
                        <i class="fa-regular fa-circle-check" style="color: rgb(69, 143, 69);font-size: 26px;flex: 0 0 15%;"></i>
                        <div class="alert alert-success">
                            <h4>food edited</h4>
                            <h6>Food edited successfully</h6>
                        </div>
                    </div>';
                    header("location:".siteUrl."admin/foods.php");
                }else{
                    $_SESSION["update"] =  '<div class="alertBox" >
                        <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
                        <div class="alert alert-error">
                            <h4>Something went wrong</h4>
                            <h6>Image format must be (jpg, png, jpeg, gif)</h6>
                        </div>
                    </div>';
                    header("location:".siteUrl."admin/foods.php");
                }
            // }
            // else{
            //     $_SESSION["update"] =  '<div class="alertBox" >
            //     <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
            //     <div class="alert alert-error">
            //         <h4>Wrong image Format</h4>
            //         <h6>Format must be (.jpg, .png, .jpeg, .gif)</h6>
            //         </div>
            //     </div>';
            //     header("location:".siteUrl."admin/foods.php");
            // }

        }else{
            $_SESSION["update"] =  '<div class="alertBox" >
                <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
                <div class="alert alert-error">
                    <h4>Fill all section</h4>
                    <h6>Please fill all inputs</h6>
                </div>
            </div>';
            header("location:".siteUrl."admin/foods.php");
        }
       
    }


?>
<!DOCTYPE html>
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

            <div class="orderHeader">
                <h3>foods</h3>
            </div>
            <div class="table-container">
                <div class="bg-table">
                    <div class="table-header flx-col">
                        <div class="title">
                            <h3>Foods</h3>
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
                                <input type="text" placeholder="Name" name="foodName" id="foodName" value="<?php echo $food_name ;?>" required>
                            </div>
                            <div class="form-group">
                                <label for="foodDropdown">Category</label>
                                <select name="foodDropdown" id="foodDropdown">
                                    <option value="" disabled >Choose a category</option>
                                    <?php
                                        $query = "SELECT * FROM CATEGORY";
                                        $res = mysqli_query($cnx,$query);
                                        while($row=mysqli_fetch_assoc($res)){
                                            $selected = ($row['id']==$_GET['ctid']) ? "selected": "";
                                            echo "<option value='".$row["id"]."'".$selected." >".$row["title"]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foodPrice">Price</label>
                                <input type="text" id="foodPrice" name="foodPrice" placeholder="Price" value="<?php echo $dbPrice;?>" required >
                            </div>
                            <div class="form-group contCombo" style="flex-direction:row;flex-wrap:wrap;">
                                <div>
                                    <label for="checkB-active">Status:</label>
                                    <input type="checkbox" name="check-active" id="check-active" style="margin:0 20px 0.5em 30px;" value='1' <?php if($dbActive==1){echo "checked";} ?>>
                                </div>
                                <div>
                                    <label for="checkB-featured">Featured:</label>
                                    <input type="checkbox" name="check-featured" id="check-featured" style="margin:0 20px 0.5em 30px;" value='1' <?php if($dbFeatured==1){echo "checked";} ?> >    
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
                                        <div class="box-2 img-result ">
                                            <img class="cropped" id="imgBlob" src= <?php echo 'data:image/jpg;charset=utf8;base64,'.base64_encode($dbImage_name).'';?> alt="food image">
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