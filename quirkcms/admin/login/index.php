<?php
require_once('../classes/class.accountDB.php');

session_start();

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

?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- GOOGLE FONTS-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Smythe&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="cleartype" content="on">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

</head>

<body>
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
				if (isset($_SESSION['msg'])) {
					echo "<div class='alert alert-danger alert-dismissible' role='alert'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
" . $_SESSION['msg'] . "
</div>";
					unset($_SESSION['msg']);
				}
				?>
			</div>
		</div>

		<div class='row'>
			<form class="banner form-horizontal mx-auto col-md-4" method="post" action="" style='background-color: #d9e5f1;padding: 50px;margin-top: 50px;margin-bottom: 50px;'>
				<div class='titel'>QuirkCMS</div>
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
						<button type="submit" class="btn btn-lg btn-block btnCMS" name="submitKnopLogin">Log in</button>
					</div>
				</div>
			</form>
		</div>

		<footer class="footer">
			<p>© CVO-Volt Leuven <?= date('Y') ?></p>
		</footer>

	</div> <!-- /container -->
</body>

<!-- BOOTSTRAP -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- END BOOTSTRAP -->

</html>