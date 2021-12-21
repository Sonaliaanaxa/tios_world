@include("home.layouts.header")            

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".header").load("header.html");
            $(".footer").load("footer.html");
        });
    </script>

<style>
    /*-----------------
	19. Error
-----------------------*/

.error-page {
    align-items: center;
    color: #1f1f1f;
    display: flex;
}
.error-page .main-wrapper {
    display: flex;
    flex-wrap: wrap;
    height: auto;
    justify-content: center;
    width: 100%;
	min-height: unset;
}
.error-box {
    margin: 0 auto;
    max-width: 480px;
    padding: 1.875rem 0;
    text-align: center;
    width: 100%;
}
.error-box h1 {
    color: #00d0f1;
    font-size: 10em;
}
.error-box p {
    margin-bottom: 1.875rem;
}
.error-box .btn {
    border-radius: 50px;
    font-size: 18px;
    font-weight: 600;
    min-width: 200px;
    padding: 10px 20px;
}

</style>
    <!--Jquery End-->

</head>

<body class="account-page">
    <div class="header"></div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
			
        <div class="error-box">
            <h1>404</h1>
            <h3 class="h2 mb-3"><i class="fa fa-warning"></i> Oops! Page not found!</h3>
            <p class="h4 font-weight-normal">The page you requested was not found.</p>
            <a href="home" class="btn btn-primary">Back to Home</a>
        </div>
    
    </div>
                       

        <!-- Footer -->
@include("home.layouts.footer")

        <!-- /Footer -->

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