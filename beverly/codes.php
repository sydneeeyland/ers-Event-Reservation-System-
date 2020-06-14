<?php

// DATABASE CONNECTION //
session_start();
$db = mysqli_connect("localhost" , "root" , "" , "beverly");

if(!$db) {
  die("Connection failed: ".mysqli_connect_error());
}
// DATABASE CONNECTION //

// LOGIN SESSION //
if(isset($_POST['login']))
{
  $username = $_POST['login_username'];
  $password = $_POST['login_password'];

  $sql = "SELECT * FROM accounts WHERE username = '$username' and password = '$password'";
  $result = mysqli_query($db, $sql);

  if(!$row = $result->fetch_assoc())
  {
    echo "<script>alert('Username or Password is Incorrect ! ');window.location.href='login.php';</script>";
  }
  else
  {
    $_SESSION['username'] = $row['username'];
    $_SESSION['full_name'] = $row['full_name'];
    $_SESSION['user_id'] = $row['id'];
    $sql = "SELECT * FROM accounts WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($db, $sql);
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $username;

    if($row['type'] === 'admin')
      header("Location: admin/index.php");

    elseif ($row['type'] === 'user')
      header("Location: user/index.php");

    else
    echo "<script>alert('ERROR 0x1000');window.location.href='login.php';</script>";
    die();
  }
}
// LOGIN SESSION //

// LOGOUT SESSION //
if(isset($_POST['logout']))
{
  session_start();
  unset($_SESSION['username']);
  session_destroy();

  header("Location: ../login.php");
  exit;
}
// LOGOUT SESSION //

// BOOKING IN MAIN PAGE //
if(isset($_POST['booking']))
{

  if(isset($_SESSION['username']) == true)
  {
    $event_type = $_POST['event'];
    $event_date = $_POST['start'];
    $event_client = $_POST['client_name'];
    $event_email = $_POST['client_email'];
    $event_mobile = $_POST['client_mobile'];
    $event_status = "Pending";
    $uid = $_SESSION['user_id'];

    $sql = "INSERT INTO events (uid, event_type, event_date, event_client, event_contact, event_status) VALUES ('$uid', '$event_type', '$event_date', '$event_client', '$event_mobile', '$event_status')";
    $result = mysqli_query($db, $sql);

    echo "<script>alert('Reservation has been submitted !');window.location.href='user/index.php';</script>";
  }
  else
  {
    header("Location: login.php");
  }

}
// BOOKING IN MAIN PAGE //

// REGISTER PAGE //
if(isset($_POST['register']))
{
  $username = $_POST['register_username'];
  $password = $_POST['register_password'];
  $email = $_POST['register_email'];
  $full_name = $_POST['register_fullname'];
  $contact = $_POST['register_contact'];
  $type = "user";

  $sql = "INSERT INTO accounts (username, password, full_name, type) VALUES ('$username', '$password', '$full_name', '$type')";
  $result = mysqli_query($db, $sql);

  echo "<script>alert('You are now registered !');window.location.href='login.php';</script>";
}
// REGISTER PAGE //

// CANCEL BOOKING //
if(isset($_POST['del_id']))
{
  $output = '';
  $sql = "SELECT * FROM events WHERE id = '".$_POST["del_id"]."'";
  $result = mysqli_query($db, $sql);
  $output .= '
  <form method="POST">';
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['id'];
    $output .= '
    <input type="text" name="delete_id" class="form-control" value="'.$id.'" hidden>
    ';
  }
  $output .= "</form>";
  echo $output;
}

// APPROVE BOOKING //
if(isset($_POST['approve_id']))
{
  $output = '';
  $sql = "SELECT * FROM events WHERE id = '".$_POST["approve_id"]."'";
  $result = mysqli_query($db, $sql);
  $output .= '
  <form method="POST">';
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['id'];
    $output .= '
    <input type="text" name="delete_id" class="form-control" value="'.$id.'" hidden>
    ';
  }
  $output .= "</form>";
  echo $output;
}

if(isset($_POST['approve_booking']))
{
  $id = $_POST['delete_id'];
  $status = "Approved";
  $sql = "UPDATE events
  SET event_status = '$status'
  WHERE id = '$id'";
  $result = mysqli_query($db,$sql);
  var_dump($sql);
  //echo "<script>alert('Booking has been Approved ! ');window.location.href='index.php';</script>";

}

if(isset($_POST['cancel_book']))
{
  $id = mysqli_real_escape_string($db,$_POST['delete_id']);

  $sql = "DELETE FROM events WHERE id ='".$id."' ";
  $result = mysqli_query($db, $sql);
  echo "<script>alert('Booking has been canceled ! ');window.location.href='index.php';</script>";
}
// CANCEL BOOKING //

// BOOKING PAYMENT //
if(isset($_POST['res_id']))
{
  $output = '';
  $sql = "SELECT * FROM events WHERE id = '".$_POST["res_id"]."'";
  $result = mysqli_query($db, $sql);
  $output .= '
  <form method="POST">';
  while($row = mysqli_fetch_array($result))
  {
       $id = $row['id'];
       $name = $row['event_client'];

       $output .= '
            <input type="text" class="form-control" name="reservation_id" value="'.$id.'" hidden>
            <label>Card Number</label>
            <input type="text" class="form-control" maxlength="16" name="card_number">
            <label>Card CVV</label>
            <input type="text" class="form-control" maxlength="3" name="card_cvv">
            <label>Card Expiry</label>
            <input type="text" class="form-control" name="card_expiry">
            ';
  }
  $output .= "</form>";
  echo $output;
}

if(isset($_POST['reserve']))
{
  $id = $_POST['reservation_id'];
  $number = $_POST['card_number'];
  $cvv = $_POST['card_cvv'];
  $expiry = $_POST['card_expiry'];

  $sql = "UPDATE events SET card_number = '$number', card_cvv = '$cvv', card_expiry = '$expiry' WHERE id = '$id'";
  $result = mysqli_query($db, $sql);
  echo "<script>alert('Payment has been updated !');window.location.href='index.php';</script>";
}

// BOOKING PAYMENT //

?>
