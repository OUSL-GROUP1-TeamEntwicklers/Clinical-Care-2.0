<?php include('functions.php');

if (!isReceptionist()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Booking</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>
</head>
<body>

	<nav>
    <label id="title">| View Booking</label>
      <ul>
      	<li><a href="receptionist_home.php">HOME</a></li>
        <li><a href="add_patient.php">ADD PATIENT</a></li>
        <li><a class="active" href="approval_booking.php">BOOKING</a></li>
        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
        <li>
				<!-- logged in user information -->

     		<?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['user_name']); ?>)</i> 
                    <img src="/pis/images/130.jpg" class="profile_info">
                 </small>

            <?php endif ?>
 		</li>

      </ul>
    </nav>

<?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>

<div class="container">

	<center><h3>Booking Deatails</h3><br><br></center>

	<form action="view_app_booking.php" method="post" id="frm">
      <input type="hidden" name="p_id" value="<?php echo $_SESSION['user']['p_id']; ?>">
      <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">

    
      <label style="font-style: normal; font-weight: normal;">Booking Date :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $booking_date; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Channel Doctor :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $doctor; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Reason :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $reason; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Time :</label>
      <?php if ($approval_time=="00:00:00"): ?>
        <label style="font-style: normal; font-weight: normal;"> <b>Pending</b> </label><br>
      <?php else: ?>
        <label style="font-style: normal; font-weight: normal;"><?php echo $approval_time; ?></label><br>
      <?php endif ?>

      <label style="font-style: normal; font-weight: normal;">Status :</label>
      <?php if ($status==""): ?>
        <label style="font-style: normal; font-weight: normal;"> <b>Pending</b> </label><br>
      <?php else: ?>
        <label style="font-style: normal; font-weight: normal;"><?php echo $status; ?></label><br>
      <?php endif ?>
    </form>  <br><br><br>


<center><h3>Booking Approval</h3><br></center>

  <form action="view_app_booking.php" method="post" id="frm">
    <input type="hidden" name="p_id" value="<?php echo $_SESSION['user']['p_id']; ?>">
    <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">

    <label>Approval Time</label><br><br>
    <input type="text" name="approval_time" id="name" readonly value=" <?php
        date_default_timezone_set("Asia/Colombo");
        echo date("h:i");
        ?>"><br><br>

    <label>Discription</label><br><br>
    <textarea id="test" name="status"></textarea><br><br>

    <input type="submit" name="booking_approval" value="Booking Approval" id="booking">
  </form>
     </div>
    
 <!-- data table (search, show entries etc..) -->
    <script>
  	$(document).ready(function() {
    $('#allusers').DataTable();
	} );
	</script>

	<!-- ************************* error massage time out  ********************************** -->

	<script type="text/javascript">

	$(document).ready(function () {
	 
	window.setTimeout(function() {
	    $(".msg").fadeTo(1000, 0).slideUp(1000, function(){
	        $(this).remove();
	    });
	}, 5000);
	 
	});
	</script>

</body>
</html>