<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Songs</h4>
				</div>
				<div class="panel-body">
				<?php 
					if(count_songs() < 1){
						echo "<div class='alert alert-danger'><strong>No song available Yet!</strong></div>";
					}else{
						//pagination starts
						$result_per_page = 10;
						$qq = mysqli_num_rows(mysqli_query($con,"select * from songs join categories on songs.song_category = categories.category_id where songs.song_action = 1 order by song_id desc limit 10 "));
						$number_of_pages = ceil($qq/10);
						if(!isset($_GET['page'])){
							$page = 1;
						}else{
							$page = $_GET['page'];
						}
						$start = ($page-1)*$result_per_page;
						// real query
						$query = "select * from songs join categories on songs.song_category = categories.category_id where songs.song_action = 1 order by song_id desc limit 10";
						$run_pro = $con->query($query);
				?>
				<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Title</th>
							<th>Artist</th>
							<th>Song category</th>
							<th>Song description</th>
							<th>Date created</th>
							<th>commands</th>
						</tr>
					</thead>
					<tbody>
					<?php
						while($row = $run_pro->fetch_assoc()){
							$desc = $row['song_description'];
					?>
						<tr>
							<td><?php echo ucfirst($row['song_title']); ?></td>
							<td><?php echo ucfirst($row['song_author']); ?></td>
							<td><?php echo ucfirst($row['category']); ?></td>
							<td><?php echo ucfirst(substr($desc,0,100)."..."); ?></td>
							<td><?php echo ucfirst($row['song_date']); ?></td>
							<td><a href='../download.php?url=<?php echo $row['song_url']; ?>' target="_blank" class="btn btn-info btn-xs"> <span class='glyphicon glyphicon-eye-open'></span> Preview</a></td>
							<td><a href='editsong.php?pid=<?php echo $row['song_id']; ?>' class="btn btn-info btn-xs"><span class='glyphicon glyphicon-edit'></span></a></td>
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
					$one = 1;
					echo "<ul class='pagination pagination-sm'>";
					//prev
					if($page != 1 && $page ){
						$prev = $page-$one;
						echo "<li><a href='?page=".$prev."'>prev</a></li>";
					}else{
						$prev = 1;
						echo "<li class='disabled' style='display:none;'><a href='?page=".$prev."'>prev</a></li>";
					}
					echo "<li class='active'><a href='?page=".$page."'>".$page."</a></li>";
					echo "<li class='disabled'><a href=''>....</a></li>";
					echo "<li><a href='?page=".$number_of_pages."'>".$number_of_pages."</a></li>";
					//next
					if($page != $number_of_pages){
						$next = $page+1;
						echo "<li><a href='?page=".$next."'>next</a></li>";
					}else{
						$next = $number_of_pages;
						echo "<li class='disabled' style='display:none;'><a href='?page=".$next."'>next</a></li>";
					}
					echo "</ul>";
				?>
				</div>
			</div>