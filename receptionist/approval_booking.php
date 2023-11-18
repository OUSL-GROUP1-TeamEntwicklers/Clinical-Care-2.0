<!-- function of admin -->
<?php include('functions.php'); 

if (!isReceptionist()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Booking</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/receptionist/receptionist_home.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Booking</label>
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

    <h1 id="head">Booking Approval</h1>

    <?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>
    
    <div id="s"> <!-- white div -->
    <table id="allusers" class="table table-striped table-bordered" style="width: 100%">
    	<thead>
    		<tr>
    			<th>Patient Name</th>
    			<th id="a">Id Number</th>
    			<th id="a">Phone Number</th>
    			<th id="a">Reason</th>
    			<th id="a">Booking Date</th>
    			<th id="a">Approval</th>
                <th id="a">Approval Time</th>
                <th id="a">View</th>
                <th id="a">Edit</th>
    		</tr>
    	</thead>

    	<tbody> 
    		<?php
            $result_E=mysqli_query($db,"SELECT * from patient t1
INNER JOIN Booking t2
    ON t1.p_id = t2.p_id;");
            while ($row = mysqli_fetch_array($result_E)) { ?>
    		<tr>
    			<td id="b">
              <?php echo $row['fname']," ", $row['lname']; ?>
            </td>
            <td>
              <?php echo $row['id_number']; ?>              
            </td>
            <td>
              <?php echo $row['contact_no']; ?>
            </td>
            <td>
              <?php echo $row['reason']; ?>              
            </td>
            <td align="center">
              <?php echo $row['booking_date']; ?>                
            </td>
            <td>
              <?php if ($row['approval']==0): ?>
                 <button type="button" class="btn btn-danger btn-sm">Not Approval</button>
              <?php else: ?>
                  <button type="button" class="btn btn-success btn-sm">Aproveled</button>
              <?php endif ?>

            </td>
            <td>
              <?php if ($row['approval']==0): ?>
                Procesing
              <?php else: ?>
                <?php echo $row['approval_time']; ?>
              <?php endif ?>

            </td>
            
            <td align="center">

                <a href="view_app_booking.php?view_approval=<?php echo $row['booking_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-eye"></i> View </a>
            </td>  
            <td align="center">
              
              <a href="edit_app_booking.php?Edit_approval=<?php echo $row['booking_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i> Edit </a>

            </td>      

    		</tr>
    		<?php } ?>
    	</tbody>	
    </table>
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
