<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">
  <title>FarmHelp</title>
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

<?php include('includes/header.php'); ?>


  
  <div class="container m-8">
      <br>
       
 
    <div class="col-12 d-flex justify-content-center">
      <div class="input-group mb-3" style="width: 50%;transform: scale(1.3);">
        <input type="text" id="keyword" class="form-control shadow" placeholder="What you looking for ?"
          aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-danger shadow" type="button" id="button-addon2" onclick="getnews()">Search</button>
      </div>
    </div>

  </div>
  <div class="container">
    <div class="d-flex justify-content-center">
      <div class="spinner-border text-danger" id="load_ui" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="posts">

    </div>

  </div>



  



</body>
<?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>

getnews();
function getnews() {
  $(".posts").text("");

  keyword = $("#keyword").val();

  if (keyword == '') {
    keyword = "farmer";
  }

  var url = "https://newsapi.org/v2/everything?q=" + keyword + "&apiKey=8349720fe7734837b5b4ea4a3ca269af";

  $("#load_ui").show();

  $.get(url, (response) => {
    $("#load_ui").hide();

    console.log(response.articles[0]);
    for (i = 0; i < response.articles.length; i++) {

      var html = `<div class="card m-3 shadow">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="${response.articles[i].urlToImage}" class="img-fluid rounded-start" alt="">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">${response.articles[i].title}"</h5>
            <p class="card-text">${response.articles[i].content}</p>
            <p class="card-text"><small class="text-muted">${response.articles[i].publishedAt} | ${response.articles[i].author} | ${response.articles[i].source.name} -${response.articles[i].author}</small></p>
        <a href="${response.articles[i].url}" target="_blank" class="btn btn-secondary">Read More</a>
        <p></p>
          </div>
        </div>
      </div>
    </div>`;

      $(".posts").append(html);
    }
  });

}
</script>

</html>