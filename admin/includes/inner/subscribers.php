<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Subscribers</h4>
				</div>
				<div class="panel-body">
				<?php 
					if(count_subscribers() < 1){
						echo "<div class='alert alert-danger'><strong>No subscriber available Yet!</strong></div>";
					}else{
				?>
				<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Date created</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tosin Ezekiel</td>
							<td>Tosinezkiel1@gmail.com</td>
							<td>Dec 20, 2018 22:09pm</td>
						</tr>
<tr>
							<td>Tosin Ezekiel</td>
							<td>Tosinezkiel1@gmail.com</td>
							<td>Dec 20, 2018 22:09pm</td>
						</tr>
<tr>
							<td>Tosin Ezekiel</td>
							<td>Tosinezkiel1@gmail.com</td>
							<td>Dec 20, 2018 22:09pm</td>
						</tr>
<tr>
							<td>Tosin Ezekiel</td>
							<td>Tosinezkiel1@gmail.com</td>
							<td>Dec 20, 2018 22:09pm</td>
						</tr>
<tr>
							<td>Tosin Ezekiel</td>
							<td>Tosinezkiel1@gmail.com</td>
							<td>Dec 20, 2018 22:09pm</td>
						</tr>
<tr>
							<td>Tosin Ezekiel</td>
							<td>Tosinezkiel1@gmail.com</td>
							<td>Dec 20, 2018 22:09pm</td>
						</tr>						
					</tbody>
				</table>
				</div>
				<?php
					}
				?>
				</div>
				<div class="panel-footer">
					<a href="" class="btn btn-xs btn-success">Export to CSV</a>
				</div>
			</div>