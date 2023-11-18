<!-- function of admin -->
<?php include('function.php'); 

if (!isNurse()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

    $file_name     ='';
    $p_id       ='';
    $file_size   ='';
   
if (isset($_GET['file'])) {
      $p_id = $_GET['file'];

$rec = "SELECT * FROM file  WHERE p_id='$p_id'";
$resultK = mysqli_query($db, $rec);
$files = mysqli_fetch_all($resultK, MYSQLI_ASSOC);
}     

?>

<!DOCTYPE html>
<html>
<head>

	<title>File</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/nurse/nurse_home.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/nurse/file.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| File</label>
	      <ul>
	        <li><a href="nurse_home.php">HOME</a></li>
	        
	        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
            
	        <li>
                <!-- logged in user information -->

            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo($_SESSION['user']['user_name']); ?>)</i> 
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
    
<div class="container">
    <h1>File Upload</h1><br>

    <form action="file.php" method="post" id="frm" enctype="multipart/form-data">
        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">

        <div class="errormessege">
            <?php include('../errors.php'); ?>
        </div>

            <table border="0">
                <tr>
                    <td><label>Choose File:</label></td>
                    <td><input type="file" name="myfile" multiple="" id="slts"></td>
                    <td><input type="submit" name="upload" value="Upload" id="booking"></td>
                </tr>
            </table>
    </form>
</div><br><br><br>


<div id="s"> <!-- white div -->
    <table id="allusers" class="table table-striped table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th id="a">File Id</th>
                <th id="a">File Name</th>
                <th id="a">Size (in MB)</th>
                <th colspan="2" id="a">Action</th>
            </tr>
        </thead>

        <tbody> 
            <?php foreach ($files as $file): ?>
            <tr>
                <td id="a"><?php echo $file['file_id']; ?></td>
                <td id="a"><?php echo $file['file_name']; ?></td>
                <td id="a"><?php echo floor($file['file_size'] / 1000) .'KB'; ?></td>

                <td align="center">
                    <a href="file.php?view_file=<?php echo $file['file_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i> View </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    <a href="file.php?del_file=<?php echo $file['file_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to Delete the Checkup?')">Delete</a>
                </td>
            </td>
            </tr>
            <?php endforeach;?>

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
