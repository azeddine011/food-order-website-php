<?php include("partials/menu.php"); ?>
<?php include("../config/connect.php"); ?>

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
                <h3>Categories</h3>
            </div>
            <div class="btn-create">
                <a href="categories/create.php">Create</a>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="table cat-tab">
                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th class="sticky-col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $query = "SELECT * FROM category";
                            $res = mysqli_query($cnx,$query);
                            $catId;
                            while($row = mysqli_fetch_assoc($res)){
                                // $catId = $row["id"];
                                echo '
                                <tr>
                                    <td>' . $row["title"] . '</td>
                                    <td class="sticky-col">
                                        <div class="dropDown-btn">
                                            <i class="fa-regular fa-ellipsis-vertical"></i>
                                        </div>
                                        <div class="action-container">
                                            <ul>
                                                <li>
                                                    <span><a href=" ' . siteUrl . 'admin/categories/update.php?id='.$row["id"] . ' ">Edit</a></span>
                                                </li>
                                                <li>
                                                    <span><a href=" ' . siteUrl . 'admin/categories/delete.php?id='.$row["id"] . ' ">Delete</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                ';
                            }
                        
                        
                        
                        
                        ?>
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