<?php

include("../../config/connect.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $query  = "DELETE FROM food WHERE id=".$id;
    $res = mysqli_query($cnx,$query);
    if($res){
        $_SESSION["delete"] = '<div class="alertBox">
            <i class="fa-regular fa-circle-check" style="color: rgb(69, 143, 69);font-size: 26px;flex: 0 0 15%;"></i>
            <div class="alert alert-success">
                <h4>Food Deleted</h4>
                <h6>Food deleted successfully</h6>
            </div>
        </div>';
        header("location:".siteUrl."admin/foods.php");
    }else{
        $_SESSION["delete"] = '<div class="alertBox" >
            <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
            <div class="alert alert-error">
                <h4>Food deletion failed</h4>
                <h6>the food didn\'t delete successfully</h6>
            </div>
        </div>';
        header("location:".siteUrl."admin/foods.php");
    }

}else{
    header("location:".siteUrl."admin/foods.php");
}