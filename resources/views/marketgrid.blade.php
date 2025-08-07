<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#1597E2">
    <link rel="shortcut icon" href="../../images/dorm_icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dorm-Market| A Place That Brings Us All Together</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/specialmenucorrection.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/menucss.css">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="css/marketgridview.css">
    <script src="sweetalert2.all.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/newmarket.css" />

    <style>
        .shoping-card-image {
            width: 100%;
            height: 10rem;
        }

        .spec-div input {
            width: 4rem;
            margin: 0px 1rem;
            outline: none;
            border: none;
        }

        .request {
            display: none;
        }

        @media only screen and (min-width: 601px) {

            .open-request {
                float: right;
            }


            .page-content {
                height: 100vh;
                overflow: scroll;
                top: 0
            }



        }

        .add-product-div {
            width: auto;
            padding: .3rem;
            transform: scale(.9);
            background: #0688d3;
            position: fixed;
            bottom: 5rem;
            right: 1rem;
            color: #fff;
            border-radius: 5px;
        }


        @media only screen and (max-width: 600px) {
            .inspect-market-item {
                width: 100%;
                height: auto;
                overflow: scroll;
                margin-top: 1rem;
                position: relative;
                background: var(--white);
                display: none;
                z-index: 999;
            }

            .request {
                display: none;
            }
        }
    </style>
    <script>
        function backk() {
            document.getElementById("inspect").style.display = "none";

            document.getElementById("contentgridd").style.display = "grid";

        }
    </script>
    <script>
        function iinspect(can) {
            document.getElementById("inspect").style.display = "block";

            document.getElementById("contentgridd").style.display = "none";
            var ussr = document.getElementById("ussr").value;
            var ndel = can.id;
            var xhttps = new XMLHttpRequest();
            xhttps.onreadystatechange = function() {
                if (xhttps.readyState == 4 && xhttps.status == 200) {
                    document.getElementById("inspect").innerHTML = xhttps.responseText;

                }
            };

            xhttps.open("GET", "minspect.php?a=" + ndel + "&u=" + ussr, true);
            xhttps.send();

        }
    </script>
    <script>
        function copy() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
        }
    </script>


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
                        <a href="./newmarketdashboard.php?t=<?php echo $t; ?>"><i class="bi bi-speedometer"></i>
                            Dashboard</a </li>
                    <li>
                        <a href="./newmarketsetting.php?t=<?php echo $t; ?>"><i class="bi bi-gear-fill"></i>
                            Setting</a>
                    </li>
                    <li>
                        <a href="./auth/"><i class="bi bi-box-arrow-left"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="request">
        <i class="bi bi-question-lg open-request"></i>
    </div>


    <div class="request-div-holder">

        <div class="request-div-inner-div">
            <div class="exit-big-screen">
                <i class="bi bi-x open-request"></i>
            </div>
            <p class="title-text">Prefered specs</p>


            <div class="spec-wrapper">
                <span class="spec-label">Product name</span>
                <div class="spec-div">
                    <input class="name" type="text" placeholder="Rolex wrist watch">
                </div>
            </div>
            <div class="spec-wrapper">
                <span class="spec-label">Price(naira)</span>
                <div class="spec-div">
                    <span class="input-label">From:</span> <input type="number" class=""> <span
                        class="input-label">To:</span><input type="number" class="">
                </div>
            </div>
            <div class="spec-wrapper">
                <span class="spec-label">Any special specification you may want to add</span>
                <div class="spec-div">
                    <textarea name="" placeholder="e.g some  thing shiny " id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="spec-wrapper">
                <button>Sumbit</button>
            </div>
        </div>
    </div>

    <div class="top-mobile-menu">
        <div class="mobile-logo"><img src="images/dorm_no_bg.png" alt=""></div>

        <span class="noti-mobile">
            <ion-icon name="notifications"></ion-icon>
        </span>
    </div>
    <div class="page-container">



        <?php include '../connect.php';

        $rselr = "SELECT * FROM profile WHERE Id='" . $userid . "'";
        $result = $conn6->query($rselr);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $pic = $row['ppic'];
                $userschool = $row['school'];

                $username = $row['username'];

                $ppic = $row['ppic'];
                if ($ppic == 'media/') {
                    $ppic = 'media/ppic/pro.png';
                } else {
                    $ppic = $row['ppic'];
                }
            }
        }

        ?>

        <div class="page-content">
            <div class="grid-view">

                <div class="upload-to-market">
                    <div class="embeder product-uploader">
                        <i class="bi bi-x-lg remove-market"></i>
                        <object data="marketupload.php?t=<?php echo $t; ?>" width="100%" height="auto"></object>
                    </div>
                </div>

                <div class="search-holder">
                    <div>
                        <form action="https://dorm.com.ng/market/v1/marketgrid.php?t=<?php echo $t; ?>"
                            method="GET">
                            <input type="text" placeholder="Search a product or service" name="search"
                                id="" />
                            <button name="searchs"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="suggestions">
                    <div class="suggestion-scroll">
                        <ul>
                            <li>Shoes</li>
                            <li>Wrist watches</li>
                            <li>Bed</li>
                            <li>Gas</li>
                            <li>Bucket</li>
                            <li>Fan</li>
                        </ul>
                    </div>
                </div>



                <div class="inspect-market-item">
                    <div id="inspect">

                    </div>
                </div>



                <div class="contentgrid" id="contentgridd">

                    <?php include '../connect.php';

                    if (isset($_GET['searchs'])) {
                        $search = $_GET['search'];
                        $t = $_GET['t'];
                        $date = date('Y-m-d h:i:sa');
                        $iiin = "INSERT INTO searchbar (id, userid, query, page, date) VALUES ( '', '$userid', '$search', 'Market', '$date')";
                        if ($conn18->query($iiin) == true) {
                        } else {
                            echo 'error';
                        }

                        $sql = 'SELECT * FROM products WHERE price LIKE ? or name LIKE ? or about LIKE ? or categories LIKE ? or location LIKE ? or productid LIKE ? or status Like ?';

                        if ($stmt = mysqli_prepare($conn20, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, 'sssssss', $param_term, $param_term, $param_term, $param_term, $param_term, $param_term, $param_term);

                            // Set parameters
                            $param_term = $_POST['search'] . '%';

                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                $result = mysqli_stmt_get_result($stmt);

                                // Check number of rows in the result set
                                if (mysqli_num_rows($result) > 0) {
                                    // Fetch result rows as an associative array
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        echo '   <div class="center-card" id="' .
                                            $row['productid'] .
                                            '" class="hus_but" onclick="iinspect(this)">
                                            <div class="shoping-card">
                                            <input type="text" id="ussr" value="' .
                                            $userid .
                                            '" style="display:none;" />
                                                <div class="shoping-card-image">
                                                    <img src="' .
                                            $row['pic1'] .
                                            '" alt="">
                                                </div>
                                                <div class="shoping-card-text">
                                                    <p class="name-of-item-shoping-card">
                                                        ' .
                                            $row['name'] .
                                            '
                                                    </p>
                                                    <p class="shoping-card-price">
                                                        NGN ' .
                                            $row['price'] .
                                            '
                                                    </p>
                                                    <p class="number-of-likes">
                                                        <i class="bi love-orange bi-heart-fill"></i> ' .
                                            $row['views'] .
                                            '
                                                    </p>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                } else {
                                    echo '<p>No matches found</p>';
                                }
                            } else {
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn20);
                            }
                        }

                        // Close statement
                        mysqli_stmt_close($stmt);
                        echo '<br>';
                    }

                    $selr = 'SELECT * FROM products';
                    $result = $conn20->query($selr);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '                <div class="center-card" id="' .
                                $row['productid'] .
                                '" class="hus_but" onclick="iinspect(this)">
                                            <div class="shoping-card">
                                            <input type="text" id="ussr" value="' .
                                $userid .
                                '" style="display:none;" />
                                                <div class="shoping-card-image">
                                                    <img src="' .
                                $row['pic1'] .
                                '" alt="">
                                                </div>
                                                <div class="shoping-card-text">
                                                    <p class="name-of-item-shoping-card">
                                                        ' .
                                $row['name'] .
                                '
                                                    </p>
                                                    <p class="shoping-card-price">
                                                        NGN ' .
                                $row['price'] .
                                '
                                                    </p>
                                                    <p class="number-of-likes">
                                                        <i class="bi love-orange bi-heart-fill"></i> ' .
                                $row['views'] .
                                '
                                                    </p>
                                                </div>
                                            </div>
                                        </div>';
                        }
                    } else {
                        echo 'no Products found';
                    }
                    ?>



                    <a href="#!" class="vanillatop"></a>
                </div>
            </div>
        </div>
        <div class="page-side">
            <div class="side-search">
                <div class="searchinputholder">
                    <ion-icon name="search"></ion-icon>
                    <form action="" method="post">
                        <input name="search" type="text" placeholder="Search for Product">
                </div>
                <button class="big-orange" name="searchs">SEARCH</button></form>
            </div>

            <div class="notification-holder">
                <ion-icon name="notifications"></ion-icon>
            </div>
        </div>
    </div>
    <div class="bottom-tab-bar-holder">
        <ul>
            <li>
                <a href="./marketgrid.php?t=<?php echo $t; ?>" class="active-menu">
                    <i class="bi bi-house-door-fill"></i>
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="./newprofile.php?t=<?php echo $t; ?>">
                    <i class="bi bi-person-fill"></i>
                    <p>Account</p>
                </a>
            </li>
        </ul>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/newmarket.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {});
        $(".exit-big-screen").click(function() {
            $(".request-div-holder").fadeOut('fast');
        });



        $(".request").click(function() {
            $(".request-div-holder").fadeToggle('fast');
        });


        $(".request-2").click(function() {
            $(".request-div-holder").fadeToggle('fast');
        });
        $('.paynow').click(function() {

            'success'
            Swal.fire({
                icon: 'success',
                title: 'Order Placed',
                text: 'Check manage product to see your Estimated time of arrival',
            })
        })

        $(".request-div-holder").fadeOut('fast');
        $(".request-div").fadeOut('fast');
        $(".request").ready(function() {
            $(".request-div-holder").fadeOut('fast');
        });

        $(".remove-market").click(function() {
            $(".upload-to-market").fadeOut('fast');
        });

        $(".add-product").click(function() {
            $(".upload-to-market").fadeIn('fast');
        });


        $(".shoping-card").click(function() {
            $(".inspect-market-item").fadeIn();
            // $(".shoping-card").fadeOut();
        });

        $(".back").click(function() {
            $(".inspect-market-item").fadeOut();
            $("#inspect").fadeOut();
            $(".shoping-card").fadeIn();
            // $(".contentgrid").fadeIn();
        });

        $(".searchbar-for-menu").click(function() {
            $(".most-searched-divv").fadeToggle();
        });


        $(".bi-bell-fill").click(function() {
            $(".notification").fadeToggle('fast');
        });

        $(".search-wrapper").click(function() {
            $(".most-searched-divv").fadeToggle();
        });

        function Search(item) {
            var collection = document.getElementsByClassName("shoping-card");
            for (i = 0; i < collection.length; i++) {
                if (((collection[i].innerHTML).toLowerCase()).indexOf(item) > -1) {
                    collection[i].style.display = "block";
                } else {
                    collection[i].style.display = "none";
                }
            }
        }


        const shareproduct = document.querySelector(".bi-share-fill");


        shareproduct.addEventListener('click', event => {
            if (navigator.share) {
                navigator.share({
                        text: "Product X from John Doe Store",
                        url: 'marketgrid.php?search=<?php echo $t; ?>'
                    }).then(() => {
                        console.log('thanks for sharing!');
                    })
                    .catch((err) => console.error(err));
            } else {
                alert("unsupported by browser please share link manully")
            }
        });
    </script>
</body>

</html>
