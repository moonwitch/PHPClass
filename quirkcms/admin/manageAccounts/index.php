<?php
require_once("../inc/header.php");
?>

<div class='row'>
			<div class="col-md-12" style='margin-top: 25px;'>
				<h3>Gebruikers</h3>
				<a href='./new.php' class='btn btnCMS'>Add new account </a>
				
				
				<table class="table table-bordered table-striped table-hover dataTable" style='font-size: small;'>
                <thead>
                <tr>
                  <th style="width: 50px"></th>
                  <th>Creation</th>
                  <th>Id</th>
                  <th>Firstname</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Rol</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>

	
					
									<tr>
                  	<td>
	                  	<a href='./edit.php?id=".$account->id."' title='editeer'><i class='fa fa-pencil'></i></a>&nbsp;&nbsp;
	                    <a onclick='if(confirm("Ben je zeker dat dit echt wil verwijderen?")){return true;}else{return false;}' href='./delete.php?id=[accountid]' title='verwijder'><i class='fa fa-trash-o'></i></a>&nbsp;&nbsp;	                    
	                    <a href='./changepassword.php?id=[account->id]'><i class='fa fa-user-secret'></i></a>
	                  </td>
										<td>[created]</td>
										<td>[id]</td>
										<td>[firstname]</td>
										<td>[name]</td>
										<td>[email]</td>
										<td>[role]</td>							
										<td><span class='badge badge-success'>[status]</span></td>";
									</tr>
				</tbody>
              </table>
				
			</div>
		</div>

<?php

require_once("../inc/footer.php");

?>

