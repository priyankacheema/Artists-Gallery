<?php
  $name = "Priyanka Cheema";
  $project = "Assignment 3";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="/Project3/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="/Project3/custom.js"></script>

  <!-- Bootstrap -->
  <link href="/Project3/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Project3/bootstrap-3.3.7-dist/css/style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-light" style="background-color: #000000;">
<!-- <nav class="navbar navbar-default">-->
      <a class="navbar-brand" href="Default.php"><?php echo $project?></a>
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="Default.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="supportedContentDropdown">
            <li class="dropdown-item" href="#"><a href="/Project3/Part01_ArtistsDataList.php">Artist Data List (Part 1)</a></li>
            <li class="dropdown-item" href="#"><a href="/Project3/Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
            <li class="dropdown-item" href="#"><a href="/Project3/Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
            <li class="dropdown-item" href="#"><a href="/Project3/Part04_Search.php">Advanced Search (Part 4)</a></li>
          </ul>
        </li>
      </ul>
      <form class="form-inline float-xs-right" action= "Part04_Search.php">
        <span class="padding-right-20" style="color:whitesmoke"><?php echo $name?></span>
        <input class="form-control" name="Title" type="text" placeholder="Search Paintings">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
</nav>
