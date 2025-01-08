<?php include ("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="/css/admission.css">
</head>
<body>

    <nav id="navbar">
        <div class="container1">
            <div class="row">
              <div class="col-md-12 text-center">
                <h3 class="animate-charcter"><a href="home.html">GPM</a> </h3>
              </div>
            </div>
          </div>

        <ul>
            <li class="item"><a href="home.html">HOME</a></li>
            <li class="item"><a href="about.html">ABOUT US</a></li>
            <li class="item"><a href="gallery.html">GALLERY</a></li>
            <li class="item"><a href="admission.html">ADMISSION</a></li>
            <li class="item"><a href="contact.html">CONTACT US</a></li>
            <!-- <li class="item"><a href="#"></a></li> -->
        </ul>
    </nav>



    <div class="container7">
      <div class="title5"> Register for Application form </div>

      <section id="section10">
        
      <form action="form1.php" method="post">
        <div class="user-details">

          <div class="input-box">
            <span class="details">Registration Date</span>
            <input type="date" name="myDate" id="myDate" required>
          </div>


          <div class="input-box">
            <span class="details">Name of Student</span>
            <input type="text" name="sname" id="sname" required>
          </div>

          <div class="input-box">
            <span class="details">Father's Name</span>
            <input type="text" name="fname" id="fname" required>
          </div>

          <div class="input-box">
            <span class="details">Mother's Name</span>
            <input type="text" name="mname" id="mname" required>
          </div>

          <div class="input-box">
            <span class="details">Email Address</span>
            <input type="email" name="email" id="email" required>
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phNum" id="phNum" required maxlength="10" pattern="[1-9]{1}[0-9]{9}">
          </div>

          <div class="input-box">
            <span class="details1">The branch you want to take admission</span>
            <select name="myClass" id="myClass">
              <option value="Branch" required>Branch</option>
              <option value="Electrical">ELECTRICAL</option>
              <option value="Computer science">COMPUTER SCIENCE</option>
              <option value="Mechnical">MECHNICAL</option>
              <option value="Electronic">ELECTRONIC</option>
             
            </select>
          </div>

          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="date" name="dob" id="dob" required>
          </div>

          <div class="input-box">
            <span class="details1">Your message (optional)</span>
            <textarea name="myText" id="myText" cols="30" rows="10" ></textarea>
          </div>

          <div>
            <input id="reset" type="reset" value="Reset">
            
          </div>
          
          <div>
            <input type="submit" id="submit" value="Submit" name="submit">
          </div>
        </div>
      </form>

      </section>
      <div id="status" class="success">Submit Successfully</div>
    </div>


    <section class="container8">
      <div id="aside3">
          
              <div class="container11">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h3 class="animate-charcter2"><a href="home.html">GPM</a> </h3>
                    </div>
                  </div>
                  <div id="address">
                      <h1>Ramankabad, Haweli Kharagpur,<p><H1>MUNGER, BIHAR</H1></p> <p><H1>(811213)</H1></p></h1>
                  </div>
              </div>
                
         
  
      </div>
  
      <div id="aside4">
          <nav>
              <h1><u>Quick Link</u></h1>
              <ul>
                  <li class="ref5" id="active"><a href="visionmission.html">Students Notice Board</a></li>
                  <li class="ref5"><a href="about.html">About Us</a></li>
                  <li class="ref5"><a href="admission.html">Admission Form</a></li>
                  <li class="ref5"><a href="faculty.html">Faculty</a></li>
                  <li class="ref5"><a href="gallery.html">Gallery</a></li>
              
              </ul>
      </nav>
      </div>
  
      <div id="aside5">
          <div id="address1">
              <p id="ad1">Contact Us</p>
              <p id="ad2">825283XXXX, 9431430XXX</p>
              <P id="ad3">SHANTI PRIYA</P>
          </div>
  
      </div>
  
  
  </section>
  
  
  
  
    <footer>
      <div class="center">
          Copyright &copy;2023 GOVERMENT POLYTECHNIC MUNGER, All right reserved. Design By SHANTI PRIYA
      </div>
  </footer>
    

    
</body>
</html>
  <?php

  if($_POST['submit'])

$myDate = $_POST['myDate'];
$sname = $_POST['sname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$email = $_POST['email'];
$phNum = $_POST['phNum'];
$myClass = $_POST['myClass'];
$dob = $_POST['dob'];
$myText = $_POST['myText'];

if (!empty($myDate) || !empty($sname) || !empty($fname) ||!empty($mname) || !empty($myEmail) ||!empty($phNum) ||!empty($myClass) || !empty($dob) ||!empty($myText)){
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword ="123";
	$dbName = "gpm form";

	//create connection

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
	if(mysqli_connect_error()){
		die('Connect Error(' . mysqli_connect_error().')'. mysqli_connect_error());
	}else{
		$Select = "SELECT * FROM `registration` WHERE 1";
		$INSERT = "INSERT Into registration values ('myDate', 'sname', 'fname',' mname', 'email',' phNum', 'myClass',' dob',' myText') values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

			if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssisss",$myDate, $sname, $fname, $mname, $email, $phNum, $myClass, $dob, $myText);

				if ($stmt->execute()) {
                    echo "Thanks for Registration. We will send you the mail regarding admission soon";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
	}

} else{
	echo "All field are required";
	die();
}
?>