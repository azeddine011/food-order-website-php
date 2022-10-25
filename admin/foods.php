<?php include("partials/menu.php"); ?>

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
                        <tr>
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
                        </tr>
                        <tr>
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
                        </tr>
                        
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