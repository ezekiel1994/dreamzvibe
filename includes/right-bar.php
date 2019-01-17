<div class="widget widget-artist">
                                    <!--Heading Start-->
                                    <div class="msl-black">
	                                    <div class="msl-heading light-color">
						                    <h5><span>Trending</span></h5>
						                </div>
                                    </div>
                                    <!--Heading End-->
                                    <!--Artist Rank List Start-->
									<?php 
								   $query1 = $con->query("select * from songs join categories on songs.song_category = categories.category_id where categories.category='trending' order by song_id desc limit 6");
								 
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
                                <!--Widget Artist End-->
                                <!--Widget Playlist Start-->
                               
                                <!--Widget Playlist End-->
                                <!--Widget Social Start-->
                                <div class="widget widget-social">
                                    <!--Heading Start-->
                                    <div class="msl-black">
	                                    <div class="msl-heading light-color">
						                    <h5><span>Get Connected</span></h5>
						                </div>
						            </div>
                                    <!--Heading End-->
                                    <ul class="msl-social">
                                        <li class="fb"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="tw"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="lkd"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li class="yt"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li class="igm"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                     </ul>
                                </div>
                                <!--Widget Social End-->
