<?php

  session_start();


  // DATABASE CONNECTION //
  $db = mysqli_connect("localhost" , "root" , "" , "casa");

  if(!$db) {
    die("Connection failed: ".mysqli_connect_error());
  }
  // DATABASE CONNECTION //

  if(isset($_POST['search']))
  {
    $_SESSION['checkin'] = $_POST['checkin'];
    $_SESSION['checkout'] = $_POST['checkout'];
    header("Location: availableroom.php");
  }

  if(isset($_POST['LOGIN']))
  {

    $login_username = mysqli_real_escape_string($db,$_POST['username']);
    $login_password = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT * FROM accounts WHERE username = '$login_username' AND password = '$login_password'";
    $result = mysqli_query($db, $sql);

    if (!$row = $result->fetch_assoc()){
      echo "<script>alert('Username or Password is Incorrect ! ');window.location.href='login.php';</script>";
    }

    else {
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['uid'];
            $sql = "SELECT * FROM accounts WHERE username = '$login_username' and password = '$login_password' ";
            $result = mysqli_query($db, $sql);
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $login_username;

            if ($row['verified'] === '32')
                  header("Location: admin/admin_home.php");

            elseif ($row['verified'] === '16')
                  header("Location: admin/user_home.php");

            else
            echo "<script>alert('ERROR 0x1000');window.location.href='index.php';</script>";

            die();
        }

  }

  if(isset($_POST['reg_info']))
  {

    if($_POST['reg_password'] == $_POST['reg_password2'])
    {
      $reg_fn = $_POST['reg_first_name'];
      $reg_ln = $_POST['reg_last_name'];
      $reg_email = $_POST['reg_email'];
      $reg_username = $_POST['reg_username'];
      $reg_pw = $_POST['reg_password'];
      $reg_pw2 = $_POST['reg_password2'];
      $reg_mobile = $_POST['reg_mobile'];
      $reg_telephone = $_POST['reg_telephone'];

      $full_name = $reg_fn .','. $reg_ln;
      $user_type = '1';

      $sql = "SELECT * FROM accounts WHERE name = '$full_name' AND email = '$reg_email' ";
      $result = mysqli_query($db, $sql);

      if (!$row = $result->fetch_assoc()){
        $sql = "INSERT INTO accounts (username, password, name, email, mobile, telephone, verified)
                              VALUES ('$reg_username', '$reg_pw2', '$full_name', '$reg_email', '$reg_mobile', '$reg_telephone', $user_type)";
        $result = mysqli_query($db, $sql);
        echo "<script>alert('Successfully Registered ! ');window.location.href='login.php';</script>";
      }
      else
      {
        echo "<script>alert('Account already exists');window.location.href='register.php';</script>";
      }

    }
    else
    {
      echo "<script>alert('Password and Confirm Password did not match !');window.location.href='register.php';</script>";
    }

  }

  if(isset($_POST["view_room_info_id"]))
  {
       $_SESSION['view_room_info_id']=$_POST["view_room_info_id"];
  }

  if(isset($_POST['new_room_add']))
  {
    $number = $_POST['add_number'];
    $type = $_POST['add_type'];
    $name = $_POST['add_name'];
    $info = $_POST['add_info'];
    $price = $_POST['add_price'];
    $adult = $_POST['add_adult'];
    $child = $_POST['add_children'];
    $avail = "1";
    $img1 = "img/" . basename($_POST['add_image_1']);
    $img2 = "img/" . basename($_POST['add_image_2']);
    $img3 = "img/" . basename($_POST['add_image_3']);

    $sql = "INSERT INTO available (room_number, room_type, room_name, room_info, room_price, room_adult, room_child, room_availability, room_image, room_image2, room_image3)
            VALUES ('$number', '$type', '$name', '$info', '$price', '$adult', '$child', '$avail', '$img1', '$img2', '$img3')";
    $result = mysqli_query($db, $sql);

    echo "<script>alert('New Room has been added !');window.location.href='admin/admin_newroom.php';</script>";
  }

  if(isset($_POST['edit_id']))
  {
    $output = '';
    $sql = "SELECT * FROM available WHERE id = '".$_POST["edit_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
         $id = $row['id'];
         $name = $row['room_name'];
         $info = $row['room_info'];
         $price = $row['room_price'];

         $output .= '
              <input type="text" name="update_id" class="form-control" value="'.$id.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_name" value="'.$name.'" placeholder="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Info</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_info" value="'.$info.'" placeholder="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_price" value="'.$price.'" placeholder="" required>
                </div>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;
  }

  if(isset($_POST['edit_room']))
  {
    $id = $_POST['update_id'];
    $name = $_POST['update_name'];
    $info = $_POST['update_info'];
    $price = $_POST['update_price'];

    $sql = "UPDATE available SET room_name = '$name', room_info = '$info', room_price = '$price' WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    echo "<script>alert('Room information has been updated !');window.location.href='admin_roomlist.php';</script>";
  }

  if(isset($_POST['del_id']))
  {
    $output = '';
    $sql = "SELECT * FROM available WHERE id = '".$_POST["del_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
         $id = $row['id'];
         $number = $row['room_number'];

         $output .= '
              <input type="text" name="update_id" class="form-control" value="'.$id.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Room Number</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_name" value="'.$number.'" placeholder="" disabled>
                </div>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;
  }

  if(isset($_POST['delete_room']))
  {
    $id = $_POST['update_id'];

    $sql = "DELETE FROM available WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    echo "<script>alert('Room information has been Deleted !');window.location.href='admin_roomlist.php';</script>";
  }

  if(isset($_POST['reserve_id']))
  {
    $output = '';
    $sql = "SELECT * FROM booked WHERE id = '".$_POST["reserve_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
         $id = $row['id'];

         $output .= '
              <input type="text" name="req_id" class="form-control" value="'.$id.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-7">
                  <select name="status" class="form-control">
                  <option value="0">Pending</option>
                  <option value="1">Accept</option>
                  </select>
                </div>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;
  }

  if(isset($_POST['reservation']))
  {
    $id = $_POST['req_id'];
    $status = $_POST['status'];

    $sql = "UPDATE BOOKED SET status ='$status' WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    echo "<script>alert('Booking Status Updated !');window.location.href='admin_reservations.php';</script>";
  }


  if(isset($_POST['info_id']))
  {
    $output = '';
    $sql = "SELECT * FROM company_info WHERE id = '".$_POST["info_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
         $id = $row['id'];

         $output .= '
              <input type="text" name="id" class="form-control" value="'.$id.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Location</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_location" value="'.$row['location'].'"required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Telephone</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_telephone" value="'.$row['telephone'].'"required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" name="update_email" value="'.$row['email'].'"required>
                </div>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;
  }

  if(isset($_POST['update_info']))
  {
    $id = $_POST['id'];
    $location = $_POST['update_location'];
    $telephone = $_POST['update_telephone'];
    $email = $_POST['update_email'];

    $sql = "UPDATE company_info SET location ='$location', telephone ='$telephone', email ='$email' WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    echo "<script>alert('Company Information has been Updated !');window.location.href=admin_info.php';</script>";
  }

  if(isset($_POST['verify_id']))
  {
    $output = '';
    $sql = "SELECT * FROM accounts WHERE uid = '".$_POST["verify_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
         $id = $row['uid'];

         $output .= '
              <input type="text" name="id" class="form-control" value="'.$id.'" hidden>

              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" value="'.$row['username'].'" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Verify</label>
                <div class="col-sm-7">
                  <select name="verify" class="form-control">
                    <option value="16">Pending</option>
                    <option value="32">Verify</option>
                  </select>
                </div>
              </div>

              ';
    }
    $output .= "</form>";
    echo $output;
  }

  if(isset($_POST['approve']))
  {
    $id = $_POST['id'];
    $verify = $_POST['verify'];

    $sql = "UPDATE accounts SET verified ='$verify' WHERE uid = '$id'";
    $result = mysqli_query($db, $sql);
    echo "<script>alert('Booking Status Updated !');window.location.href='admin_accounts.php';</script>";
  }

  if(isset($_POST['reserve_room']))
  {
    $_SESSION['roomid'] = $_POST['room_id'];
    $_SESSION['child'] = $_POST['room_child'];
    $_SESSION['adult'] = $_POST['room_adult'];
    $_SESSION['checkin'] = $_POST['check-in'];
    $_SESSION['checkout'] = $_POST['check-out'];
    header("Location: room_payment.php");
  }

  if(isset($_POST['payment']))
  {
    $holder = $_POST['card_holder'];
    $email = $_POST['user_email'];
    $number = $_POST['card_number'];
    $cvv = $_POST['card_cvv'];
    $id = $_SESSION['roomid'];
    $in = $_SESSION['checkin'];
    $out = $_SESSION['checkout'];
    $status = 0;

    $sql0 = "SELECT * FROM available WHERE id = '".$_SESSION['roomid']."'";
    $result0 = mysqli_query($db, $sql0);
    while($row0 = mysqli_fetch_array($result0))
    {
      $price = $row0['room_price'];
    }

    $sql = "INSERT INTO booked (room_id, user_email, booked_name, booked_start, booked_end, booked_price, card_number, card_cvv, status)
    VALUES ('$id', '$email', '$holder', '$in', '$out', '$price', '$number', '$cvv', '$status')";
    $result = mysqli_query($db, $sql);
    echo "<script>alert('Booking Success !');window.location.href='index.php';</script>";
  }

  if(isset($_POST['wallet']))
  {
    $address = $_POST['wallet_address'];
    $name = $_POST['name_wallet'];
    $email = $_POST['user_email_add'];
    $id = $_SESSION['roomid'];
    $in = $_SESSION['checkin'];
    $out = $_SESSION['checkout'];
    $status = 0;

    $sql0 = "SELECT * FROM available WHERE id = '".$_SESSION['roomid']."'";
    $result0 = mysqli_query($db, $sql0);
    while($row0 = mysqli_fetch_array($result0))
    {
      $price = $row0['room_price'];
    }

    $sql = "INSERT INTO booked (room_id, user_email, booked_name, booked_start, booked_end, booked_price, online_wallet, status)
    VALUES ('$id', '$email', '$name', '$in', '$out', '$price', '$address', '$status')";
    $result = mysqli_query($db, $sql);

    echo "<script>alert('Booking Success !');window.location.href='index.php';</script>";
  }

  if(isset($_POST['report']))
  {
    $_SESSION['date1'] = $_POST['date1'];
    $_SESSION['date2'] = $_POST['date2'];
    header("Location: admin_reports.php");

  }

?>
