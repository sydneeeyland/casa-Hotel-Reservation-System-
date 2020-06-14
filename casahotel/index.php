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
          <div class="col-4 site-logo" data-aos="fade"><a href="index.php"><em>Casa de Estella</em></a></div>
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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="login.php">Sign In</a></li>
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

    <section class="site-hero overlay" style="background-image: url(img/slider_hero_2.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Enjoy A Luxury <br> Experience <br><br></h1>
            <div class="row">
              <div class="block-32" style="border-radius: 25px;">

                <form method="POST">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                      <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                      <div class="field-icon-wrap">
                        <input type="text" name="checkin" class="form-control" style="border-radius: 15px;" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                      <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                      <div class="field-icon-wrap">
                        <input type="text" name="checkout" class="form-control" style="border-radius: 15px;" required>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4 align-self-end">
                      <button class="btn btn-primary btn-block text-white" name="search">Check Availabilty</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- END section -->

    <section class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2" data-aos="fade-up">
            <img src="img/about_feature_image.png" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading">Welcome <em>to</em> Casa de Estella.</h2>
            <p class="lead">THE LARGES FOUR STAR FAMILY FRIENDLY HOTEL OF CALAPAN CITY.</p>
            <p class="mb-4">The wonderful Mediterranean style hotel, situated in three buildings, is open to guests all year round with 17 air conditioned balconied rooms equipped with extras, of which 18 are luxury suites that satisfy all needs. The hotel is also the largest conference and wellness centre of the region, equally attracting those wishing to relax and business travellers. The conference division, which is uniquely equipped in the region in terms of technology, thus confers a central role to the hotel in business life.</p>
          </div>

        </div>
      </div>
    </section>

    <!-- END section -->


    <!-- END section -->
    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Help</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Our Location</a></li>
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <?php
          $sql = "SELECT * FROM company_info";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result))
          {
            $location = $row['location'];
            $telephone = $row['telephone'];
            $email = $row['email'];
          ?>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>LOCATION</span> <span><?php echo $location; ?></span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>CONTACT US</span> <span><?php echo $telephone; ?></span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>EMAIL US</span> <span><?php echo $email; ?></span></p>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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

    <script>
        var checkin;
        var checkout;
        $(document).ready(function(){
           $('input[name="checkin"]').daterangepicker({
              "singleDatePicker": true,
              "showWeekNumbers": true,
              "showISOWeekNumbers": true,
              "minDate": new Date()
          }, function(start, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD'));
            checkin = start;
          });

           $('input[name="checkout"]').daterangepicker({
              "singleDatePicker": true,
              "showWeekNumbers": true,
              "showISOWeekNumbers": true,
              "minDate": new Date()
          }, function(end, label) {
            console.log('New date range selected: ' + end.format('YYYY-MM-DD'));
            checkout = end;
          });
          $('#search').click(function(){
              console.log(checkin.format('YYYY-MM-DD') + ' - ' + checkout.format('YYYY-MM-DD'));
          });
        });
    </script>

  </body>
</html>
