<?php
include("backend.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Casa de Estella</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">




    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <header class="site-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 site-logo" data-aos="fade"><a href="index.php"><em>Casahotel</em></a></div>
          <div class="col-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto text-center">
                      <ul class="list-unstyled menu">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="register.php">Register</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(img/slider-2.jpg);" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="col-md-12" style="padding-top: 250px;" data-aos="fade-up" data-aos-delay="100">

          <form method="POST" class="bg-white p-md-5 p-4 mb-5 border">
            <div class="col-md-12 form-group">
              <label for="name">USERNAME</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="col-md-12 form-group">
              <label for="phone">PASSWORD</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="col-md-12 form-group" align="right">
              <input type="submit" name="LOGIN" value="Sign In" class="btn btn-primary">
            </div>
          </form>

        </div>
      </div>
    </section>
    <!-- END section -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>


    <script src="js/aos.js"></script>

    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>



    <script src="js/main.js"></script>
  </body>
</html>
