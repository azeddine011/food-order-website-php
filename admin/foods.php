<?php include("../config/connect.php"); ?>
<?php include("partials/menu.php"); ?>

<?php
    if(isset($_SESSION["delete"])){
        echo $_SESSION["delete"];
        unset($_SESSION["delete"]);
    }
    if(isset($_SESSION["update"])){
        echo $_SESSION["update"];
        unset($_SESSION["update"]);
    }
?>

<div class="orderHeader">
    <h3>Categories</h3>
</div>
<div class="table-container">
    <div class="bg-table">
        <div class="table-header">
            <div class="title">
                <h3>Foods</h3>
            </div>
            <div class="btn-create">
                <a href="foods/create.php">Create</a>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Product</th>
                            <th>category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="sticky-col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $query = "SELECT * FROM `food`;";
                            $res = mysqli_query($cnx,$query);

                            while($row = mysqli_fetch_assoc($res)){
                                $cat_id = $row["category-id"];
                                $category = mysqli_fetch_assoc(mysqli_query($cnx,"SELECT * FROM `category` WHERE id=\"$cat_id\";"));
                                $cat_name = $category['title'];
                                $active = ($row["active"] == "1")?"Active":"Inactive";
                                echo '

                                <tr>
                                    <td>
                                        <div class="admin-food-img">
                                            <img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row["image-name"]).' " alt="Plate image">
                                        </div>
                                    </td>
                                    <td>'.$row["title"].'</td>
                                    <td>'.$cat_name.'</td>
                                    <td>'.$row["price"].'</td>
                                    <td>'.$active.'</td>
                                    <td class="sticky-col">
                                        <div class="dropDown-btn">
                                            <i class="fa-regular fa-ellipsis-vertical"></i>
                                        </div>
                                        <div class="action-container">
                                            <ul>
                                                <li>
                                                    <span><a href=" ' . siteUrl . 'admin/foods/update.php?id='.$row["id"].'&ctid='.$row["category-id"] . ' ">Edit</a></span>
                                                </li>
                                                <li>
                                                    <span><a href=" ' . siteUrl . 'admin/foods/delete.php?id='.$row["id"].'">Delete</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                
                                
                                ';
                            }

                        ?>




                        <!-- <tr>
                            <td>
                                <div class="admin-food-img">
                                    <img src="../images/plate6.png" alt="Plate image">
                                </div>
                            </td>
                            <td>Plate1</td>
                            <td>Plates</td>
                            <td>100.00</td>
                            <td>Active</td>
                            <td class="sticky-col">
                                <div class="dropDown-btn">
                                    <i class="fa-regular fa-ellipsis-vertical"></i>
                                </div>
                                <div class="action-container">
                                    <ul>
                                        <li>
                                            <span><a href="#">Edit</a></span>
                                        </li>
                                        <li>
                                            <span><a href="#">Delete</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td>
                                <div class="admin-food-img">
                                    <img src="../images/plate6.png" alt="Plate image">
                                </div>
                            </td>
                            <td>Plate2</td>
                            <td>Plates</td>
                            <td>100.00</td>
                            <td>Active</td>
                            <td class="sticky-col">
                                <div class="dropDown-btn">
                                    <i class="fa-regular fa-ellipsis-vertical"></i>
                                </div>
                                <div class="action-container">
                                    <ul>
                                        <li>
                                            <span><a href="#">Edit</a></span>
                                        </li>
                                        <li>
                                            <span><a href="#">Delete</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="admin-food-img">
                                    <img src="../images/plate6.png" alt="Plate image">
                                </div>
                            </td>
                            <td>Plate3</td>
                            <td>Plates</td>
                            <td>100.00</td>
                            <td>Inactive</td>
                            <td class="sticky-col">
                                <div class="dropDown-btn">
                                    <i class="fa-regular fa-ellipsis-vertical"></i>
                                </div>
                                <div class="action-container">
                                    <ul>
                                        <li>
                                            <span><a href="#">Edit</a></span>
                                        </li>
                                        <li>
                                            <span><a href="#">Delete</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="admin-food-img">
                                    <img src="../images/plate6.png" alt="Plate image">
                                </div>
                            </td>
                            <td>Plate4</td>
                            <td>Plates</td>
                            <td>100.00</td>
                            <td>Inactive</td>
                            <td class="sticky-col">
                                <div class="dropDown-btn">
                                    <i class="fa-regular fa-ellipsis-vertical"></i>
                                </div>
                                <div class="action-container">
                                    <ul>
                                        <li>
                                            <span><a href="#">Edit</a></span>
                                        </li>
                                        <li>
                                            <span><a href="#">Delete</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr> -->
                        
                        <!-- xxxxxxxxxxxxxxx --> 
                    </tbody>
                </table>
            </div>
            <ul class="table-pagination">
                
            </ul>
        </div>
    </div>
</div>

<?php include("partials/footer.php"); ?>