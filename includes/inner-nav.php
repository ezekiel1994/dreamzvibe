 <div class="fst-navigation">
                            <nav class="navigation-1">
        						<ul>	
        							<li><a href="index.php">home</a></li>
									<li><a href="video-list.php">Video</a>	
									</li>
									<li class="menu-item "><a href="#">music</a>
										<ul class="sub-menu children">
										<?php $query = $con->query("select * from classess");
										while($row = $query->fetch_assoc()){
										?>
										
											<li>
												<a href="single-mp3.php?uid=<?php echo $row['class_id']; ?>"><?php echo $row['class']; ?></a>
											</li>
										<?php
										}
										?>
										</ul>
									</li>
									
									<li class="menu-item "><a href="blog.php">blog</a>
										
									</li>
									<li><a href="contact-us.php">contact us</a></li>
								</ul>
        					</nav>                           
                        </div>