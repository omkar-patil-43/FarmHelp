<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>News App</title>
</head>

<body>
<nav class="navbar navbar-dark bg-primary shadow">
        <div class="container-fluid justify-content-center">
          <a class="navbar-brand" href="#">
            <img src="images/icon.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
           <b> NewsRoom</b>
          </a>
        </div>
      </nav>
  <div class="container m-5">
    <div class="d-flex justify-content-center mb-3"><img src="images/icon.png" width="150px"></div>
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script>

    getnews();
    function getnews() {
      $(".posts").text("");

      keyword = $("#keyword").val();

      if (keyword == '') {
        keyword = "latest";
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


</body>

</html>