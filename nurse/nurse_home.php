<!-- function of admin -->
<?php include('function.php'); 

if (!isNurse()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Nurse Home</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/nurse/nurse_home.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Nurse Home</label>
	      <ul>
	        <li><a class="active"  href="nurse_home.php">HOME</a></li>
	        
	        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
            
	        <li>
                <!-- logged in user information -->

            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['user_name']); ?>)</i> 
                    <img src="/pis/images/151.png" class="profile_info">
                 </small>

            <?php endif ?>
        </li>

      </ul>
    </nav><br><br><br><br>

    <!-- <h6 id="head" style="color: white;">Doctor Home</h6> -->

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
    			<th id="a">ID Number</th>
    			<th id="a">Contact No</th>
    			<th id="a">Discharging</th>
    			<th id="a">Ward</th>
                <th colspan="2" id="a">Bed</th>
                <th id="a">Checkup</th>
                <th id="a">File</th>
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
                <td id="a"><?php echo $row['bed_number']; ?></td>
                <td><a href="edit_bed.php?edit_bed=<?php echo $row['p_id']; ?>" class="btn btn-info btn-sm" ><i class="fas fa-eye"></i> Edit </a>
                </td>

    			<td align="center">
                    <a href="view_checkup.php?view_checkup=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i>View Checkup</a>
                </td>  

                <td align="center">
                    <a href="file.php?file=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-file-pdf"></i>File</a>&nbsp&nbsp<i class="fas fa-file-archive"></i>
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
