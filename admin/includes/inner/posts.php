<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Post</h4>
				</div>
				<div class="panel-body">
				<?php 
					if(count_posts() < 1){
						echo "<div class='alert alert-danger'><strong>No Post available Yet!</strong></div>";
					}else{
						$result_per_page = 10;
						$qq = mysqli_num_rows(mysqli_query($con,"select * from posts order by post_id desc limit 10 "));
						$number_of_pages = ceil($qq/10);
						if(!isset($_GET['page'])){
							$page = 1;
						}else{
							$page = $_GET['page'];
						}
						$start = ($page-1)*$result_per_page;
						// real query
						$query = "select * from posts order by post_id desc limit 10 ";
						$run_pro = $con->query($query);
				?>
				<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Post title</th>
							<th>Post author</th>
							<th>Post content</th>
							<th>Post date</th>
							<th>commands</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while($row = $run_pro->fetch_assoc()){
							$desc = $row['post_content'];
					?>
					<tr>
							<td><strong><?php echo ucfirst($row['post_title']); ?></strong></td>
							<td><?php echo ucfirst($row['post_author']); ?></td>
							<td><?php echo ucfirst(strip_tags(substr($desc,0,100)."...")); ?></td>
							<td><?php echo ucfirst($row['post_date']); ?></td>
							<td><?php if($row['post_action'] == 1){ echo "<a href='?pid=".$row['post_id']."' class='btn btn-danger btn-xs'>Disable <span class='glyphicon glyphicon-ban-circle'></span></a>"; } else{echo "<a href='?did=".$row['post_id']."' class='btn btn-info btn-xs'>Enable <span class='glyphicon glyphicon-ok-circle'></span></a>";}?></td>
							<td><a href='editpost.php?pid=<?php echo $row['post_id']; ?>' class="btn btn-info btn-xs"><span class='glyphicon glyphicon-edit'></span></a></td>
							<td><a href='#' class="btn btn-danger btn-xs"><span class='glyphicon glyphicon-trash'></span></a></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				</div>
				<?php
					}
				?>
				</div>
</div>