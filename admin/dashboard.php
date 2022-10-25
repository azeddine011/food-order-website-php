<?php include("partials/menu.php");  ?>

        
            <div class="card-container">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="card-title">
                                <h5>Orders (30 Days)</h5>
                                <span>0</span>
                            </div>
                            <div class="card-icon clr-pink">
                                <i class="fa-regular fa-chart-column"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <div class="card-content">
                            <div class="card-title">
                                <h5>Sales (30 Days)</h5>
                                <span>0</span>
                            </div>
                            <div class="card-icon clr-orange">
                                <i class="fa-regular fa-chart-column"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <div class="card-content">
                            <div class="card-title">
                                <h5>Number of products</h5>
                                <span>0</span>
                            </div>
                            <div class="card-icon clr-yellow">
                                <i class="fa-regular fa-chart-column"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <div class="card-content">
                            <div class="card-title">
                                <h5>Number of categories</h5>
                                <span>0</span>
                            </div>
                            <div class="card-icon clr-lightBleu">
                                <i class="fa-regular fa-chart-column"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-chart">
                <div class="bg-chart"> <!-- the background  -->
                    <div class="chart-header">
                        <div class="chart-header-content">
                            <h6>Overview</h6>
                            <h2>Sales value</h2>
                        </div>
                    </div>
                    <div class="chart-body">
                        <div class="chart">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="js/lib/chartjs/chart.js"></script>
<?php include("partials/footer.php"); ?>