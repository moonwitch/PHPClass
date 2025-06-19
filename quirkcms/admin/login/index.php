<?php

// Autoload classes
spl_autoload_register(function ($class_name) {
    require "../classes/class." . $class_name . ".php";
});

// Start session
session_start();

// Is the form submitted?
if (
	isset($_POST['submitKnopLogin']) &&
	isset($_POST['email']) &&  !empty($_POST['email']) &&
	isset($_POST['ww']) && !empty($_POST['ww'])
) {
	$email = strtolower(trim($_POST['email']));
	$ww = trim($_POST['ww']);

	$accDB = new accountDB();
	$account = $accDB->findLogin($email, $ww);
	/* if account is found -> user exists redirect to page */
	if ($account) {
		$_SESSION['user'] = $account;

		header('Location: ../');
		die("Already logged in");
	} else {
		$_SESSION['msg'] = "Foutieve login";
	}
}

// HTML header\
require_once "../inc/header.php";
?>


<body class="text-center">
	<div class="container">
		<div class="header">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="../">QuirkCMS</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">

						</li>
					</ul>
				</div>
			</nav>
		</div>

		<div class='row'>
			<div class="col-md-12">
				<?php
				if (isset($_SESSION['cms_feedback'])) {
					echo "<div class='alert alert-danger alert-dismissible' role='alert'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
" . $_SESSION['msg'] . "
</div>";
					unset($_SESSION['cms_feedback']);
				}
				?>
			</div>
		</div>

		<div class='row'>
			<form class="banner form-horizontal mx-auto col-md-4" method="post" action="" style='background-color: #d9e5f1;padding: 50px;margin-top: 50px;margin-bottom: 50px;'>
				<span class='h3 mb-3'>QuirkCMS</span>
				<div class="form-group">
					<div class="col-sm-12">
						<div class="input-group">
							<input type="text" class="form-control" name="email" placeholder="je mail adres" required autofocus />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div class="input-group">
							<input type="password" class="form-control" name="ww" placeholder="je wachtwoord" required />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="w-100 btn btn-lg btn-primary btnCMS" name="submitKnopLogin">Log in</button>
					</div>
				</div>
			</form>
		</div>

		<footer class="footer">
			<p>© CVO-Volt Leuven <?= date('Y') ?></p>
		</footer>

	</div>
</body>

<!-- JQUERY AND POPPER -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- END JQUERY AND POPPER -->

</html>