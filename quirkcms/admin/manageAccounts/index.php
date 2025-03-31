<?php

	require_once("../classes/class.accountDB.php");

	session_start();

	if(!isset($_SESSION['user'])) {
		header("Location: ../login/");
		die("Please log in first.");
	}

	if($_SESSION['user']->role == "admin") {
		$is_admin = true;
	} else {
		$is_admin = false;
	}

	// Get users
	$accDB = new accountDB();
	$allAccounts = $accDB->getAll();

	require_once("../inc/header.php"); 
?>


<div class='row'>
	<div class="col-md-12" style='margin-top: 25px;'>
		<h3>Gebruikers</h3>
		<?php
		if ($is_admin) echo "<a href='./new.php' class='btn btnCMS'>Add new account </a>"; 
		?>

		<table class="table table-bordered table-striped table-hover dataTable" style='font-size: small;'>
			<thead>
				<tr>
					<th style="width: 50px"></th>
					<th>Creation</th>
					<th>Id</th>
					<th>Firstname</th>
					<th>Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($allAccounts as $account) {
				?>
					<tr>						
						<td>
						<?php if ($is_admin) { ?>
							<a href='./edit.php?id=<?php echo $account->id; ?>' title='editeer'><i class='fa fa-pencil'></i></a>&nbsp;&nbsp;
							<a onclick='if(confirm("Ben je zeker dat dit echt wil verwijderen?")){return true;}else{return false;}' href='./delete.php?id=<?php echo $account->id; ?>' title='verwijder'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;
							<a href='./changepassword.php?id=<?php echo $account->id; ?>'><i class='fa fa-user-secret'></i></a>
						<?php } ?>
						</td>
						<td><?php echo $account->created; ?></td>
						<td><?php echo $account->id; ?></td>
						<td><?php echo $account->firstname; ?></td>
						<td><?php echo $account->name; ?></td>
						<td><?php echo $account->email; ?></td>
						<td><?php echo $account->role; ?></td>
						<td><span class='badge badge-success'><?php echo $account->status; ?></span></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>

	</div>
</div>

<?php require_once("../inc/footer.php"); ?>
