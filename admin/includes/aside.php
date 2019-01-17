<?php

?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Menu</h4>
				</div>
				
				<ul class="list-group">
					<li class="list-group-item"><a href="addpost.php">Add Post</a> <span class="badge pull-right">Posts <?php  echo count_posts(); ?></span></li>
					<li class="list-group-item"><a href="addsong.php">Add Musics</a> <span class="badge pull-right">Songs <?php  echo count_songs(); ?></span></li>
					<li class="list-group-item"><a href="addvideo.php">Add Videos</a> <span class="badge pull-right">Videos <?php  echo count_videos(); ?></span></li>
					<li class="list-group-item"><a href="#">Subscribers</a> <span class="badge pull-right"><?php  echo count_subscribers(); ?></span></li>
				</ul>
			
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>categories</h4>
				</div>
				
			<form method="POST">
			<div class="form-group">
			<label>Category</label>
				<input type="text" name="cat" placeholder="category" class="form-control"/>
			</div>	
			
			
				<div class="panel-footer">
					<button name="addcat" class="btn btn-xs btn-success" id="show">Add Category</button>
				</div>
		
			</div>
	</form>