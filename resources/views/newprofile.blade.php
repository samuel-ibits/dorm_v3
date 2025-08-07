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
    
    <style>
        .bi-cash-stack {
            color: inherit;
        }

        @media only screen and (max-width: 600px) {
                          
div#photos-preview img {
    width: 20%;
}
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
        <ul class="flex gap-3 margin--1">
          <li><i class="bi bi-gear-fill" id="menu-icon"></i></li>
          <li><i class="bi bi-box-arrow-left"></i></li>
        </ul>
        <div class="dropdown" id="dropdown">
          <ul>
            <li>
                <a href="./newmarketdashboard.php?t=<?php echo$t; ?>"
                  ><i class="bi bi-speedometer"></i> Dashboard</a
                >
              </li>
            <li>
              <a href="./newmarketsetting.php?t=<?php echo$t; ?>"
                ><i class="bi bi-gear-fill"></i> Setting</a
              >
            </li>
            <li>
              <a href=""><i class="bi bi-box-arrow-left"></i> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <div id="myComplexModal" class="profile-modal">
      <div class="back-from-inspect">
        <button
          id="hide-inspect"
          class="btn-no-btn"
          onclick="closeModal('myComplexModal')"
        >
          <i class="bi bi-chevron-left"></i>
        </button>
      </div>
      <p class="heading">Sell an item</p>

      
          
          <form action="newmarketdashboard.php?t=<?php echo $t; ?>" method="post"  enctype="multipart/form-data">
                    
                         
                        <div class="add-image">
                           
                        
                            <input type="file" name="file[]"  id="gallery-photo-add" multiple required>
                        </div>


                        <div class="preview-holder" id='photos-preview'></div>
                            
                        

                            
                     
        <div class="input-component-one">
          <p>Name of product</p>
           <input type="text" name="name" placeholder="Name of product" maxlength="25" required>
                           
        </div>
        <div class="input-component-one">
          <p>Price of Products</p>
           <input type="number" name="price" placeholder="Price of product(N)" required>
                           
        </div>
        <div class="input-component-one">
          <p>Units available</p>
          <input type="number" name="unit" placeholder="Number of available units" required>
                            
        </div>
        <div class="input-component-one">
          <p>Product description (optional)</p>
          <textarea name="about" placeholder="About product (optional)" id="" cols="20"
                                rows="2"></textarea>
                                
        </div>
        <div class="input-component-one">
          <p>Location</p>
          <select name="location" id="" required>
                                    <option value="Adankolo Campus">Adankolo Campus</option>
                                    <option value="Felele Campus">Felele Campus</option>
                                    
                                </select>
          <input type="text"  placeholder="Location" required>
        </div>
        <div class="input-component-one">
          <select name="category" id="" required>
                                    <option value="Clothing">Clothing</option>
                                    <option value="Food Stuffs">Food Stuffs</option>
                                    <option value="Technology accesories">Technology accesories</option>
                                    <option value="Services">Services</option>
                                </select>
        </div>

        <button class="orange-bg big-btn" name="upload">
          <i class="bi bi-cloud-arrow-up-fill"></i>
          Upload product
        </button>
      </form>
    </div>
    <div class="profile-body">
      <div class="profile-section-one">
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
  
  
  
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
  
   $pocketid=$row["pocketid"];
  
  

    
$pctid=$pocketid.'dl';
$in = "INSERT INTO wallet VALUES ('$pctid', '', '', '', '0', '$userid')";


if ($conn22->query($in) === TRUE) {
  
}else{}
  
}}       
      
        
    
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
      if ($balance==null){$balance=0;}

  
  echo'<img src="https://www.dorm.com.ng/'.$ppic.'" alt="" />
        <ul>
          <li>'.$name.'</li>
          <li>'.$userschool.'</li>
          <li>'.$year.'</li>
        </ul>
      </div>
      <div class="component-type-one orange-bg">
        <ul>
          <li>Wallet   <i class="bi bi-eye-fill" style ="color:#fff"></i></li>
          <li>N <span>'.$balance.'</span></li>
        </ul>
';


  

        
    
     
         ?>
        
        
        <a href="./wallet.php?t=<?php echo$t; ?>"> <i class="bi bi-chevron-right" style ="color:#fff"></i></a>
      </div>
      <div class="profile-section-two">
        <ul>
          <li>
            <img src="./images/Vector (4).png" alt="" class="small-icon" />

            <span id="shareinvite">
            Invite Friend</span>
          </li>
          <a href="./feedback.php?t=<?php echo$t; ?>" style="text-decoration:none; color:black;"
                  ><li>
            <img src="./images/Vector (5).png" alt="" class="small-icon" />

            <span>Feedback</span>
          </li></a>
         <a href="./newmarketdashboard.php?t=<?php echo$t; ?>" style="text-decoration:none; color:black;"
                  > <li>
            <img src="./images/Vector (6).png" alt="" class="small-icon" />

            <span>Dashboard</span>
          </li></a>
        </ul>
      </div>

      <div
        class="component-type-one black-bg"
        onclick="toggleModal('myComplexModal')"
      >
        <div class="flex gap-1 big-font">
          <i class="bi bi-shop"></i>
          <p>Sell an item</p>
        </div>

        <i class="bi bi-chevron-right"></i>
      </div>
      <div class="container">
        <div class="text-container">
          <div class="text active" onclick="toggleScroller('orders')">
            My Orders
          </div>
          <div class="text" onclick="toggleScroller('products')">
            My Products
          </div>
        </div>
        <div class="scroller active" id="ordersScroller">
        <?php                         
                                        
   $selr="SELECT * FROM orders where userid='".$userid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){        
                 echo'  
        
          <div class="product-card">
            <img
              src="'.$row['productpic'].'"
              alt="'.$row['productname'].'"
              class="product-image"
            />
            <div class="product-details">
              <p>'.$row['productname'].'</p>
              <p class="eta">ETA: <span>'.$row['date'].' </span></p>
              <h3>N<span>'.$row['price'].'</span></h3>
            </div>
          </div>
                    
                    ';
                    
                    }}else{echo 'There is no pending Orders<br>';}
                    ?>

       </div> 
        
        
        
        <div class="scroller" id="productsScroller">
         
         <?php include'connect.php';                          
                                        
   $selr="SELECT * FROM products where userid='".$userid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
   echo'
          <div class="product-card">
            <img
              src="'.$row["pic1"].'"
              alt="'.$row["name"].'"
              class="product-image"
            />
            <div class="product-details">
              <p>'.$row["name"].'</p>
              <h3>N'.$row["price"].'</h3>
            </div>
          </div>
      
      ';
                    
                    }}else{echo'no Products found';}
                    ?>
              </div>
      </div>
    </div>
    
    
    <div class="bottom-tab-bar-holder">
      <ul>
        <li>
          <a href="./marketgrid.php?t=<?php echo$t; ?>">
            <i class="bi bi-house-door-fill"></i>
            <p>Home</p>
          </a>
        </li>
        <li>
          <a href="newprofile.php?t=<?php echo$t; ?>" class="active-menu">
            <i class="bi bi-person-fill"></i>
            <p>Account</p>
          </a>
        </li>
      </ul>
    </div>

    <script src="js/newmarket.js"></script>
<script>
const shareproduct = document.querySelector("#shareinvite");


        shareproduct.addEventListener('click', event => {
            if (navigator.share) {
                navigator.share({
                     title: "Market from dorm",
                     text: "Hey I use Market app to sell and buy easily in school, I am personally inviting you to get this app at www.dorm.com.ng Or Check it out @ ",
                     url: ' https://dorm.com.ng/market'
                    }).then(() => {
                        console.log('thanks for sharing!');
                    })
                    .catch((err) => console.error(err));
            } else {
                alert("unsupported by browser please share link manully")
            }
        });
    </script>
    <script>
      function toggleScroller(scrollerId) {
        var ordersScroller = document.getElementById("ordersScroller");
        var productsScroller = document.getElementById("productsScroller");
        var ordersText = document.querySelector(".text:nth-child(1)");
        var productsText = document.querySelector(".text:nth-child(2)");

        if (scrollerId === "orders") {
          ordersScroller.classList.add("active");
          productsScroller.classList.remove("active");
          ordersText.classList.add("active");
          productsText.classList.remove("active");
        } else if (scrollerId === "products") {
          ordersScroller.classList.remove("active");
          productsScroller.classList.add("active");
          ordersText.classList.remove("active");
          productsText.classList.add("active");
        }
      }

      function toggleModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display =
          modal.style.display === "block" ? "none" : "block";
      }

      function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "none";
      }
    </script>
    
 <script>
        $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.preview-holder');
    });
});

</script>   


  </body>
</html>
