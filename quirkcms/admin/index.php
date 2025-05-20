<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login/");
    die("Redirecting to login page");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QuirkCMS Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
  <div class="container-fluid">
    <header class="navbar navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand" href="./">QuirkCMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi [GEBRUIKERSNAAM]
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="./">Dashboard</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="./manageAccounts/">Manage Accounts</a></li>
                <li><a class="dropdown-item" href="./cms/">Manage Content</a></li>
                <li><a class="dropdown-item" href="./manageFiles/">Manage Files</a></li>
                <li><a class="dropdown-item" href="./explorer?reset">File Explorer</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="./login/logoff.php">Log off</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <main class="container py-4">
      <div class="row g-4">
          <p class="lead">Welcome to the QuirkCMS dashboard. Manage your site content and settings.</p>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title h4">Manage Accounts</h2>
              <p class="card-text">
                #count Users : [AANTAL USERS]<br>
                #count Admins: [AANTAL ADMINS]<br><br>
                <a href="./manageAccounts/" class="btn btn-primary btn-sm">Manage Accounts</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title h4">Manage Files</h2>
              <p class="card-text">
                #count Files: [AANTAL FILES]<br>
                #count Images: [AANTAL AFBEELDINGEN]<br><br>
                <a href="./manageFiles/" class="btn btn-primary btn-sm">Manage Files</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title h4">Manage Content</h2>
              <p class="card-text">
                Manage the content of the website. <br>
                Make changes to the editable blocks on your pages.<br><br>
                <a href="./cms/" class="btn btn-primary btn-sm">Manage Content</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title h4">File Explorer</h2>
              <p class="card-text">
                Navigate all your files online.<br>
                Full Access<br><br>
                <a href="./explorer/?reset" class="btn btn-primary btn-sm">File Explorer</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="footer mt-auto py-3 bg-light">
      <div class="container">
        <?php require_once "./inc/footer.php"; ?>
      </div>
    </footer>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>
