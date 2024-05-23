
text/x-generic 2022-elastic-global-threat-report-insert.php ( PHP script text )
<?php
$servername = "localhost";
$username = "rahulpachori";
$password = "Indian@12345";
$dbname = "prospect_database";


// $url= $_SERVER['REQUEST_URI'];
$url = $_POST['url'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phonenumber = $_POST['mobile'];
$companyname = $_POST['company'];
$jobtitle = $_POST['jobtitle'];
$country = $_POST['country'];
$state = $_POST['state'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (first_name, last_name, email,phone_number,  company_name, job_title, country, state, url)
VALUES ('$first_name', '$last_name', '$email', '$phonenumber', '$companyname', '$jobtitle', '$country', '$state', '$url')";

if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // header( "refresh:0;url=https://arkentechpublishing.com/Dive/AssetManagementintheUtilitiesIndustry_1.pdf" );


  // Get the redirect url from the query string
  if (isset($_GET['redirect'])) {
    $redirect = $_GET['redirect'];
  } else {
    $redirect = 'index.php'; // Default redirect URL
  }

  // Redirect the user to the specified URL

  header("Location: $redirect");
  exit;



} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>