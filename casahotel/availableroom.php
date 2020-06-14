<?php
include("backend.php")
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
    <script src="js/1.js"></script>
    <script src="js/2.js"></script>
    <script src="js/3.js"></script>

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

    <section class="site-hero inner-page overlay" style="background-image: url(img/slider_hero_1.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Our Rooms</h1>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->


    <section class="section bg-light" id="next">

      <div class="container">
        <form method="POST">
          <table>
            <?php
            $checkin = $_SESSION['checkin'];
            $checkout = $_SESSION['checkout'];
          //  $postid = $_SESSION['view_room_info_id'];

            $sql = "SELECT * FROM available";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result))
            {
            ?>
                <tr>

                  <div class="site-block-half d-flex bg-white" data-aos="fade-up" data-aos-delay="100">
                    <a href="#" class="image d-block bg-image" style="background-image: url('<?php echo $row['room_image']; ?>');"></a>
                    <div class="text">
                      <span class="d-block"><span class="display-4 text-primary">₱<?php echo $row['room_price']; ?></span> / per night <br></span>
                      <h2><?php echo $row['room_name']; ?></h2>
                      <p class="lead"><?php echo $row['room_info']; ?></p>
                      <p><input type="submit" id="<?php echo $row['id']; ?>" value="BOOK NOW" class="btn btn-primary text-white view_room_info" name="book_now"></p>
                    </div>
                  </div>

                </tr>
                <br>
            <?php
            }
            ?>
          </table>
        </form>
      </div>

    </section>

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
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>ADDRESS</span> <span><?php echo $location; ?></span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>CONTACT US</span> <span><?php echo $telephone; ?></span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>EMAIL US</span> <span><?php echo $email; ?></span></p>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </footer>

    <script>
    $(document).ready(function(){
         $('.view_room_info').click(function(){
              var view_room_info_id = $(this).attr("id");
              $.ajax({
                   url:"backend.php",
                   method:"post",
                   data:{view_room_info_id:view_room_info_id},
                   success:function(data){
                     window.location="roominfo.php";
                   }
              });
         });
    });
    </script>

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
