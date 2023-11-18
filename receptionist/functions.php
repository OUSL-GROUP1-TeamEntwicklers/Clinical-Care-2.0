<!-- common function -->
<?php include('../functions.php');


// View Booking Recods ***********************************************************************************

	$booking_id='';
    $booking_date='';
    $doctor='';
    $reason='';
    $status='';
    $approval_time = '';

if (isset($_GET['view_approval'])) {
          $booking_id = $_GET['view_approval'];
          
          $records = mysqli_query($db, "SELECT * FROM booking WHERE booking_id=$booking_id");

          $sd = mysqli_fetch_array($records);
          $booking_id=$sd['booking_id'];
          $booking_date=$sd['booking_date'];
          $doctor=$sd['doctor'];
          $reason=$sd['reason'];
          $approval_time=$sd['approval_time'];
          $status=$sd['status'];
}


// Approval Booking and Update Booking *************************************************************************


if (isset($_POST['booking_approval'])) {


		$status = '';
	// receive all input values from the form
		$booking_id     = ($_POST['booking_id']);
		$p_id       	= ($_POST['p_id']);
		$approval_time	= ($_POST['approval_time']);
		$status       	= ($_POST['status']);
		$approval		=1;


		// form validation: ensure that the form is correctly filled
	
		if (empty($p_id)) { 
			array_push($errors, "Patient Id is required"); 
		}

		if (empty($booking_id)) { 
			array_push($errors, "Booking Id is required"); 
		}
		
		if (empty($approval_time)) { 
			array_push($errors, "Approval Time is required"); 
		}

		if (empty($status)) { 
			array_push($errors, "Status is required"); 
		}

		// booking item if there are no errors in the form
		if (count($errors) == 0) {
				mysqli_query($db,"UPDATE booking SET  approval_time='$approval_time',status='$status',approval='$approval' WHERE booking_id= '$booking_id'");			
				
				$_SESSION['message']  = "New booking is successfully added!!";
				header('location: approval_booking.php');
			}else{
						array_push($errors, "Connection errors !");		
			}

		}

// Edit Booking***********************************************************************************


if (isset($_GET['Edit_approval'])) {
          $booking_id = $_GET['Edit_approval'];
          $Edit_approval=true;


          $record = mysqli_query($db, "SELECT * FROM booking WHERE booking_id=$booking_id");

          $r = mysqli_fetch_array($record);

          $booking_id=$r['booking_id'];
          $approval_time=$r['approval_time'];
          $status=$r['status'];
  }


// Add Patient ***********************************************************************************

	$fname= "";
	$lname="";
	$birth_date="";
	$age="";
	$id_number="";
	$address_line1="";
	$address_line2="";
	$contact_no="";
	$gender="";
	$civil_status="";
	$staff_id="";
	$date = "";
	$time = "";

if (isset($_POST['add_patient'])) {

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$birth_date=$_POST['birth_date'];
	$age=$_POST['age']; 
	$id_number=$_POST['id_number']; 
	$address_line1=$_POST['address_line1']; 
	$address_line2=$_POST['address_line2']; 
	$contact_no=$_POST['contact_no']; 
	$gender=$_POST['gender']; 
	$civil_status=$_POST['civil_status']; 
	$staff_id=$_POST['staff_id']; 
	$date  = ($_POST['date']);
	$time  = ($_POST['time']);

	// form validation: ensure that the form is correctly filled
		if (empty($fname)) { 
			array_push($errors, "First Name is required"); 
		}
		if (empty($lname)) { 
			array_push($errors, "Last Name is required"); 
		}
		
		if (empty($birth_date)) { 
			array_push($errors, "Birthday is required"); 
		}

		if (empty($age)) { 
			array_push($errors, "Age is required"); 
		}

		if (empty($id_number)) { 
			array_push($errors, "Id Number is required"); 
		}

		if (empty($address_line1)) { 
			array_push($errors, "Address Line 1 is required"); 
		}
		
		if (empty($address_line2)) { 
			array_push($errors, "Address Line 2 is required"); 
		}

		if (empty($contact_no)) { 
			array_push($errors, "Contact No is required"); 
		}

		if (empty($gender)) { 
			array_push($errors, "Gender is required"); 
		}
		
		if (empty($civil_status)) { 
			array_push($errors, "Civil Status is required"); 
		}

		if (empty($staff_id)) { 
			array_push($errors, "Staff Id is required"); 
		}

		if (empty($date)) { 
			array_push($errors, "Date is required"); 
		}
		if (empty($time)) { 
			array_push($errors, "Time is required"); 
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			// $password = md5($password_1);//encrypt the password before saving in the database

	mysqli_query ($db,"INSERT INTO `patient` (`p_id`,`fname`, `lname`, `birth_date`, `age`, `id_number`, `address_line1`, `address_line2`, `contact_no`, `gender`, `civil_status`, `staff_id`, `date`, `time`) VALUES (NULL, '$fname', '$lname', '$birth_date', '$age', '$id_number', '$address_line1', '$address_line2','$contact_no', '$gender', '$civil_status', '$staff_id', '$date', '$time');");

	header('location: add_patient.php');
}else{
						array_push($errors, "Connection errors !");	
	

}

}		


// Update Patient ***********************************************************************************

if (isset($_POST['update_patient'])) {

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$birth_date=$_POST['birth_date'];
	$age=$_POST['age']; 
	$id_number=$_POST['id_number']; 
	$address_line1=$_POST['address_line1']; 
	$address_line2=$_POST['address_line2']; 
	$contact_no=$_POST['contact_no']; 
	$gender=$_POST['gender']; 
	$civil_status=$_POST['civil_status']; 
	$staff_id=$_POST['staff_id']; 
	$date  = ($_POST['date']);
	$time  = ($_POST['time']);
	$p_id=$_POST['p_id']; 


	  mysqli_query($db, "UPDATE patient SET fname='$fname',lname='$lname',birth_date='$birth_date',age='$age',id_number='$id_number',address_line1='$address_line1',address_line2='$address_line2',contact_no='$contact_no',gender='$gender',civil_status='$civil_status',staff_id='$staff_id',date='$date',time='$time' WHERE p_id='$p_id'");

	  $_SESSION['message'] = "Data is updated!";
	  header('location: receptionist_home.php');

	 }



// Delete Patient ***********************************************************************************

if (isset($_GET['delet_patient'])) {
	  $p_id = $_GET['delet_patient'];
	  mysqli_query($db, "DELETE FROM patient WHERE p_id ='$p_id'"); 
	  
	  $_SESSION['message'] = "Address deleted!";
	  header('location: receptionist_home.php');

	}

//View Patients and Print Details....................................................................

  if (isset($_GET['view_patient'])) {
    $p_id = $_GET['view_patient'];
    $record = mysqli_query($db, "SELECT * FROM patient WHERE p_id=$p_id");
  
      $n = mysqli_fetch_array($record);
      $fname=$n['fname'];
      $lname=$n['lname'];
      $age=$n['age'];
      $birth_date=$n['birth_date'];
      $id_number=$n['id_number'];
      $address_line1=$n['address_line1'];
      $address_line2=$n['address_line2'];
      $contact_no=$n['contact_no'];
      $gender=$n['gender'];
      $civil_status=$n['civil_status'];
      $w_id=$n['w_id'];
      $bed_number=$n['bed_number'];
      $staff_id=$n['staff_id'];
      $time=$n['time'];
      $date=$n['date'];
      $p_id=$n['p_id'];
     


      
    
  }
























?>