
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Social Vaidya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".header").load("header.html");
            $(".footer").load("footer.html");
        });
    </script>

    <!--Jquery End-->
</head>

<body>


<?php
session_start();

?>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header"></div>
        <!-- /Header -->

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://medto.in">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Invoice View</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Invoice View</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="invoice-content">
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-logo">
                                            <img src="assets/img/logo.png" alt="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="invoice-details">
                                            <strong>Order:</strong> #00124 <br>
                                            <strong>Issued:</strong> <?php echo $_SESSION["date"] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice Item -->
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-info">
                                            <strong class="customer-text">Invoice From</strong>
                                            <p class="invoice-details invoice-details-two">
                                                <?php echo $_SESSION["name"]  ?> <br> <?php echo $_SESSION["address"]  ?> <br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!--<div class="invoice-info invoice-info2">
                                            <strong class="customer-text">Invoice To</strong>
                                            <p class="invoice-details">
                                                Walter Roberson <br> 299 Star Trek Drive, Panama City, <br> Florida, 32405, USA <br>
                                            </p>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->

                            <!-- Invoice Item -->
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-12">
                                       <!-- <div class="invoice-info">
                                            <strong class="customer-text">Payment Method</strong>
                                            <p class="invoice-details invoice-details-two">
                                                Debit Card <br> XXXXXXXXXXXX-2541 <br> HDFC Bank<br>
                                            </p>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            <!-- /Invoice Item -->

                            <!-- Invoice Item -->
                            <div class="invoice-item invoice-table-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="invoice-table table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">VAT</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>General Consultation</td>
                                                        <td class="text-center">1</td>
    <td class="text-center">₹&nbsp;<?php echo $_SESSION["price"]  ?></td>
 <td class="text-right">₹&nbsp;<?php echo $_SESSION["price"]  ?></td>
                                                    </tr>
                        <!--<tr>
            <td>Video Call Booking</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center">₹&nbsp;0</td>
                                                        <td class="text-right">₹&nbsp;250</td>
                                                    </tr>-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 ml-auto">
                                        <div class="table-responsive">
                                            <table class="invoice-table-two table">
                                                <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
    <td><span>₹&nbsp;<?php echo $_SESSION["price"]  ?></span></td>
                                                    </tr>
                                                    <tr>
                    <th>Discount:</th>
                    <td><span>-10%</span></td>
                                                    </tr>
                                                    <tr>
                    <th>Total Amount:</th>
                    <td><span>₹&nbsp;

                    </span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->

            <center>     <a href="http://medto.in/" class="btn btn-primary view-inv-btn">Home</a></center>

<?php

?>
                            <!-- Invoice Information --
                            <div class="other-info">
                                <h4>Other information</h4>
                                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus
                                    leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                            </div>
                            <!-- /Invoice Information -->

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->


        <!-- Footer -->
        <div class="footer"></div>
        <!-- /Footer -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>