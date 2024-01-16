<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FarmHelp</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bot1.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .navbar-toggler {
            z-index: 1;
        }

        @media (max-width: 576px) {
            nav>.container {
                width: 100%;
            }
        }

        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev {
            display: block;
        }
    </style>

</head>
 

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>
    <?php include('includes/slider.php'); ?>
    
    <!-- Page Content -->
    <br>
    <div class="container">

        <center>
            <h4 style="color: purple;"><b>&#9733; About us &#9733;</b>
            </h4>
        </center>
        <br>
        <!-- Marketing Icons Section -->
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header text-center bg-danger  text-white ">
                        <div><img src="fimg/crop.png" class="card-img"></div> <br><b>
                            <h4>Who we are</h4>
                        </b>
                    </h4>

                    <p class="card-text bg-info text-center" style="font-size: 13pt;padding:22px;">We are FarmHelp a leading website for the helping the farmers.We provide various information,daily news,daily wherather updates etc.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header text-center bg-danger  text-white ">
                        <div><img src="fimg/ic1.jpg" class="card-img"></div> <br><b>
                            <h4>FarmHelp is different</h4>
                        </b>
                    </h4>

                    <p class="card-text bg-info text-center" style="font-size: 13pt;padding:22px;">We are using machine learning and artificial intelligence technology for predicting right crops and right proposition of fertilizers for the farms.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header text-center bg-danger  text-white ">
                        <div><img src="fimg/crop.png" class="card-img"></div> <br><b>
                            <h4>Farm Labs information</h4>
                        </b>
                    </h4>

                    <p class="card-text bg-info text-center" style="font-size: 13pt;padding:22px;">We deliver various agriculture laboratory details and new government schemes information to the farmers.So the farmers get to know everything.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
    <hr style="border: 1px solid black;" id="crops">

    <div class="container" >
        <!-- Portfolio Section -->
        <center>
            <h4 style="color: purple;"><b>&#9733;Various Crops Details &#9733;</b></h4>
        </center>
        <br>
        <div class="row">
            <?php
            $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms");
            $records = mysqli_query($conn, "select * from addcrop"); // fetch data from database




            while ($data = mysqli_fetch_array($records)) {
            ?>

                <div class="col-lg-4 col-sm-5 portfolio-item">
                    <div class="card h-100" style="border: 2px solid black;border-radius:13px;">
                        <img class="card-img-top img-fluid" style="border-radius:13px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?>" />
                        <div class="card-block">
                            <h4 class="card-title"><a href="#"><?php echo $data['cropname']; ?></a></h4>
                            <p class="card-text"><b> Climate and Soil :</b> <?php echo $data['climateandsoil']; ?></p>
                        </div>
                        <form action="crop.php" method="post">
                            <input type="text" name="cname" value="<?php echo $data['cropname']; ?>" hidden>
                            <input type="submit" class="btn btn-primary" value="Read More.." name="submit" style="margin:10px;margin-top:-5px;">
                        </form>

                        </input>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>







    <hr style="border: 1px solid black;">
    <!-- /.row -->
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <center>
                <h4 style="color: purple;"><b>&#9733; Videos for farmers &#9733;<b>
                </h4>
            </center>
        </div>
    </div>
    <br>
    <!-- Features Section -->
    <div class="container-fluid">
       <div class="row justify-content-center">
       <?php
        $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms");
        $records = mysqli_query($conn, "select * from youtubevideos"); // fetch data from database
        while ($data = mysqli_fetch_array($records)) {
        ?>
            
                <div class="single-video col-sm-3">
                    <figure>
                        <iframe src="<?php echo $data['videourl'];?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </figure>
                </div>
                <?php }
        ?>
            </div>
       
    </div>
    <!-- /.row -->

    <hr>

    
    <!-- chat bot code from here-->




    <button class="open-button" onclick="openForm()"><i class='fas fa-comments' style='font-size:36px;color:white'></i></button>

    <div class="chat-popup" id="myForm">
        <div class="wrapper" style="margin-bottom:30px">
            <div class="title">FarmHelp Bot <button class="far fa-times-circle" onclick="closeForm()" style="margin-left:100px;margin-top:20px;font-size:36px;color:black;background:transparent;border:none"></button></div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Hello there, how can I help you?</p>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Type something here.." required>
                    <button id="send-btn">Send</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#send-btn").on("click", function() {
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function(result) {
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
    <!-- /.container -->

    <!-- Footer -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
<footer><?php include('includes/footer.php'); ?></footer>

</html>