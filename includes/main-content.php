
				        
							<div class="widget widget-artist">
                                    <!--Heading Start-->
                                    <div class="msl-black">
	                                    <div class="msl-heading light-color">
						                    <h5><span>Latest</span></h5>
						                </div>
                                    </div>
                                    <!--Heading End-->
                                    <!--Artist Rank List Start-->
									<?php 
								   $query1 = $con->query("select * from songs join categories on songs.song_category = categories.category_id where categories.category='Latest' order by song_id desc limit 6");
								  while($row = $query1->fetch_assoc()){
									   $desc = $row['song_description'];
								   ?>
                                    <div class="artists-rank-list">
                                        <!--Artist Rank End-->
                                        <div class="artists-rank">
                                            <figure><img src="extra-images/mc.png" alt=""></figure>
                                            <div class="text-overflow">
                                                <h6><a href="download.php?url=<?php echo $row['song_url']; ?>"><?php echo ucfirst($row['song_title']); ?></a></h6>
                                                <p><?php echo ucfirst($row['song_author']); ?></p>
                                            </div>
                                        </div>
                                        
                                        <!--Artist Rank End-->
                                    </div>
									<?php

								  }
								  ?>
                                    <!--Artist Rank List End-->
                                </div>
								<div class="widget widget-artist">
                                    <!--Heading Start-->
                                    <div class="msl-black">
	                                    <div class="msl-heading light-color">
						                    <h5><span>Sponsored Songs</span></h5>
						                </div>
                                    </div>
                                    <!--Heading End-->
                                    <!--Artist Rank List Start-->
									<?php 
								   $query1 = $con->query("select * from songs join categories on songs.song_category = categories.category_id where categories.category='sponsored' order by song_id desc limit 6");
								  while($row = $query1->fetch_assoc()){
									   $desc = $row['song_description'];
								   ?>
                                    <div class="artists-rank-list">
                                        <!--Artist Rank End-->
                                        <div class="artists-rank">
                                            <figure><img src="extra-images/mc.png" alt=""></figure>
                                            <div class="text-overflow">
                                                <h6><a href="download.php?url=<?php echo $row['song_url']; ?>"><?php echo ucfirst($row['song_title'])." <span style='color:red;'>[sponsored]</span>"; ?></a></h6>
                                                <p><?php echo ucfirst($row['song_author']); ?></p>
                                            </div>
                                        </div>
                                        
                                        <!--Artist Rank End-->
                                    </div>
									<?php
								
								  }
								  ?>
                                    <!--Artist Rank List End-->
                                </div>
								    <div class="msl-eventlist2-wrap mg-40">
                                <!--Heading Start-->
                                <div class="msl-black title-style-2">
	                                <div class="msl-heading light-color">
	                                    <h5><span>Hot Songs</span></h5>
	                                </div>
	                            </div>    
                                <!--Heading End-->
                                <div class="msl-eventlist2-slider bottom-arrow msl-black">
								<?php 
						 $query1 = $con->query("select * from songs join categories on songs.song_category = categories.category_id where categories.category='trending' order by rand() limit 20");
								  $co = 1;
								  while($row = $query1->fetch_assoc()){
									   $desc = $row['song_description'];
								   ?>
                                    <div>
                                        <!--Event List 2 Strat-->
                                        <div class="msl-eventlist2">
                                            <figure><img src="admin/<?php echo $row['song_image_path']; ?>" alt="dreamzvibe"></figure>
                                            <div class="eventlist2-heading">
                                                <h5><a href="download.php?url=<?php echo $row['song_url']; ?>"><?php echo $row['song_title']; ?></a></h5>
                                                <div class="evnt-tag">
                                                    <a href="download.php?url=<?php echo $row['song_url']; ?>"><?php echo $row['song_author']; ?></a>
                                                </div>
                                            </div>
                                          <div class="eventlist2-link">
                                                <a class="btn-1" href="download?url=<?php echo $row['song_url']; ?>">Download</a>
                                            </div>
                                        </div>
                                        <!--Event List 2 End-->
                                    </div>
									<?php
								  }
									?>
                                  
                                </div>
                            </div>
							<div class="new-album-wrap mg-40">
				                <!--Heading Start-->
				                <div class="msl-black title-style-2">
					                <div class="msl-heading light-color ">
					                    <h5><span>New Releases Videos</span></h5>
					                </div>
				                </div>
				                <!--Heading End-->
				                <div class="new-album-slider-4 bottom-arrow msl-black">
				                   
				                    
				                  
				                   <?php 
								   $query1 = $con->query("select * from videos");
								   while($row = $query1->fetch_assoc()){
									   $desc = $row['video_description'];
								   ?>
				                    <div class="col-md-4">
				                        <!--New Album Thumb Start-->
				                        <div class="new-album-thumb">
				                            <figure>
				                                <img src="admin/<?php echo $row['video_image_path']; ?>" style="height:300px;">
				                            </figure>
				                            <div class="new-album-caption">
				                                <a href="v-download.php?url=<?php echo $row['video_url']; ?>" class="new-album fa fa-download"></a>
				                                <h5><a href="v-download.php?url=<?php echo $row['video_url']; ?>"><?php echo ucfirst($row['video_title']); ?></a></h5>
				                                <h6><?php echo $row['video_author']; ?></h6>
				                                <p><?php echo substr($desc,0,25)."...";?></p>
				                                <ul class="blog-meta-list">
				                                    <li>
				                                        <a href="#">
				                                            <i class="fa fa-download"></i> <span>18450</span>
				                                        </a>
				                                    </li>
				                                </ul>
				                                <div class="clear"></div>
				                                
				                            </div>
				                        </div>
				                        <!--New Album Thumb End-->
				                    </div>
									<?php
								   }
									?>
				                </div>                                
				            </div>
                            