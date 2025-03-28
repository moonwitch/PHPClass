<?php

session_start();

if (!isset($_SESSION['user'])) {
  header("Location: ./login/");
  die("Redirecting to login page");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>QuirkCMS Admin</title>
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- GOOGLE FONTS-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="./css/style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="cleartype" content="on">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
</head>

<body>
  <div class="container">
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./">QuirkCMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Hi [GEBRUIKERSNAAM]
              </a>
              <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                <a class='dropdown-item' href='./'>Dashboard</a>
                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='./manageAccounts/'>Manage Accounts</a>
                <a class='dropdown-item' href='./cms/'>Manage Content</a>
                <a class='dropdown-item' href='./manageFiles/'>Manage Files</a>
                <a class='dropdown-item' href='./explorer?reset'>File Explorer</a>
                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='./login/logoff.php'>Log off</a>
              </div>
            </li>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="jumbotron banner">
      <span>QuirkCMS</span>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class='cmsBlok'>
          <h4>Manage Accounts</h4>
          <p>

            #count Users : [AANTAL USERS]<br>
            #count Admins: [AANTAL ADMINS]<br><br>
            <a href='./manageAccounts/' class='btn btn-sm btnCMS'>Manage Accounts</a>
          </p>
        </div>
        <div class='cmsBlok'>
          <h4>Manage Files</h4>
          <p>
            #count Files: [AANTAL FILES]<br>
            #count Images: [AANTAL AFBEELDINGEN]<br>
            <br>
            <a href='./manageFiles/' class='btn btn-sm btnCMS'>Manage Files</a>
          </p>
        </div>

      </div>

      <div class="col-lg-6">
        <div class='cmsBlok'>
          <h4>Manage Content</h4>
          <p>
            Manage the content of the website. <br>
            Make changes to the editable blocks on your pages.<br>
            <br>
            <a href='./cms/' class='btn btn-sm btnCMS'>Manage Content</a>
          </p>
        </div>
        <div class='cmsBlok'>
          <h4>File Explorer</h4>
          <p>
            Navigate all your files online.<br>
            Full Access<br>
            <br>
            <a href='./explorer/?reset' class='btn btn-sm btnCMS'>File Explorer</a>
          </p>
        </div>
      </div>
    </div>

    <?php

    require_once("./inc/footer.php");

    ?>