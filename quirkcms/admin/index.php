<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login/");
    die("Redirecting to login page");
}

require_once "./inc/header.php";
?>

<main class="container py-4">
  <div class="row g-4">
    <div class="col-12 mb-3">
      <p class="lead">Welcome to the QuirkCMS dashboard. Manage your site content and settings.</p>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title h4"><i class="fas fa-users text-primary me-2"></i>Manage Accounts</h2>
          <p class="card-text mb-3">
            #count Users : [AANTAL USERS]<br>
            #count Admins: [AANTAL ADMINS]
          </p>
          <a href="./manageAccounts/" class="btn btn-primary btn-sm">Manage Accounts</a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title h4"><i class="fas fa-file-archive text-primary me-2"></i>Manage Files</h2>
          <p class="card-text mb-3">
              #count Files: [FILEOCUNT<br>
            #count Images: [AANTAL AFBEELDINGEN]
          </p>
          <a href="./manageFiles/" class="btn btn-primary btn-sm">Manage Files</a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title h4"><i class="fas fa-file-alt text-primary me-2"></i>Manage Content</h2>
          <p class="card-text mb-3">
            Manage the content of the website. <br>
            Make changes to the editable blocks on your pages.
          </p>
          <a href="./cms/" class="btn btn-primary btn-sm">Manage Content</a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title h4"><i class="fas fa-folder text-primary me-2"></i>File Explorer</h2>
          <p class="card-text mb-3">
            Navigate all your files online.<br>
            Full Access
          </p>
          <a href="./explorer/?reset" class="btn btn-primary btn-sm">File Explorer</a>
        </div>
      </div>
    </div>
  </div>
</main>


<?php require_once "./inc/footer.php"; ?>
