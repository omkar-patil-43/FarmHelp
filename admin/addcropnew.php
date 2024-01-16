<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {




    if (isset($_POST['submit'])) {
        $cropname = $_POST['cropname'];

        $climate = $_POST['climate'];

        $pre = $_POST['pre'];

        $seed = $_POST['seed'];

        $intercroping = $_POST['intercroping'];

        $nutrient = $_POST['nutrient'];

        $irrigation = $_POST['irrigation'];

        $weed = $_POST['weed'];

        $kid = $_POST['kid'];

        $disease = $_POST['disease'];

        $harvesting = $_POST['harvesting'];

        $youtube = $_POST['youtube'];

        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms") or die("error in connection");

        if (in_array($fileType, $allowTypes)) {

            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $sql = "INSERT INTO addcrop(cropname ,climateandsoil,precultivation,seedquantityandspacing,intercroping,nutrientmanagement,irrigationsystem,weedcontrol,kidcontrol,diseasecontrol,harvestingmeasures,youtube,image,filename) VALUES('$cropname','$climate','$pre','$seed','$intercroping','$nutrient','$irrigation','$weed','$kid','$disease','$harvesting','$youtube',' $imgContent','$fileName')" or die("error in query");
            $lastInsertId = mysqli_query($conn, $sql) or die("error in operation");

            if ($lastInsertId) {
                $msg = "Crop information saved successfully";
            } else {
                $error = "Something went wrong. Please try again";
            }
        } else {
            $error = "Something went wrong. Please try again";
        }
    }

?>
    <!doctype html>
    <html lang="en" class="no-js">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="theme-color" content="#3e454c">

        <title>BBDMS| Admin Add Crop Details</title>

        <!-- Font awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Sandstone Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap Datatables -->
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <!-- Bootstrap social button library -->
        <link rel="stylesheet" href="css/bootstrap-social.css">
        <!-- Bootstrap select -->
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <!-- Bootstrap file input -->
        <link rel="stylesheet" href="css/fileinput.min.css">
        <!-- Awesome Bootstrap checkbox -->
        <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
        <!-- Admin Stye -->
        <link rel="stylesheet" href="css/style.css">
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .succWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }
        </style>
        <script language="javascript">
            function isNumberKey(evt) {

                var charCode = (evt.which) ? evt.which : event.keyCode

                if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
                    return false;

                return true;
            }
        </script>
    </head>

    <body>
        <?php include('includes/header.php'); ?>
        <div class="ts-main-content">
            <?php include('includes/leftbar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">

                            <h2 class="page-title">Add Crop Information</h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Basic Info</div>
                                        <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                                        <div class="panel-body">
                                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Crop Name<span style="color:red">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="cropname" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Climate and soil</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="climate"></textarea>
                                                    </div>
                                                </div>

                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Pre cultivation</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="pre"></textarea>
                                                    </div>
                                                </div>

                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">seed quantity and spacing </label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="seed"></textarea>
                                                    </div>
                                                </div>

                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Intercroping</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="intercroping"></textarea>
                                                    </div>
                                                </div>





                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">nutrient management</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="nutrient"></textarea>
                                                    </div>
                                                </div>


                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">irrigation system</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="irrigation"></textarea>
                                                    </div>
                                                </div>

                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">weed control<span style="color:red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="weed" required> </textarea>
                                                    </div>
                                                </div>


                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">kid control<span style="color:red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="kid" required> </textarea>
                                                    </div>
                                                </div>


                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">disease control<span style="color:red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="disease" required> </textarea>
                                                    </div>
                                                </div>


                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">harvesting measures<span style="color:red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="harvesting" required> </textarea>
                                                    </div>
                                                </div>

                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Youtube video link<span style="color:red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="youtube" required> </textarea>
                                                    </div>
                                                </div>
                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Crop image <span style="color:red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <div class="col-sm-10">
                                                            <input type="file" name="image">
                                                        </div>
                                                    </div>
                                                </div>






                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <button class="btn btn-default" type="reset">Cancel</button>
                                                        <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>



                </div>
            </div>
        </div>

        <!-- Loading Scripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/fileinput.js"></script>
        <script src="js/chartData.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
<?php } ?>