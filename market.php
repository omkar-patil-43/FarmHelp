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

    <title>Market Products</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .card-text {
            font-size: 12pt;
        }

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

<body style="background-color: cyan;">
    <?php include('includes/header.php'); ?>
    <?php include('includes/config.php'); ?>
    <br>
    <!-- Navigation -->
    <div class="container">
        <center>
            <h4 style="color: black;"><b> FarmHelp Market</b></h4>
        </center>
    </div>


    <?php include('includes/modal.php') ?>

    




    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12"> <?php include('includes/categories.php'); ?></div>
        </div>
    </div>
    <br>
    <!--New entries section from here-->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <div class="card" style="border: 2px solid black;">
                    <div class="card-header bg-info">
                        <span style="font-size: 19pt; font-weight:bold;">New Entries</span>
                    </div>
                    <div class="card-body" style="background-color: cyan;">

                        <div class="row" style="padding:10px;"">
                <?php
                $date = date('Y-m-d');
                $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms");
                $records = mysqli_query($conn, "select * from products WHERE date='$date'"); // fetch data from database




                while ($data = mysqli_fetch_array($records)) {
                ?>


                        <div class=" col-sm-3">
                            <div class="card" style="background-color:cyan; border: 3px solid black;border-radius:8px;">
                                <div class="row">
                                    <div class="photo-box col-md-3"> <img class="card-img" style="border:4px solid green; margin:15px; height: 75px; width:75px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?>" /></div>
                                    <div class="col-md-9">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="card-text"> <?php echo $data['productdescription']; ?> </p>
                                                    <p class="card-text"><b> Date :</b> <?php echo $data['date']; ?> </p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-12">
                                        <form action="product-detail.php" method="post">
                                            <input type="text" name="cname" value="<?php echo $data['contactnumber']; ?>" hidden>
                                            <input type="submit" class="btn btn-primary" value="Read More.." name="submit" style="margin:10px;margin-top:-5px;">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>

                    <?php }
                    ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


    <br>


    <!--Grains section from here-->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <div class="card" style="border: 2px solid black;">
                    <div class="card-header bg-info">
                        <span style="font-size: 19pt; font-weight:bold;">Grains</span>
                    </div>
                    <div class="card-body" style="background-color: cyan;">

                        <div class="row" style="padding:10px;"">
                <?php
                $category = "Grain";
                $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms");
                $records = mysqli_query($conn, "select * from products WHERE productcategory='$category'"); // fetch data from database




                while ($data = mysqli_fetch_array($records)) {
                ?>


                        <div class=" col-sm-3">
                            <div class="card" style="background-color:cyan; border: 3px solid black;border-radius:8px;">
                                <div class="row">
                                    <div class="photo-box col-md-3"> <img class="card-img" style="border:4px solid green; margin:15px; height: 75px; width:75px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?>" /></div>
                                    <div class="col-md-9">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="card-text"> <?php echo $data['productdescription']; ?> </p>
                                                    <p class="card-text"><b> Date :</b> <?php echo $data['date']; ?> </p>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-12">
                                        <form action="product-detail.php" method="post">
                                            <input type="text" name="cname" value="<?php echo $data['contactnumber']; ?>" hidden>
                                            <input type="submit" class="btn btn-primary" value="Read More.." name="submit" style="margin:10px;margin-top:-5px;">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>





                    <?php }
                    ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Footer -->

    <br><br>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
<?php include('includes/footer.php'); ?>


</html>