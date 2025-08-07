
 <?php include'../../api/token.php';
$t=$_GET['t'];
if($t==''){ $t=$_COOKIE['dormtoken'];}
$userid=validatetoken($t);

if($userid=='null'){
 header('Location: https://dorm.com.ng/v2.5/app');
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
    <title>Pay</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/coursereview.css">
    <link rel="stylesheet" href="css/texter.css">

    <style>

    </style>
</head>

<body>


    <div class="top-mobile-menu">
        <div class="mobile-logo"><img src="images/dorm_no_bg.png" alt=""></div>

        <span class="noti-mobile">
            <ion-icon name="notifications"></ion-icon>
        </span>
    </div>

    <div class="page-container">
        <div class="menu">
            <div class="logo-img">
                <img class="logo-pc" src="images/dorm_logo_white.png" alt="">

                <span class="menu-toggler">
                    <ion-icon name="menu"></ion-icon>
                </span>
            </div>
            <ul class="menu-list">
                <a href="studytools.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/bag-img.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Study Tools</p>
                    </li>
                </a>
                <a href="coursereview.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/coursereview.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Course Review</p>
                    </li>
                </a>
                <a href="texter.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/text.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Texter</p>
                    </li>
                </a>
                <a href="accomodia.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/house.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Accomodia</p>
                    </li>
                </a>
                <a href="market.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/market.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Market</p>
                    </li>
                </a>
                <a href="setting.php?t=<?php echo$t; ?>">
                    <li class="active-nav  menu-item">
                        <div class="icon-img"><img src="images/setting.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Setting</p>
                    </li>
                </a>
            </ul>
                   <?php include'../connect.php';

$year=date("Y");
$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $name=$row["name"];
  $pic=$row["ppic"];
  $userschool=$row["school"];
  
  $usercourse=$row["course"];
  
  $username=$row["username"];
  $phone=$row["phone"];
    $email=$row["email"];
  
  
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
 
         echo'   <div class="user">
                <div class="user-img">
                    <img src="https://dorm.com.ng/'.$ppic.'" alt="'.$username.'">
                </div>
                <div class="user-info">
                    <p class="name">'.$name.'</p>
                    <p class="username">@'.$username.'</p>
                </div>
                <div class="icon-holder">
                    <i class="bi bi-three-dots"></i>
                </div>
            </div>
        </div>';
}}

    
if(isset($_POST['fund'])) {

$amount=$_POST['amount'];
$date=date("Y/m/d");
$time=date("h:i:sa");
$tranid="trav".rand(100000,999999);

    
$ale1 = "Procesing... ";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

$in = "INSERT INTO trasactions VALUES ('$tranid', '$pctid', '$accntnumb', '$accntname', '$bankname', 'onetime payment', 'credit', '$amount', '$date', '$time', 'processing')";

if ($conn22->query($in) === TRUE) {
  
    header("Location:https://dorm.com.ng/api/paystack.php?amount=".$amount."&email=".$email."&tranid=".$tranid."");

}else{echo "An error occured please try again <br>";
echo($conn22->error);
    
}
}

?>
        <div class="page-content">
            <div class="pay-page-holder">
                <p>Make one time payment of <span>N1000</span> to access your Dashboard</p>
              <form method="post" action=""> <input name="amount" value="1000" type="hidden" />  <button name="fund"><ion-icon name="card-outline"></ion-icon> PROCCED</button></form>
            </div>

        </div>
        <div class="page-side">
            <div class="search-2">
                <ion-icon name="search"></ion-icon> <input disabled type="text" placeholder="Search" name="" id="">
            </div>
            <div class="double-section">

                <div class="side-user-info">
                    <div class="userimage-info-side">
                        <div class="user-img-side">
                            <img src="<?php echo 'https://dorm.com.ng/'.$ppic; ?>" alt="">
                        </div>
                        <div class="user-info-side">
                            <p class="name-side"><?php echo $name; ?></p>
                            <p class="username-side">@<?php echo $username; ?></p>
                        </div>
                    </div>
                </div>



                <div class="text-icon add-review margin-top file-holder">

                    <input type="file" name="" id="">
                </div>

                <div class="bottom-notification-2">
                    <ion-icon name="notifications"></ion-icon>
                </div>

            </div>

        </div>
    </div>
    <script src="js/script.js"></script>
    <script>

  $(".add-contact-div").fadeOut('fast');
  $(".dark-bg-texter").fadeOut('fast');

$(".toggleaddcontact").click(function () {
  $(".add-contact-div").fadeToggle('fast');
  $(".dark-bg-texter").fadeToggle('fast');
});


    </script>
</body>

</html> 