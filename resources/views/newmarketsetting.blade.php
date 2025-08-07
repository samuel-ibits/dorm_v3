 <?php include'../../api/token.php';
$t=$_GET['t'];
if($t==''){ $t=$_COOKIE['dormtoken'];}
$userid=validatetoken($t);

if($userid=='null'){
 header('Location: https://dorm.com.ng/market/v1/auth/');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dorm-Market| A Place That Brings Us All Together</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <link rel="stylesheet" href="./css/newmarket.css" />
  </head>

  <body>

    <div id="professionalModal" class="professional-modal">
        <div class="professional-modal-content">
          <span class="professional-modal-close" onclick="closeModal('professionalModal')">&times;</span>
          <p class="orange-header">Name</p>
          <form class="professional-modal-form" method="post" action="" enctype="multipart/form-data">
          
            <input type="text" id="fullName" placeholder="full name" name="name" required>
            <input type="text" id="school" placeholder="school" name="school" required>
            <input type="text" id="year" placeholder="year" name="year" required>
            <input type="text" id="username" placeholder="user name" name="username" required>
            
            <button onclick="submitForm()" type="submit" name="submitForm">Submit</button>
          </form>
        </div>
      </div>
    <header class="dark-header">
      <div class="header-text" onclick="moveToAnotherPage()">
        <p><i class="bi bi-arrow-left"></i> Setting</p>
      </div>
    </header>

    <div class="setting-body">
      <div>
        <div class="setting-section-one">
            
             <?php include'../connect.php';

$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $name=$row["name"];
  $pic=$row["ppic"];
  $userschool=$row["school"];
  $year=$row["year"];
  $username=$row["username"];
  $email=$row["email"];
  
  
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
  
   $pocketid=$row["pocketid"];
  
  

    echo'
          <ul>
            <li>Photo</li>
            <li><img src="https://dorm.com.ng/'.$ppic.'" alt=""   onclick="openModal("professionalModal")"/></li>
          </ul>
          <ul>
            <li>Name</li>
            <li>'.$name.'</li>
          </ul>
          <ul>
            <li >Level</li>
            <li>'.$year.'</li>
          </ul>
          <ul>
            <li>Email</li>
            <li>'.$email.'</li>
          </ul>
          <ul>
            <li>School</li>
            <li>'.$userschool.'</li>
          </ul>
        </div>

        ';
          
          
$pctid=$pocketid.'dl';

if(isset($_POST['submitForm'])) {

	$stmt =$conn22->prepare("Update profile SET name=?, school=?, year=? WHERE username=?") ;
$stmt->bind_param("ssss", $name, $school, $year, $username);
 $name=$_POST["name"];
  
  $userschool=$_POST["school"];
  $year=$_POST["year"];
  $username=$_POST["username"];
  
$pic=$_POST["ppic"];
if ( $stmt->execute()=== TRUE) {

    
$ale1 = "wallet update success";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{echo "An error occured please try again <br>";
echo($stmt->error);
    
}
}

  
}}

?>
        
      </div>

      <button class="orange-bg big-btn"  onclick="openModal('professionalModal')">
        <i class="bi bi-cloud-arrow-up-fill"></i>
        Update Profile</button>
    </div>

    <script src="js/newmarket.js"></script>
    <script>
        function openModal(modalId) {
          var modal = document.getElementById(modalId);
          modal.style.display = "block";
        }
      
        function closeModal(modalId) {
          var modal = document.getElementById(modalId);
          modal.style.display = "none";
        }
      
        function submitForm() {
          var firstName = document.getElementById("firstName").value;
          var lastName = document.getElementById("lastName").value;
          // You can perform further actions with the collected data
          console.log("First Name:", firstName);
          console.log("Last Name:", lastName);
          closeModal('professionalModal');
        }

            
    function moveToAnotherPage() {
      window.location.href = "marketgrid.php?t=<?php echo$t; ?>"; // Replace with your desired URL
    }
      </script>
  </body>
</html>
