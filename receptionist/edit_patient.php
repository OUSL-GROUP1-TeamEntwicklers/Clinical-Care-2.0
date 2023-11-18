<!-- function of admin -->
<?php include('functions.php'); 

if (!isReceptionist()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

  $fname= '';
  $lname='';
  $birth_date='';
  $age='';
  $id_number='';
  $address_line1='';
  $address_line2='';
  $contact_no='';
  $gender='';
  $civil_status='';
  $staff_id='';
  $date = '';
  $time = '';
  $p_id = '';

if (isset($_GET['edit_patient'])) {
  $p_id = $_GET['edit_patient'];
  $edit = true;
  $rec = mysqli_query($db, "SELECT * FROM patient WHERE p_id=$p_id"); 

  $record = mysqli_fetch_array($rec);
  $fname = $record['fname'];
  $lname = $record['lname'];
  $birth_date = $record['birth_date'];
  $age = $record['age'];
  $id_number = $record['id_number'];
  $address_line1 = $record['address_line1'];
  $address_line2=$record['address_line2'];
  $contact_no = $record['contact_no'];
  $gender = $record['gender'];
  $civil_status = $record['civil_status'];
  $staff_id = $record['staff_id'];
  $date = $record['date'];
  $time = $record['time'];
  }


?>

<!DOCTYPE html>
<html>
<head>

  <title>Edit Patient</title>

  <link rel="stylesheet" type="text/css" href="/pis/css/receptionist/add_patient.css">
  <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
  <link rel="stylesheet" type="text/css" href="/pis/css/receptionist/form.css">
  <link rel="stylesheet" type="text/css" href="/pis/css/receptionist/button.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <?php include('link_css.php'); ?>
  <?php include('link_js.php'); ?>

</head>
<body>

  <nav>

      <label id="title">| Edit Patient</label>
        <ul>
          <li><a href="receptionist_home.php">HOME</a></li>
          <li><a class="active" href="add_patient.php">ADD PATIENT</a></li>
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
    </nav>

    <h1 id="head">Edit Patient</h1>

    <?php if (isset($_SESSION['message'])):?>
      <div class="msg">
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>  
      </div>
    <?php endif ?>

<div class="container">
  <form action="edit_patient.php" method="post">
     <table width="100%" border="0">

      <input type="hidden" name="p_id" id="p_id" value="<?php echo $p_id; ?>">

    <tr>
      <td width="22%" align="left" valign="middle"><label>First Name</label></td>
      <td colspan="3"><input name="fname" type="text" id="fname" required="Enter First Name" value="<?php echo $fname; ?>"></td>
    </tr>

    <tr>
      <td width="19%" align="left" valign="middle"><label>Last Name</label></td>
      <td colspan="3"><input type="text" name="lname" id="lname" required="Enter last Name" value="<?php echo $lname; ?>"></td>
    </tr>

    <tr>
      <td width="18%"><label>Birthday</label></td>
      <td ><input name="birth_date" type="date" id="birth_date" value="<?php echo $birth_date; ?>"></td>

      <td align="left" valign="middle"><label>Age</label></td>
      <td width="32%"><input name="age" type="number" id="age" value="<?php echo $age; ?>"></td>
    </tr>

    <tr>
      <td align="left" valign="middle"><label>ID Card Number</label></td>
      <td colspan="3"><input type="text" name="id_number" id="id_number" required="Enter Id Card Number" value="<?php echo $id_number; ?>"></td>
    </tr>

    <tr>
      <td align="left" valign="top"><label>Address</label></td>
      <td colspan="3">
      <p>
        <input type="text" name="address_line1" id="address_line1" required="Enter Address Line 1" value="<?php echo $address_line1; ?>">
      </p>
      <p>
        <label></label>
        <input type="text" name="address_line2" id="address_line2" required="Enter Address Line 2" value="<?php echo $address_line2; ?>">
      </p>
    </td>
    </tr>

    <tr>
      <td align="left" valign="middle"><label>Phone Number</label></td>
      <td colspan="3">
        <input type="text" name="contact_no" id="contact_no" pattern="[0-9]{10}" title="Enter Correct Mobile Number" required="Enter Phone Number" value="<?php echo $contact_no; ?>">
    </tr>

    <tr>
      <td width="18%"><label>Gender</label></td>
      <td >
        <select name="gender" id="gender">
          <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </td>

      <td width="18%"><label>Civil Status</label></td>
      <td >
        <select name="civil_status" id="civil_status">
          <option value="<?php echo $civil_status; ?>"><?php echo $civil_status; ?></option>
          <option value="Married">Married</option>
          <option value="Unmarried">Unmarried</option>
        </select>
      </td>
    </tr>

    <tr>
      <td align="left" valign="middle"><label>Time</label></td>
      <td width="32%"><input name="time" type="text" id="time" readonly value=" <?php
        date_default_timezone_set("Asia/Colombo");
        echo date("h:i");
        ?>" />
      </td>

      <td width="18%"><label>Date</label></td>
      <td width="31%"><input name="date" type="text" id="date" readonly value="<?php echo( date("Y/m/d")) ?>" /></td>
    </tr>

    <tr>
      <td align="left" valign="middle"><label>Staff ID</label></td>
      <td colspan="3"><input name="staff_id" type="text" id="staff_id" readonly value="<?php echo $staff_id; ?>"></td>
    </tr>

    <tr>
      <td align="left" valign="middle">&nbsp;</td>
      <td colspan="3"><button type="submit" class="button submit" name="update_patient">Update</button></td>
    </tr>
  </table>
  </form>
</div>

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