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

	<title>Receptionist Home</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/receptionist/receptionist_home.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">    
    <link rel="stylesheet" type="text/css" href="/pis/css/receptionist/button.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Receptionist Home</label>
	      <ul>
	        <li><a class="active"  href="receptionist_home.php">HOME</a></li>
	        <li><a href="add_patient.php">ADD PATIENT</a></li>
	        <li><a href="approval_booking.php">BOOKING</a></li>

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
    </nav><br><br><br><br>
    
    <!-- <h6 id="head" style="color: white;">Receptionist Home</h6> -->

    <?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>

    <div>
        <button onclick="window.print();" class="submit">
        Print
        </button>
    </div>
    
    <div id="s print-container"> <!-- white div -->
    <table id="allusers" class="table table-striped table-bordered" style="width: 100%">
    	<thead>
    		<tr>
    			<th>Patient Name</th>
    			<th id="a">Id Number</th>
    			<th id="a">Phone Number</th>
    			<th id="a">Discharging</th>
    			<th id="a">Ward</th>
    			<th id="a">Action</th>
    		</tr>
    	</thead>

    	<tbody> 
    		<?php
            $result_D=mysqli_query($db,"SELECT * from patient");
             // t1 INNER JOIN ward t2 ON t1.p_id = t2.p_id;
            while ($row = mysqli_fetch_array($result_D)) { ?>
    		<tr>
    			<td style="text-align: left;"><?php echo $row['fname']," ", $row['lname']; ?></td> <!-- a refer as text align -->
    			<td id="a"><?php echo $row['id_number']; ?></td>
    			<td id="a"><?php echo $row['contact_no']; ?></td>
    			<td id="a"><?php echo $row['discharging_patient']; ?></td>
                <td id="a"><?php echo $row['w_id']; ?></td>
    			<td align="center">
                    <a href="view_patient.php?view_patient=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i> View </a>

    				<a href="edit_patient.php?edit_patient=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i> Edit </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    			
    				<a href="receptionist_home.php?delet_patient=<?php echo $row['p_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to Delete the User?')">Delete</a>
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
