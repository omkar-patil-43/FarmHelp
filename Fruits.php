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

  
<?php include('includes/modal.php'); ?>

    <?php include('includes/header.php'); ?>
    <?php include('includes/config.php'); ?>
    <!-- Navigation -->


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register Your Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product-name" class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" id="product-name" name="product-name">
                        </div>
                        <div class="form-group">
                            <label for="product-description" class="col-form-label">Product Description</label>
                            <textarea class="form-control" id="product-description" name="product-description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-form-label">Product Image</label>

                            <div><input type="file" name="image"></div>

                        </div>
                        <div class="form-group">
                            <label for="date" class="col-form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Product Category</label>
                            <select class="form-control" id="product-category" name="product-category">
                                <option>Vegetable</option>
                                <option>Fruit</option>
                                <option>Grain</option>
                                <option>Pulse</option>
                                <option>Nut</option>
                                <option>Sugar and Starch</option>
                                <option>Spice</option>
                                <option>Oilseed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Available Stock (in Kg)</label>
                            <input type="text" class="form-control" id="stock" name="stock">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Select State</label>
                            <select class="form-control" id="state" name="state">
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Enter City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Contact Person Name</label>
                            <input type="text" class="form-control" id="person-name" name="person-name">
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact-number" name="contact-number">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">  <?php include('includes/categories.php'); ?></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $category = "Fruit";
            $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms");
            $records = mysqli_query($conn, "select * from products WHERE productcategory='$category'"); // fetch data from database




            while ($data = mysqli_fetch_array($records)) {
            ?>

                <div class="col-sm-12">
                    <div class="card" style="background-color:lightgray; border: 2px solid black;border-radius:13px;">
                        <div class="row">
                            <div class="col-md-2"> <img class="card-img" style="border-radius:20px; margin:15px; height: 150px; width:150px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?>" /></div>
                            <div class="col-md-8">
                                <div class="card-block" style="margin-left: 40px;">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text"><b> Product Name :</b> <?php echo $data['productname']; ?> </p>
                                            <p class="card-text"><b> Date :</b> <?php echo $data['date']; ?> </p>
                                            <p class="card-text"><b> Product Category :</b> <?php echo $data['productcategory']; ?> </p>
                                            <p class="card-text"><b> State :</b> <?php echo $data['state']; ?> </p>
                                            <p class="card-text"><b> Person Name :</b> <?php echo $data['personname']; ?> </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text"><b> Product Description :</b> <?php echo $data['productdescription']; ?> </p>
                                            <p class="card-text"><b> Available Stock :</b> <?php echo $data['stock']; ?>Kg </p>
                                            <p class="card-text"><b> City :</b> <?php echo $data['city']; ?> </p>
                                            <p class="card-text"><b> Contact Number :</b> <?php echo $data['contactnumber']; ?> </p>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                </div>

            <?php }
            ?>


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