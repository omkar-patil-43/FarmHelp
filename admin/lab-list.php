<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_REQUEST['del'])) {
        $did = intval($_GET['del']);
        $sql = "delete from addcrop WHERE cropname=did";
        $query = $dbh->prepare($sql);
        $query->bindParam(':did', $did, PDO::PARAM_STR);
        $query->execute();

        $msg = "Record deleted Successfully ";
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

        <title>BBDMS | FarmLab List </title>

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

    </head>

    <body>

        <!-- record deleting php code -->
        <?php

    $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms");
        if (isset($_POST["delete"])) {
            $dat = $_POST['nam'];
            $record1 = mysqli_query($conn, "Delete from lab where filename = '$dat'") or die("error");
            if ($record1) {
                $msg = "record deleted successfully";
            } else {
                $error = "error occured while deleting";
            }
        }
        ?>


        <?php include('includes/header.php'); ?>

        <div class="ts-main-content">
            <?php include('includes/leftbar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">

                            <h2 class="page-title">Farm-Lab List</h2>

                            <!-- Zero Configuration Table -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Labs Info</div>
                                <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                            </div>

                            <div class="container fw-light text-dark">
                                <br>
                                <div class="d-flex">
                                    <div id="row-container" class="p-2 bg-white col-sm-12">
                                        <table id="data-table" class="table table-fixed table-striped table-bordered table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th class="col-xs-3">Lab Name</th>
                                                    <th class="col-xs-3">File Name</th>
                                                    <th class="col-xs-3">Lab pdf</th>
                                                    <th class="col-xs-3">Delete record</th>



                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms");
                                                $records = mysqli_query($conn, "select * from lab"); // fetch data from database




                                                while ($data = mysqli_fetch_array($records)) {
                                                ?>
                                                    <tr>
                                                        <td class="col-xs-3"><?php echo $data['labname']; ?></td>
                                                        <td class="col-xs-3"><?php echo $data['filename']; ?></td>
                                                        <td class="col-xs-3"><a href="data:image/pdf;charset=utf8;base64 ,<?php echo base64_encode($data['labpdf']) ?>" download="<?php echo $data['filename']; ?>">Download<a></td>
                                                        <td>
                                                            <form method="post">
                                                                <input type=text value='<?php echo ($data['filename']) ?>' name="nam" hidden>
                                                                <input type="submit" name="delete" value="delete" class="hover-center-2">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>






        <script>
            $(document).ready(function() {
                $('#dtHorizontalVerticalExample').DataTable({
                    "scrollX": true,
                    "scrollY": 200,
                });
                $('.dataTables_length').addClass('bs-select');
            });
        </script>


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