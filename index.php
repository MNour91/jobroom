<?php
$current = "index";
include "layout/header.php";
?>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="page-contents" class="row merged20">
							<div class="col-lg-3">
								<aside class="sidebar static left">
									<div class="widget whitish low-opacity">
										<img src="images/time-clock.png" alt="">
										<div class="bg-image" style="background-image: url(images/resources/time-bg.jpg)"></div>
										<div class="date-time">
											<div class="realtime">
												<span id="hours">00</span>
												<span id="point">:</span>
												<span id="min">00</span>
											</div>	
											<span id="date"></span>
										</div>
									</div>
									<div class="widget" <?php if($_SESSION['type'] == 2){echo "hidden";}?>>
										<h4 class="widget-title">Complete Your Profile</h4>
										<span>Your Profile is missing followings!</span>
										<div data-progress="tip" class="progress__outer" data-value="0.67">
											<div class="progress__inner"><?php
												$user_id =	$_SESSION['user'];
												$select_user_p = $connect->query("SELECT * FROM users WHERE id= '$user_id'");
												$row_u =  $select_user_p ->fetch_assoc();
												$count= 0;
												if(!empty($row_u['name'])){
													$count += 6.666667 ;
												}
												if(!empty($row_u['username'])){
													$count += 6.666667 ;
												}
												if(!empty($row_u['phone'])){
													$count += 6.666667 ;
												}
												if(!empty($row_u['email'])){
													$count += 6.666667 ;
												}

												if(!empty($row_u['university'])){
													$count += 6.666667 ;
												}

												if(!empty($row_u['department'])){
													$count += 6.666667;
												}
												if(!empty($row_u['address'])){
													$count += 6.666667;
												}
												if(!empty($row_u['language'])){
													$count += 6.666667;
												}
												if(!empty($row_u['skills'])){
													$count += 6.666667;
												}
												if(!empty($row_u['discipliens'])){
													$count += 6.666667;
												}
												if(!empty($row_u['preson_img'])){
													$count += 6.666667;
												}
											
												if(!empty($row_u['back_img'])){
													$count += 6.666667;
												}
												if(!empty($row_u['	degree'])){
													$count += 6.666667;
												}
												if(!empty($row_u['followers'])){
													$count += 6.666667;
												}
												if(!empty($row_u['follow'])){
													$count += 6.666667;
												}
												echo ceil($count);
											?>%</div>
										</div>
										<ul class="prof-complete">
											<li><i class="icofont-plus-square"></i> <a href="sittings.php" title="">Upload Your Picture</a><em>10%</em></li>
											
										</ul>
									</div><!-- complete profile widget -->
									<div class="advertisment-box">
										<h4 class=""><i class="icofont-info-circle"></i> advertisment</h4>
										<figure>
											<a href="#" title="Advertisment"><img src="images/resources/ad-widget2.gif" alt=""></a>
										</figure>
									</div><!-- adversment widget -->
									
									<div class="widget">
										<h4 class="widget-title"><i class="icofont-flame-torch"></i> Popular Courses</h4>
										<ul class="premium-course">
											<li>
												<figure>
													<img src="images/resources/course-5.jpg" alt="">
													<span class="tag">Free</span>
												</figure>
												<div class="vid-course">
													<h5><a href="course-detail.html" title="">Wordpress Online video course</a></h5>
													<ins class="price">$19/M</ins>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/course-3.jpg" alt="">
													<span class="tag">Premium</span>
												</figure>
												<div class="vid-course">
													<h5><a href="course-detail.html" title="">Node JS Online video course</a></h5>
													<ins class="price">$29/M</ins>
												</div>
											</li>
										</ul>
									</div><!-- popular courses -->
									<div class="widget">
										<h4 class="widget-title">Recent Blogs <a class="see-all" href="#" title="">See All</a></h4>
										<ul class="recent-links">
											<?php
												// $select_blog = $connect ->query()
											?>
											<li>
												<figure><img alt="" src="images/resources/recentlink-1.jpg"></figure>
												<div class="re-links-meta">
													<h6><a title="" href="#">Moira's fade reach much farther...</a></h6>
													<span>2 weeks ago </span>
												</div>
											</li>
											
										</ul>
									</div><!-- recent blog -->
									<div class="widget">
										<h4 class="widget-title">Your profile has a new Experience section</h4>
										<p>
											Showcase your professional experience and education to help potential employers and collaborators find and contact you about career opportunities.
										</p>
										<a class="main-btn" href="profile.php?id=<?php echo $_SESSION['user'];?>" title="" data-ripple="">view profile</a>
									</div><!-- your profile -->
									
								</aside>
							</div>
							<div class="col-lg-6">
								<ul class="filtr-tabs">
									<li><a class="active" href="#" title="">Home</a></li>
								
								</ul><!-- tab buttons -->
								<div class="main-wraper">
									<span class="new-title">Create New Post</span>
									<div class="new-post">
										<form method="post">
											<i class="icofont-pen-alt-1"></i>
											<input type="text" placeholder="Create New Post">
										</form>
										
									</div>
								</div><!-- create new post -->
								<?php 
								$user =	$_SESSION['user'];
								$select = $connect->query("SELECT * FROM users WHERE id ='$user'");
								$row = $select->fetch_assoc();
								$follow_u = explode("#", $row['follow']);

								for($i = 0 ; $i < count($follow_u); $i++){
								$followed = $follow_u[$i];
								$select_u = $connect->query("SELECT * FROM users WHERE id ='$followed'");
								$row_u = $select_u->fetch_assoc();
								$select_post = $connect->query("SELECT * FROM post WHERE id_user ='$followed' AND type_post =1");
								foreach($select_post as $row_post){

								?>

								<div class="main-wraper">
									<div class="user-post">
										<div class="friend-info">
											<figure>
												
											<img alt="" src="<?php 
											if(empty($row_u['preson_img'])){ echo 'user.jpg';}else{ echo $row_u['preson_img'];}
											?>">
											</figure>
											<div class="friend-name">
												
												<ins><a title="" href="profile.php?id=<?php echo $row_u['id'];?>"><?php 
												echo $row_u['name'];
												?></a> Create Post</ins>
												<span><i class="icofont-globe"></i> published: <?php 
											echo $row_post['date'];
											?></span>
											</div>
											<div class="post-meta">
											
											<figure <?php 
										if(empty($row_post['img'])){ echo 'hidden';}
										?> >
													
														<img src="<?php echo $row_post['img'];?>" alt="">
														
												</figure>
												<a href="#" class="post-title"><?php echo $row_post['title'];?></a>
												<p>
												<?php echo $row_post['subject'];?>
												</p>
												<div class="we-video-info">
													<ul>
														<li>
															<span title="views" class="views">
																<i>
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></i>
																<ins>1.2k</ins>
															</span>
														</li>
														<li>
															<span title="Comments" class="Recommend">
																<i>
												<svg class="feather feather-message-square" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></i>
																<ins class="num_comment">54</ins>
															</span>
															
														</li>

													</ul>
													
												</div>
												<div class="stat-tools">
													<a class="#"><i class="icofont-eye-open"></i> SEE</a>
													
													<a title="" href="#" class="comment-to"><i class="icofont-comment"></i> Comment</a>
													<a title="" href="profile.php?id=<?php echo $row_u['id'];?>" class="share-to"><i class="icofont-search-document"></i>  CV</a>
													
													<div class="new-comment" style="display: none;">
														<form method="post" class="form_add_comment" >
														<input type="hidden" class="id_user" value="<?php echo $_SESSION['user'];?>">
														<input type="hidden" class="id_post" value="<?php echo $row_post['id'];?>">
														
															<input type="text" class="send_comment"  placeholder="write comment">
															<button type="submit"><i class="icofont-paper-plane"></i></button>
														</form>
														<div class="comments-area">
															<ul class="out_comments">
																<?php 
																	$id_posts =  $row_post['id'];
																	$select_comment =$connect->query("SELECT * FROM  comments WHERE id_post = '$id_posts'");
																	foreach($select_comment as $comment){
																		$user_coment = $comment['id_user']; 
																		$select_c_u = $connect->query("SELECT * FROM users WHERE id ='$user_coment'");
																$row_c_u = $select_c_u->fetch_assoc();
																?>
																<li>
																	<figure><img alt="" src="<?php 
																	if(empty($row_c_u['preson_img'])){ echo 'user.jpg';}else{ echo $row_c_u['preson_img'];}
																	?> "></figure>
																	<div class="commenter">
																		<h5><a title="" href="profile.php?id=<?php echo $row_c_u['id'];?>"><?php 
																	echo $row_c_u['name'];
																	?></a></h5>
																		<span><?php echo $comment['date'];?></span>
																		<p>
																		<?php echo $comment['comment'];?>
																		</p>
																	</div>
																	
																	
																</li>
																<?php } ?>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- share image with post -->
								
								<?php }
								}?>
								
								
								<div class="loadmore">
									<div class="sp sp-bars"></div>
									<a href="#" title="" data-ripple="">Load More..</a>
								</div><!-- loadmore buttons -->
							</div>
							<div class="col-lg-3">
								<aside class="sidebar static right">
									
								
									<div class="widget">
										<h4 class="widget-title">Ask Research Question?</h4>
										<div class="ask-question">
											<i class="icofont-question-circle"></i>
											<h6>Ask questions in Q&A to get help from experts in your field.</h6>
											<a class="ask-qst" href="#" title="">Ask a question</a>
										</div>
									</div><!-- ask question widget -->
									
									
									<div class="widget stick-widget">
										<h4 class="widget-title">Who's follownig</h4>
										<ul class="followers" >
										<?php 
												$show = $connect->query("SELECT * FROM users WHERE id !='$user_id' LIMIT 5 ");
												foreach($show as $user){
											?>
											<li>
												<figure><img alt="" src="<?php 
											if(empty($user['preson_img'])){ echo 'user.jpg';}else{ echo $user['preson_img'];}
											?>"></figure>
												<div class="friend-meta">
													<h4>
														<a title="" href="profile.php?id=<?php echo $user['id'];?>"><?php  echo $user['name']; ?></a>
														<span><?php  echo $user['department']; ?></span>
													</h4>
													<a class="underline" title="" href="profile.php?id=<?php echo $user['id'];?>">Follow</a>
												</div>
											</li>
											<?php }?>
										</ul>	
									</div><!-- whos following -->
								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- content -->
	<?php
		include "layout/footer.php";
	?>