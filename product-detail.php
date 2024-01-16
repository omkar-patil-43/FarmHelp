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
    

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .txt {
            font-size: 12pt;
        }

        .checked {
            color: orange;
        }
        .navbar-toggler {
            z-index: 1;
        }


        @media (max-width: 576px) {
            nav>.container {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <?php include('includes/config.php'); ?>
    
    <br>
    
    <?php
    $cname = $_POST['cname'];
    $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms");
    $records = mysqli_query($conn, "select * from products where contactnumber='$cname'") or die("error in query");
    while ($data = mysqli_fetch_array($records)) {
    ?>
        <div class="container-fluid">

    

            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="card">
                        <h5 class="card-header"><b>Product Details</b></h5>
                        <div class="card-body" style="padding: 10px;">
                            <div class="row">
                                <div class="card-img col-md-3"> <img style="border:4px solid gray; margin:15px; height: 250px; width:250px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?>" />

                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:7px;">
                                            <h4 class="card-title"><b><?php echo $data['productname']; ?></b></h4>
                                            <hr style="width:100%">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <hr style="width:100%">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-text">Posted by <i class="fas fa-user"></i> <?php echo $data['personname']; ?> on date:-<?php echo $data['date']; ?> (yy-mm-dd)</p>
                                            <hr style="width:100%">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-text">Description <i class="fas fa-book"></i> <?php echo $data['productdescription']; ?> </p>
                                            <hr style="width:100%">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fas fa-envelope"></i> Send a message</button>
                                            <hr style="width:100%">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <h5 class="card-header"><b>Details</b></h5>
                        <div class="card-body" style="padding: 10px;">
                            <div class="row">
                                <div class="col-md-4" style="margin-top:7px;">
                                    <p class="txt"><b>State Name:</b> <?php echo $data['state']; ?></p>
                                    <hr style="width:100%">
                                </div>
                                <div class="col-md-4" style="margin-top:7px;">
                                    <p class="txt"><b>Available Stock Weight (Kg): </b> <?php echo $data['stock']; ?> Kg</p>
                                    <hr style="width:100%">
                                </div>
                                <div class="col-md-4" style="margin-top:7px;">
                                    <p class="txt"><b>Contact Number:</b> <?php echo $data['contactnumber']; ?></p>
                                    <hr style="width:100%">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4" style="margin-top:7px;">
                                    <p class="txt"><b>City Name:</b> <?php echo $data['city']; ?></p>
                                    <hr style="width:100%">
                                </div>
                                <div class="col-md-4" style="margin-top:7px;">
                                    <p class="txt"><b>Contact Person: </b> <?php echo $data['personname']; ?></p>
                                    <hr style="width:100%">
                                </div>
                                <div class="col-md-4" style="margin-top:7px;">
                                    <p class="txt"><b>Email Address: </b> <?php echo $data['email']; ?></p>
                                    <hr style="width:100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

        </div>

<!--Working with modal for sending message -->
<?php include('sendingMail/sendMessage.php');?>

    <?php
    }
    ?>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if ( isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendingMail/sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        if (response.status == "success")
                            alert('Email Has Been Sent!');
                        else {
                            alert('Please Try Again!');
                            console.log(response);
                        }
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>


<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
<br>
<footer><?php include('includes/footer.php'); ?></footer>

</html>