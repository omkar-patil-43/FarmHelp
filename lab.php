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

<body style="background-color:gainsboro;">
  <?php include('includes/header.php'); ?>
  <!-- Navigation -->
  <br>

  <div class="container">

    <div class="row">
      <div class="col-sm-12" style="margin-left: 10px;">
        <h3 style="color: red;"><b>List of all farm labs</b></h3>
      </div>
    </div>
    
    <div class="d-flex">
      <div id="row-container" class="p-2 bg-white col-sm-12">
        <table id="data-table" style="color: black; border:2px solid black;" class="table table-fixed table-striped table-bordered table-hover table-sm">
          <thead>
            <tr>
              <th class="col-xs-3">Farm Lab Description</th>
              <th class="col-xs-3">Details</th>
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
                <td class="col-xs-3"> <a style="color: white;" href="data:image/pdf;charset=utf8;base64 ,<?php echo base64_encode($data['schemepdf']) ?>" download="<?php echo $data['filename']; ?>">Download</a></td>
              </tr>
            <?php }
            ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- Footer -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/tether/tether.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


</body>
<footer class="fixed-bottom"> <?php include('includes/footer.php'); ?></footer>

</html>