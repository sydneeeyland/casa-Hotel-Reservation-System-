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
    <section class="section contact-section" id="next">
      <div class="container">

        <div class="row">

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
                <?php
                $sql = "SELECT * FROM available WHERE id = '".$_SESSION['roomid']."'";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                  $id = $row['id'];
                  $number = $row['room_number'];
                  $type = $row['room_type'];
                  $name = $row['room_name'];
                  $info = $row['room_info'];
                  $price = $row['room_price'];
                  $adult = $_SESSION['adult'];
                  $child = $_SESSION['child'];
                  $in = $_SESSION['checkin'];
                  $out = $_SESSION['checkout'];
                  $d1 = date_create($in);
                  $d2 = date_create($out);
                  $interval = date_diff($d1, $d2);
                  $fin = $interval->format('%a');

                  $total = $fin * $price;
                }
                ?>
                <label>Room Name</label>
                <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                <label>Room Type</label>
                <input type="text" class="form-control" value="<?php echo $type; ?>" disabled>
                <label>Room Info</label>
                <textarea class="form-control" disabled><?php echo $info; ?></textarea>
                <label>Adult</label>
                <input type="text" class="form-control" value="<?php echo $adult; ?>" disabled>
                <label>Child</label>
                <input type="text" class="form-control" value="<?php echo $child; ?>" disabled>
            </form>
          </div>

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="100">
              <label>From</label>
              <input type="text" class="form-control" value="<?php echo $in; ?>" disabled>
              <label>To</label>
              <input type="text" class="form-control" value="<?php echo $out; ?>" disabled>
              <hr style="border: 1px solid;">
              <div class="col-md-12">
                <div class="row">

                  <div class="form-group">
                    <label>Room Price</label>
                    <input type="text" class="col-md-12 form-control" value="₱ <?php echo number_format($price,2); ?>" disabled>
                  </div>
                  <p style="color: white;">_____</p>
                  <div class="form-group">
                    <label>Adult</label>
                    <input type="text" class="col-md-12 form-control" value="<?php echo $adult; ?>" disabled>
                  </div>
                  <p style="color: white;">_____</p>
                  <div class="form-group">
                    <label>Child</label>
                    <input type="text" class="col-md-12 form-control" value="<?php echo $child; ?>" disabled>
                  </div>

                </div>

                <hr style="border: 1px solid;">
                <label>Total Days</label>
                <input type="text" class="col-md-4 form-control" value="<?php echo $fin; ?>" disabled>
                <hr style="border: 1px solid;">
                <label>Total Price</label>
                <input type="text" class="col-md-4 form-control" value="₱ <?php echo number_format($total,2); ?>" disabled>
                <hr style="border: 1px solid;">
                <h4 align="center">Mode of Payment</h4>
                <div align="center">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#logoutModal">Credit/Debit Card</button> &nbsp;
                  <button class="btn btn-primary" data-toggle="modal" data-target="#wallet">Online Wallet</button> &nbsp;
                  <form method="POST"><br>
                    <button type="submit" class="btn btn-primary" name="cash">Walk in</button>
                  </form>
                </div>
              </div>
          </div>

        </div>
      </div>
    </section>

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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Credit/Debit Card</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <form method="POST">
            <select name="brand" class="form-control" required>
              <option value="Master Card">Master Card</option>
              <option value="Visa">Visa</option>
            </select>
            <label>Name</label>
            <input type="text" class="form-control" name="card_holder" required>
            <label>Email Address</label>
            <input type="email" class="form-control" name="user_email" required>
            <label>Card Number</label>
            <input type="text" class="form-control" name="card_number" maxlength="16" required>
            <label>CVV</label>
            <input type="text" class="form-control" name="card_cvv" maxlength="3" required>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="payment"> Confirm</a>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="wallet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Online Wallet</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <form method="POST">
            <label>Name</label>
            <input type="text" class="form-control" name="name_wallet" required>
            <label>Wallet Address</label>
            <input type="text" class="form-control" name="wallet_address" required>
            <label>Email Address</label>
            <input type="email" class="form-control" name="user_email_add" required>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="wallet"> Confirm</a>
          </div>
          </form>
        </div>
      </div>
    </div>


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
