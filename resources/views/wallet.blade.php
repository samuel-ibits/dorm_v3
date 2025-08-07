
 <?php include'../../api/token.php';
$t=$_GET['t'];
if($t==''){ $t=$_COOKIE['dormtoken'];}
$userid=validatetoken($t);

if($userid=='null'){
  echo' <script>window.location.replace("https://dorm.com.ng/market/v1/auth/");</script>';

 header('Location: https://dorm.com.ng/market/v1/auth/');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#1597E2">
    <link rel="shortcut icon" href="images/dorm_icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/wallet.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/newmarket.css" />

    <style>
        .bi-cash-stack {
            color: inherit;
        }

        @media only screen and (max-width: 600px) {
            .page-content {
                width: 100%;
                height: auto;
                overflow-y: scroll;
                position: absolute;
                padding: 0rem 1rem;
            }
        }
    </style>
</head>

<body>

     <header>
      <div class="logo">
        <img src="images/maarkt logo.png" alt="App Logo" />
      </div>
      <div class="options">
        <i class="bi bi-bell-fill" id="menu-icon"></i>
        <div class="dropdown" id="dropdown">
          <ul>
            <li>
              <a href="./newmarketdashboard.php?t=<?php echo$t; ?>"
                ><i class="bi bi-speedometer"></i> Dashboard</a
             
            </li>
            <li>
              <a href="./newmarketsetting.php?t=<?php echo$t; ?>"
                ><i class="bi bi-gear-fill"></i> Setting</a
              >
            </li>
            <li>
              <a href="./auth/"><i class="bi bi-box-arrow-left"></i> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </header>
    
    
    <div class="page-container">
            <?php include'../connect.php';

$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $name=$row["name"];
  $pic=$row["ppic"];
  $userschool=$row["school"];
  
  $usercourse=$row["course"];
  
  $username=$row["username"];
  
  $email=$row["email"];
  
 $pocketid=$row["pocketid"];
  
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
 
         echo' ';

    
$pctid=$pocketid.'dl';
       
$in = "INSERT INTO wallet VALUES ('$pctid', '', '', '', '0', '$userid')";


if ($conn22->query($in) === TRUE) {
  
}else{}
        
        
    
$rselr="SELECT * FROM wallet WHERE id='".$pctid."'";
$result= $conn22->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    
  
   $pocketidd=$row["id"];
   $bankname=$row["bankname"];
   $accntname=$row["accntname"];
   $accntnumb=$row["accntnumb"];
   $balance=$row["balance"];
}}
      

if(isset($_POST['save'])) {

	$stmt =$conn22->prepare("Update wallet SET bankname=?, accntname=?, accntnumb=? WHERE id=?") ;
$stmt->bind_param("ssss", $bname, $aname, $anumb, $pctid);

$bname=$_POST['bname'];
$aname=$_POST['aname'];
$anumb=$_POST['anumb'];
if ( $stmt->execute()=== TRUE) {

    
$ale1 = "wallet update success";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{echo "An error occured please try again <br>";
echo($stmt->error);
    
}
} 

if(isset($_POST['withdraw'])) {


$rselr="SELECT * FROM wallet WHERE Id='".$pctid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $accntnumb=$row["accntnumb"];
  $accntname=$row["accntname"];
  $bankname=$row["bankname"];
  
  
}}

 if($accntnumb !=="" and $accntname !=="" and  $bankname !==""){
	$stmt =$conn22->prepare("Update wallet SET balance=? WHERE id=?") ;
$stmt->bind_param("is", $bal, $pctid);
$tranid="traw".mt_rand();
$amount=$_POST['balance'];

if($balance >= $amount){
$bal= $balance-$amount;
$date=date("Y/m/d");
$time=date("h:i:sa");
if ( $stmt->execute()=== TRUE) {

    
$ale1 = "Procesing...  you money is on its way ";
echo " <script type='text/javascript'>alert('$ale1'); </script>";



$in = "INSERT INTO trasactions VALUES ('$tranid', '$pctid', '$accntnumb', '$accntname', '$bankname', 'wallet', 'debit', '$amount', '$date', '$time', 'processing')";


if ($conn22->query($in) === TRUE) {
    //  header("Location:https://dorm.com.ng/api/paystacktransfer.php?amount=".$amount."&reason=wallet witdrawal&tranid=".$tranid."");

}
  
}else{echo "An error occured please try again <br>";
echo($stmt->error);
    
}
}else{echo'insufficient funds please fund your account';}

}else{    
$ale1 = "fill acounnt details and try again ";
echo " <script type='text/javascript'>alert('$ale1'); </script>";
}
} 
    
    
if(isset($_POST['fund'])) {

$amount=$_POST['amount'];
$date=date("Y/m/d");
$time=date("h:i:sa");
$tranid="traw".rand(100000,999999);

    
$ale1 = "Procesing... ";
echo " <script type='text/javascript'>alert('$ale1'); 
window.location.replace('https://dorm.com.ng/api/paystack.php?amount=$amount&email=$email&tranid=$tranid');</script>";

$in = "INSERT INTO trasactions VALUES ('$tranid', '$pctid', '$accntnumb', '$accntname', '$bankname', 'wallet', 'credit', '$amount', '$date', '$time', 'processing')";

if ($conn22->query($in) == TRUE) {
 echo' <script type="text/javascript"> alert("$ale1");
 window.location.replace("https://dorm.com.ng/api/paystack.php?amount="'.$amount.'"&email="'.$email.'"&tranid="'.$tranid.'"");</script>';

    // header("Location:https://dorm.com.ng/api/paystack.php?amount=".$amount."&email=".$email."&tranid=".$tranid."");

}else{echo "An error occured please try again <br>";
echo($conn22->error);
    
}
}
}}
      
     ?>
         


        <div class="page-content">
            <div class="wallet-page">
                <div class="firsttdiv">
                    <p class="greet-user">Hi, <span class="user-name"><?php echo $name; ?></span></p>
                </div>

                <div class="secondtdiv">
                    <span class="type-of-account"><i class="bi bi-wallet2"></i> wallet ID: <?php echo $pocketid; ?></span>
                    <h1 class="money-available">N<?php echo $balance; ?></h1>
                    <p class="sub-text">Available Balance</p>


                    <div class="button-holder">
                      
                       

                    </div>
                </div>
                <div class="billing-info" id="wform">
                    <h3><i class="bi bi-info-circle-fill"></i> Fund wallet</h3>
                    <form action="" method="post">
                        <div class="wallet-holder">
                            <p id="top-label-2" class="bold-blue">fund amount</p>
                            <div class="wrapper-input">
                                 <input type="number" name="amount" id="accountNumber-input"
                                    placeholder="2000" value="" required>
                            </div>
                            <span class="label-text" id="label-text-id-2"></span><span id="accountNumber"
                                class="info-billing-info-data"></span>

                        </div>
                       <button id="submitBtn" class="submit" name="fund"><i
                                class="bi bi-box-arrow-in-right"></i> Fund wallet</button>

                    </form>
         </div>         
<div class="billing-info" id="wform">
                    <h3><i class="bi bi-info-circle-fill"></i> Withdrawal form</h3>
                    <form action="" method="post">
                        <div class="wallet-holder">
                            <p id="top-label-2" class="bold-blue">withdrawal amount</p>
                            <div class="wrapper-input">
                                 <input type="number" name="balance" id="accountNumber-input"
                                    placeholder="2000" value="" required>
                            </div>
                            <span class="label-text" id="label-text-id-2"></span><span id="accountNumber"
                                class="info-billing-info-data"></span>

                        </div>
                       <button id="submitBtn" class="submit" name="withdraw"><i
                                class="bi bi-box-arrow-in-right"></i> withdraw</button>

                    </form>
         </div>           
                    
                <div class="billing-info">
                    <h3><i class="bi bi-info-circle-fill"></i> Account Info</h3>
                    <form action="" method="post">
                        <div class="wallet-holder">
                            <p id="top-label-2" class="bold-blue">withdrawal account number</p>
                            <div class="wrapper-input">
                                 <input type="text" id="accountNumber-input"
                                    placeholder="0030038452" name="anumb" value="<?php echo $accntnumb; ?>">
                            </div>
                           
                        </div>
                        <div class="wallet-holder">
                            <p id="top-label-2" class="bold-blue">withdrawal account name</p>
                            <div class="wrapper-input">
                                 <input type="text" id="accountNumber-input"
                                    placeholder="great umoru" name="aname" value="<?php echo $accntname; ?>">
                            </div>
                            
                        </div>
                        <div class="wallet-holder">
                            <p id="top-label-3" class="bold-blue">withdrawal bank name</p>
                            <div class="wrapper-input">
                                <input type="text" id="bankName-input"
                                    placeholder="Stambic IBTC" name="bname"value="<?php echo $bnkname; ?>">
                            </div>
                           
                        </div>

                        <button id="submitBtn" class="submit" name="save"><i
                                class="bi bi-box-arrow-in-right"></i> Save</button>

                    </form>
                </div>

                
            </div>
        </div>
        <div class="bottom-tab-bar-holder" >
      <ul>
        <li>
          <a href="./marketgrid.php?t=<?php echo$t; ?>" class="active-menu">
            <i class="bi bi-house-door-fill"></i>
            <p>Home</p>
          </a>
        </li>
        <li>
          <a href="./newprofile.php?t=<?php echo$t; ?>">
            <i class="bi bi-person-fill"></i>
            <p>Account</p>
          </a>
        </li>
      </ul>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/newmarket.js"></script>


    <script src="js/profile.js"></script>
</body>

</html>