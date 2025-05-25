<?php

// Autoload classes
spl_autoload_register(function ($class_name) {
    require "../classes/class." . $class_name . ".php";
});

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    die("Please log in first.");
}

// general feedback method :D
if (isset($_SESSION["cms_feedback"])) {
    echo '<div class="alert alert-success">' .
        htmlspecialchars($_SESSION["cms_feedback"]) .
        "</div>";
    unset($_SESSION["cms_feedback"]);
}

if ($_SESSION["user"]->role == "admin") {
    $is_admin = true;
} else {
    $is_admin = false;
}

// Get users
$accDB = new accountDB();
$allAccounts = $accDB->getAll();

require_once "../inc/header.php";
?>

<main class="container">
	<div class="row g-4">
		<h3>Manage users</h3>
		<div class="d-grid gap-2 py-4 d-md-flex justify-content-md-end">
    		<a href="../" class="btn btn-secondary" role="button">Back to Admin</a>
    		<?php if ($is_admin) {
          echo "<a href='./new.php' class='btn btn-primary' role='button'>Add new account </a>";
      } ?>
		</div>

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
				<?php foreach ($allAccounts as $account) { ?>
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
				<?php } ?>
			</tbody>
		</table>

	</div>
</main>

<!-- Config of Datatables -->
<script type="text/javascript">
  $(function() {
    if ($(".dataTable").length > 0) {
      $(".dataTable").DataTable({
        "pageLength": 25,
        "responsive": true,
        // "select": true, // Select extension JS/CSS would be needed for this
        "paging": true,
        // Layout for DataTables: B=Buttons, f=filtering input, r=processing display, t=table, i=information, p=pagination
        layout: { // Using the newer layout object for DT2.x
          topStart: 'pageLength',
          topEnd: 'search',
          bottomStart: 'info',
          bottomEnd: 'paging',
          topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
          }
        }
      });
    }
  });
</script>

<?php require_once "../inc/footer.php"; ?>
