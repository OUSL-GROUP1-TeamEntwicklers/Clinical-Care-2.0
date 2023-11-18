<!-- function of admin -->
<?php include('function.php');

if (!isNurse()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

        $p_id       ='';
        $checkup_id   ='';
        $checkup_name = '';
        $doctor_comment     ='';
        $nurse_comment       ='';
        $checkup_date   ='';
        $diagnosis = '';
        $diagnosis_id = '';
        

if (isset($_GET['add_nursecheckup'])) {
      $p_id = $_GET['add_nursecheckup'];

      $rec = mysqli_query($db, "SELECT * FROM checkup WHERE p_id=$p_id"); 

  $record = mysqli_fetch_array($rec);
  $checkup_name = $record['checkup_name'];
  $doctor_comment = $record['doctor_comment'];
  $doctor_comment = $record['doctor_comment'];
  $nurse_comment = $record['nurse_comment'];
  $checkup_date = $record['checkup_date'];
  $checkup_id = $record['checkup_id'];
}   

if (isset($_GET['add_nursecheckup'])) {
      $p_id = $_GET['add_nursecheckup'];

      $recs = mysqli_query($db, "SELECT * FROM diagnosis WHERE p_id=$p_id"); 

  $records = mysqli_fetch_array($recs);
  $diagnosis = $records['diagnosis'];
  $diagnosis_id = $records['diagnosis_id'];
  
}       

?>

<!DOCTYPE html>
<html>
<head>

	<title>Add checkup</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/nurse/file.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
    
	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Add checkup</label>
	      <ul>
	        <li><a class="active"  href="nurse_home.php">HOME</a></li>
	        
	        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
            
	        <li>
                <!-- logged in user information -->

            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['fname']); ?>)</i> 
                    <img src="/pis/images/151.png" class="profile_info">
                 </small>

            <?php endif ?>
        </li>

      </ul>
    </nav><br><br><br><br>
  
    <div class="container" style="margin-bottom: 50px;">
    	<form action="add_nursecheckup.php" method="post" id="frm">
        	<input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
          <input type="hidden" name="checkup_id" value="<?php echo $checkup_id; ?>">
          <input type="hidden" name="diagnosis_id" value="<?php echo $diagnosis_id; ?>">

          <label>Diagnosis</label><br><br>
          <input type="disabled" id="name" name="diagnosis" value="<?php echo $diagnosis; ?>"><br><br><br>

          <label>Checkup</label><br><br>
          <input type="disabled" id="name" name="checkup_name" value="<?php echo $checkup_name; ?>"><br><br><br>

       		<label>Doctor comment</label><br><br>
          <input type="disabled" id="name" name="doctor_comment" value="<?php echo $doctor_comment; ?>"><br><br><br>

          <label>Checkup Date</label><br><br>
          <input type="text" name="checkup_date" readonly value="<?php echo( date("Y/m/d")) ?>" id="name"><br><br>

          <label>Nurse comment</label><br><br>
          <textarea id="test" name="nurse_comment"></textarea><br><br><br>

          <button type="submit" class="button submit" name="nursecheck_btn" id="booking">Add</button>
      </form>
     </div>
    	

    <!-- ****************************************************************************************************** -->

    
        
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
