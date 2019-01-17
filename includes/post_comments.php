<div class="kode-comments">
                                    <div class="msl-black">
	                                    <div class="msl-heading light-color">
										<?php $main_comment = mysqli_num_rows(mysqli_query($con,"select * from post_comments where item_id = '$post_id' " )); ?>
						                    <h5><span>There are <?php echo $main_comment; ?> comment For this Article</span></h5>
						                </div>
                                	</div>
                                    <ul id="kode-comment" class="comment">
									<?php
										$com = "select * from post_comments where item_id = '$post_id'";
										$qcount = $con->query($com);
										$count = $qcount->num_rows;
										if($count > 0)
										{
										$result1 = $con->query($com);
										while($row = $result1->fetch_assoc()){
									?>
                                        <li class="grand_parent">
                                            <div class="comment_item">
                                                <!-- Kode Comment Form Start -->
                                                <div class="kode-author">
                                                    <figure>
                                                        <img src="extra-images/cm.png" alt="dreamzvibe">
                                                    </figure>
                                                    <div class="kode-author-content">
                                                        <div class="kode-author-head">
                                                            <h5><a href="#"><?php echo $row['comment_user']; ?></a></h5>
                                                            <span><?php echo facebook_time_ago($row['comment_date']); ?></span>
                                                        </div>
                                                        <p><?php echo $row['comment']; ?></p>
                                                        <a class="comment-reply-link" id="btn_reply" >Reply</a>
                                                    </div>
                                                </div>
                                                <!-- Kode Comment Form End -->
                                            </div>
                                            <ul class="children">
											<?php
												$rep = "select * from post_replies where reply_header_id = '{$row['comment_id']}'";
												$qcount = $con->query($rep);
												$count = $qcount->num_rows;
												if($count > 0)
												{
												//$result2 = $con->query($com);
												while($col = $qcount->fetch_assoc()){
											?>
                                                <li>
                                                    <div class="comment_item">
                                                        <!-- Kode Comment Form Start -->
                                                        <div class="kode-author">
                                                            <figure>
                                                                <img src="extra-images/cm.png" alt="dreamzvibe">
                                                            </figure>
                                                            <div class="kode-author-content">
                                                                <div class="kode-author-head">
                                                                    <h5><a href="#"><?php echo $col['reply_user']; ?></a></h5>
                                                                    <span><?php echo facebook_time_ago($col['reply_date']); ?></span>
                                                                </div>
                                                                <p><?php echo $col['reply']; ?></p>
                                                            </div>
                                                        </div>
                                                        <!-- Kode Comment Form End -->
                                                    </div>
                                                </li>
												<?php
												}
												}
												?>
												<li>
												<div class="kode-reply-form" id="reply">
												<form class="" method="POST">
													<div class="kode-left-comment-sec">
														<div class="kf_commet_field">
															<input placeholder="Name*" name="user_name" type="text" value="" data-default="Name*" size="30">
															<input placeholder="Name*" name="user_hidden" type="hidden" value="<?php echo $row['comment_id']; ?>" data-default="Name*" size="30">
														</div>
														
													</div>
													<div class="kode-textarea">
														<textarea placeholder="Type Your Comments*" name="user_comment" cols="17" style="resize:none;"></textarea>
													</div>
													<p class="form-submit "><input name="reply" type="submit" class="submit btn-1 theme-bg" value="Comment"></p>
												</form>
												</div>
												</li>
                                            </ul>
                                        </li>
										<?php
										}
										}
										?>
                                        
                                    </ul>
                                    <div class="div-border"></div>
                                </div>
                                <!-- Kode Comment Section End -->
                                <!-- Kode Comment Form Start -->
                                <div class="kode-comment-form">
                                    <h3>Add Your Comments</h3>
                                    <p></p>
                                    <form class="comment-form light_bg" method="POST">
                                        <div class="kode-left-comment-sec">
                                            <div class="kf_commet_field">
                                                <input placeholder="Name*" name="user" type="text" value="" data-default="Name*" size="30">
                                            </div>
                                            
                                        </div>
                                        <div class="kode-textarea">
                                            <textarea placeholder="Type Your Comments*" name="comment" cols="17" style="resize:none;"></textarea>
                                        </div>
                                        <p class="form-submit "><input name="submit" type="submit" class="submit btn-1 theme-bg" value="Comment"></p>
                                    </form>
                                </div>