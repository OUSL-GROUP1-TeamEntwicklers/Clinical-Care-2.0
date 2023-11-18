<!-- common function -->
<?php include('../functions.php');

		$staff_id     ='';
		$p_id     	='';
		$bed_number   ='';
		$admitdischarge_id = '';	  
// update checkup
	if (isset($_POST['submit_btn'])) {
	
		$staff_id     =$_POST['staff_id'];
		$p_id     	=$_POST['p_id'];
		$bed_number   =$_POST['bed_number'];
		$admitdischarge_id   =$_POST['admitdischarge_id'];
		
		if (empty($staff_id)) {
			array_push($errors, "Add the Staff Id");	
		}
		if (empty($p_id)) {
			array_push($errors, "Add the Patient Id");	
		}

		if (empty($bed_number)) {
			array_push($errors, "Add the bed number");	
		}

		if (empty($admitdischarge_id)) {
			array_push($errors, "Add the admitdischarge id");	
		}

		if (count($errors)== 0) {
			mysqli_query($db,"UPDATE admit SET bed_number='$bed_number' WHERE p_id= '$p_id'. admitdischarge_id= '$admitdischarge_id'");

			mysqli_query($db,"UPDATE patient SET bed_number='$bed_number' WHERE p_id= '$p_id'");

			$_SESSION['message'] = "Checkup is updated!";
	  		header('location: nurse_home.php');
		}
	}	 
// Add Nurse checkup
        $p_id ='';
        $checkup_id  ='';
        $nurse_comment ='';
        $checkup_date  ='';
        
	if (isset($_POST['nursecheck_btn'])) {
	
		$p_id     	=$_POST['p_id'];
		$checkup_id   =$_POST['checkup_id'];
		$nurse_comment     	=$_POST['nurse_comment'];
		$checkup_date   =$_POST['checkup_date'];

		if (empty($p_id)) {
			array_push($errors, "Add the Patient Id");	
		}

		if (empty($checkup_id)) {
			array_push($errors, "Add the bed number");	
		}
		
		if (empty($nurse_comment)) {
			array_push($errors, "Add the nurse comment");	
		}

		if (empty($checkup_date)) {
			array_push($errors, "Add the bed number");	
		}

		if (count($errors)== 0) {
			mysqli_query($db,"UPDATE checkup SET nurse_comment='$nurse_comment',checkup_date='$checkup_date' WHERE checkup_id= '$checkup_id'");

			$_SESSION['message'] = "Checkup is updated!";
	  		header('location: nurse_home.php');
		}
	}	
// Uploads files
if (isset($_POST['upload'])) { // if save button on the form is clicked
    // name of the uploaded file
    $errors = array();
    $p_id = $_POST['p_id'];
    $file_name = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $file_name;

    // get the file extension
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $file_size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
         array_push($errors, "You file extension must be .zip, .pdf or .docx");

    } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        array_push($errors, "File too large!");
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO file (file_name,file_size,p_id) VALUES ('$file_name','$file_size','$p_id')";
            mysqli_query($db, $sql);
                 $_SESSION['message'] =   "File uploaded successfully!";
                 header('location: nurse_home.php');
            
        } else {
            array_push($errors, "Failed to upload file.");
        }
    }
  }

// Downloads files
if (isset($_GET['view_file'])) {
    $file_id = $_GET['view_file'];

    // fetch file to download from database
    $sql = "SELECT * FROM file WHERE file_id=$file_id";
    $resultL = mysqli_query($db, $sql);

    $file = mysqli_fetch_assoc($resultL);
    $filepath = 'uploads/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.basename($filepath));
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            readfile('uploads/' . $file['file_name']);
    }
}
//Delete Records *****************************************************************************
if (isset($_GET['del_file'])) {
  $file_id=$_GET['del_file'];

    $sql = "SELECT * FROM file WHERE file_id=$file_id";
    $result = mysqli_query($db, $sql);

    $file = mysqli_fetch_assoc($result);
    $file_name=$file['file_name'];

  unlink('uploads/'.$file_name);
  $sql="DELETE FROM file WHERE file_id='$file_id'";
  $result=mysqli_query($db, $sql);
  header('location: nurse_home.php');
}

?>