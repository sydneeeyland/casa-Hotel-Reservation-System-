<?php
include("backend.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Casa de Estella | Room Info</title>
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
                        <li><a href="index.html">Home</a></li>
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
<?php
$postid0 = $_SESSION['view_room_info_id'];

$sql = "SELECT * FROM available WHERE id = '$postid0'";
$result = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($result))
{
?>
    <section class="site-hero inner-page overlay" style="background-image: url(img/slider-2.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading"><?php echo $row['room_name']; ?></h1>
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
<?php
}
?>
<?php

$postid = $_SESSION['view_room_info_id'];

$sql = "SELECT * FROM available WHERE id = '$postid'";
$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($result))
{
  $id = $row['id'];
?>
    <section class="section contact-section" id="next">
      <div class="container">

        <div class="row">
          <div class="col-md-12 ml-auto contact-info">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?php echo $row['room_image']; ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo $row['room_image2']; ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo $row['room_image3']; ?>" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">

            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="text" name="room_id" class="form-control" value="<?php echo $id; ?>" hidden>
                  <select class="form-control" name="room_adult">
                    <option hidden>How many adults?</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  <br>
                  <select class="form-control" name="room_child">
                    <option hidden>How many children?</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  <br>
                  <label>Check in</label>
                  <input type="date" name="check-in" class="form-control"><br>
                  <label>Check out</label>
                  <input type="date" name="check-out" class="form-control">
                  <br>
                  <input type="submit" name="reserve_room" value="RESERVE NOW" class="btn btn-primary">
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="100">
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row bg-white p-md-5 p-4 mb-5 border">
                <span class="d-block"><span class="display-4 text-primary">₱<?php echo $row['room_price']; ?></span> / per night <br></span>
                <br>
                <?php
                echo $row['room_info'];
                ?>
              </div>
              <hr>
              <i class="fa fa-wifi" aria-hidden="true"></i> <b>100 MBPS WI-FI</b> &nbsp; &nbsp; <b>|</b> &nbsp; &nbsp;
              <i class="fa fa-shower" aria-hidden="true"></i> <b>SHAMPOO</b> &nbsp; &nbsp; <b>|</b> &nbsp; &nbsp;
              <i class="fa fa-snowflake-o" aria-hidden="true"></i> <b>AIR CONDITION</b> &nbsp; &nbsp; <b>|</b> &nbsp; &nbsp;
              <i class="fa fa-bath" aria-hidden="true"></i> <b>BATHROOM ESSENTIALS</b> &nbsp; &nbsp; <b>|</b> &nbsp; &nbsp;
              <hr>
            </form>
          </div>

        </div>
      </div>
    </section>

<?php
}
?>

    <!-- END section -->
    <section class="section testimonial-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8">
            <h2 class="heading" data-aos="fade-up">Testimonial</h2>
          </div>
        </div>



        <div class="row">
          <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">

            <?php
            $sql = "SELECT * FROM testimonials";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result))
            {
            ?>
            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="<?php echo $row['image']; ?>" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;<?php echo $row['testimonial']; ?>&rdquo;</p>
              </blockquote>
              <p><em>&mdash; <?php echo $row['user_name']; ?></em></p>
            </div>
            <?php
            }
            ?>
          </div>
            <!-- END slider -->
        </div>

      </div>
    </section>

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
