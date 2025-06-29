<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>QuirkCMS Dashboard - Overview</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

	<link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Oswald&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../../css/style.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
		<div class="container"> <a class="navbar-brand" href="../"><img </a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto">
						<li class='nav-item dropdown'>
							<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								<i class="fas fa-user me-1"></i> Hi GEBRUIKERSNAAM </a>
							<ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
								<li><a class='dropdown-item' href='../'><i class="fas fa-tachometer-alt fa-fw me-2"></i>Dashboard</a></li>
								<li>
									<hr class='dropdown-divider'>
								</li>
								<li><a class='dropdown-item' href='../manageAccounts/'><i class="fas fa-users-cog fa-fw me-2"></i>Manage Accounts</a></li>
								<li><a class='dropdown-item' href='../cms/'><i class="fas fa-edit fa-fw me-2"></i>Manage Content</a></li>
								<li><a class='dropdown-item' href='../manageFiles/'><i class="fas fa-folder-open fa-fw me-2"></i>Manage Files</a></li>
								<li><a class='dropdown-item' href='../explorer?reset'><i class="fas fa-compass fa-fw me-2"></i>File Explorer</a></li>
								<li>
									<hr class='dropdown-divider'>
								</li>
								<li><a class='dropdown-item' href='../login/logoff.php'><i class="fas fa-sign-out-alt fa-fw me-2"></i>Log off</a></li>
							</ul>
						</li>
					</ul>
				</div>
		</div>
	</nav>

	<div class="container">
		<?php
		if (isset($_SESSION["cms_feedback"])) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
				htmlspecialchars($_SESSION["cms_feedback"]) .
				'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			unset($_SESSION["cms_feedback"]);
		}
		?>
	</div>

	<section class="p-4 p-md-5 mb-4 rounded-3 bg-body-tertiary banner">
		<div class="container py-4">
			<h1 class="display-5 fw-bold">QuirkCMS</h1>
			<p class="col-md-8 fs-5">A simple CMS for your website.</p>
		</div>
	</section>