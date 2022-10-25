<?php

include("../../config/connect.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $query  = "DELETE FROM CATEGORY WHERE id=".$id;
    $res = mysqli_query($cnx,$query);
    if($res){
        $_SESSION["delete"] = '<div class="alertBox">
            <i class="fa-regular fa-circle-check" style="color: rgb(69, 143, 69);font-size: 26px;flex: 0 0 15%;"></i>
            <div class="alert alert-success">
                <h4>Category Deleted</h4>
                <h6>category deleted successfully</h6>
            </div>
        </div>';
        header("location:".siteUrl."admin/categories.php");
    }else{
        $_SESSION["delete"] = '<div class="alertBox" >
            <i class="fa-solid fa-circle-xmark" style="color: red;font-size: 26px;flex: 0 0 15%;"></i>
            <div class="alert alert-error">
                <h4>Category deletion failed</h4>
                <h6>the category didn\'t delete successfully</h6>
            </div>
        </div>';
        header("location:".siteUrl."admin/categories.php");
    }

}else{
    header("location:".siteUrl."admin/categories.php");
}