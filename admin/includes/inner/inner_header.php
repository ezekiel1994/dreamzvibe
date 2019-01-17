<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Website Overview</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">
								<div class="well">
							<h2 class="text-center"><span class="glyphicon glyphicon-list"></span><?php  echo count_categories(); ?> </h2>
							<p class="text-center">  Category</p>
						</div>
						</div>
						<div class="col-md-2">
							<div class="well">
						<h2 class="text-center"><span class="glyphicon glyphicon-user"></span><?php  echo count_subscribers(); ?></h2>
							<p class="text-center"> Users</p>
						</div>
						</div>
						<div class="col-md-2">
								<div class="well">
						<h2 class="text-center"><span class="glyphicon glyphicon-edit"></span><?php  echo count_posts(); ?></h2>
							<p class="text-center"> Posts</p>
						</div>
						</div>
						<div class="col-md-3">
								<div class="well">
						<h2 class="text-center"><span class="glyphicon glyphicon-edit"></span><?php  echo count_songs(); ?></h2>
							<p class="text-center"> Musics</p>
						</div>
						</div>
						<div class="col-md-3">
								<div class="well">
						<h2 class="text-center"><span class="glyphicon glyphicon-edit"></span><?php  echo count_videos(); ?></h2>
							<p class="text-center"> Videos</p>
						</div>
						
						</div>
					</div>
				</div>
			</div>