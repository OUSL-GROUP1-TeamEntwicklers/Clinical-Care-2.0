<?php include('functions.php');
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
      	<li><a href="booking.php">Home</a></li>
        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
        <li>

				<!-- logged in user information -->
     		<?php  if (isset($_SESSION['user'])) : ?>
              <strong><?php echo $_SESSION['user']['user_type']="Patient"; ?></strong>

            <small>
                <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['fname']); ?>)</i> 
                <img src="/pis/images/17.png" class="profile_info">
             </small>
        <?php endif ?>
 		</li>
      </ul>
    </nav>

    <!-- Display the session messeage -->
<?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>

<div class="container">

	<h1>Booking Details</h1><br><br>

	<form action="" method="post" id="frm">

      <label style="font-style: normal; font-weight: normal;">Patient Name :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $fname; ?>  <?php echo $lname; ?></label><br>
    
      <label style="font-style: normal; font-weight: normal;">Booking Date :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $booking_date; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Clinic :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $doctor; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Selected time :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $selected_time; ?></label><br>

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

     </div>
    </div>
	</form>


	<!--  message time out -->

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