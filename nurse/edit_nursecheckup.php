<!-- function of admin -->
<?php include('function.php');

if (!isNurse()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

  $staff_id ='';
  $p_id ='';
  $checkup_id  ='';
  $nurse_comment ='';
  $checkup_date  ='';
        

if (isset($_GET['edit_nursecheckup'])) {
  $checkup_id = $_GET['edit_nursecheckup'];
  $edit_nursecheckup = true;
  $rec = mysqli_query($db, "SELECT * FROM checkup WHERE checkup_id=$checkup_id"); 

  $record = mysqli_fetch_array($rec);
  $staff_id = $record['staff_id'];
  $p_id = $record['p_id'];
  $nurse_comment = $record['nurse_comment'];
  }
?>

<!DOCTYPE html>
<html>
<head>

	<title>Edit checkup</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/nurse/file.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
    
	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Edit checkup</label>
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
  
    <div class="container" style="margin-bottom: 50px;">
    	<form action="edit_bed.php" method="post" id="frm">
        	<input type="hidden" name="staff_id" value="<?php echo $_SESSION['user']['staff_id']; ?>">
        	<input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
          <input type="hidden" name="checkup_id" value="<?php echo $checkup_id; ?>">

          <label>Checkup Date</label><br><br>
          <input type="text" name="checkup_date" readonly value="<?php echo( date("Y/m/d")) ?>" id="name"><br><br>

          <label>Nurse comment</label><br><br>
          <textarea id="test" name="nurse_comment"value="<?php echo $nurse_comment; ?>"><?php echo $nurse_comment; ?></textarea><br><br><br>

          <button type="submit" class="button submit" name="nursecheck_btn" id="booking">Update</button>
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
