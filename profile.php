<?php
$current = "index";
include "layout/header.php";
if(!isset($_GET['id'])){
	header("location:index.php");
	exit();
}
$id = $_GET['id'];
$id_log = $_SESSION['user'];
$select = $connect->query("SELECT * FROM users WHERE id = '$id'");
$row = $select ->fetch_assoc();

?>
	
	<div class="gap no-gap">
		<div class="top-area mate-black low-opacity">
			<div class="bg-image" style="background-image: url(<?php if($row['back_img']!=''){ echo $row['back_img']; }else{echo'images/resources/top-bg.jpg';} ?>)"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="post-subject">
							<div class="university-tag">
								<figure><img src="<?php if($row['preson_img']!=''){ echo $row['preson_img']; }else{echo'user.jpg';} ?>" alt=""></figure>
								<div class="uni-name">
									<h4><?php echo $row['name'];?> </h4>
									<span>@<?php echo $row['username'];?></span>
								</div>
								<ul class="sharing-options">
									<li><a title="Message" href="#" data-toggle="tooltip"><i class="icofont-id-card"></i></a> </li>
									<li onclick="followMe(<?php echo $id?>,<?php echo $id_log?>)"><a title="Follow" href="#" data-toggle="tooltip"><i class="icofont-star"></i></a> </li>
									
								</ul>
							
							</div>

							<ul class="nav nav-tabs post-detail-btn">
								 <li class="nav-item"><a class="active" href="#timeline" data-toggle="tab">Timeline</a></li>
								 <li class="nav-item"><a class="" href="#followers" data-toggle="tab">Followers</a><span><?php $arr = explode("#",$row['followers']);
								 echo count($arr); ?></span></li>
								 <li class="nav-item"><a class="" href="#follow" data-toggle="tab">Follow</a><span><?php $arra = explode("#",$row['follow']);
								 echo count($arra); ?></span></li>
								<li class="nav-item"><a class="" href="#about" data-toggle="tab">About</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- top Head -->
	
		
	
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="page-contents" class="row merged20">
							<div class="col-lg-8">
								<div class="tab-content">
								    <div class="tab-pane fade active show" id="timeline" >
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
								

								
								$select_u = $connect->query("SELECT * FROM users WHERE id ='$id'");
								$row_u = $select_u->fetch_assoc();
								$select_post = $connect->query("SELECT * FROM post WHERE id_user ='$id' AND type_post =1");
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
													
													<!-- <div class="box">
													
													  </div> -->
													  <a class="#"><i class="icofont-eye-open"></i> SEE</a>
													<a title="" href="#" class="comment-to"><i class="icofont-comment"></i> Comment</a>
													<a title="" href="#" class="share-to"><i class="icofont-search-document"></i> downloud CV</a>
													
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
								?>	
								  		<div class="sp sp-bars"></div>  
									</div>
								  	<div class="tab-pane fade" id="followers">
										<div class="row col-xs-6 merged-10">
											<?php 
											 $select_followers =$connect ->query("SELECT * FROM users WHERE id = '$id' ");
											 $row_followers =  $select_followers->fetch_assoc();
											 $followers = explode("#",$row_followers['followers']);
											 for($i = 0 ;$i <count($followers);$i++){
												$friend = $followers[$i]	;
												$friend_followers =$connect ->query("SELECT * FROM users WHERE id = '$friend ' ");
												$row_friend =  $friend_followers->fetch_assoc();
											?>
											<div class="col-lg-4 col-md-4 col-sm-6">
												<div class="friendz">
													<figure><img src="<?php 
            if(empty($row_friend['preson_img'])){ echo 'user.jpg';}else{ echo $row_friend['preson_img'];}
            ?>" alt=""></figure>
													<span><a href="profile.php?id=<?php echo $row_friend['id'];?>" title=""><?php echo $row_friend['name']?></a></span>
													<ins><?php echo $row_friend['department']?></ins>
													<a href="profile.php?id=<?php echo $row_friend['id'];?>" title="" data-ripple=""><i class="icofont-star"></i>visit</a>
												</div>
											</div>
											<?php 
											}?>
											<div class="col-lg-12">
												<div class="sp sp-bars"></div>
											</div>
										</div>
									</div>
								  	<div class="tab-pane fade" id="follow">
										<div class="row merged-10 col-xs-6">

											<?php 
											 $select_follow =$connect ->query("SELECT * FROM users WHERE id = '$id' ");
											 $row_follow =  $select_follow->fetch_assoc();
											 $follow = explode("#",$row_follow['follow']);
											 for($i = 0 ;$i < count($follow);$i++){
												$friend = $follow[$i];
												$friend_follow =$connect ->query("SELECT * FROM users WHERE id = '$friend' ");
												$row_friend =  $friend_follow->fetch_assoc();
											?>
											<div class="col-lg-4 col-md-4 col-sm-6">
												<div class="friendz">
													<figure><img src="<?php 
										if(empty($row_friend['preson_img'])){ echo 'user.jpg';}else{ echo $row_friend['preson_img'];}
										?>" alt=""></figure>
													<span><a href="profile.php?id=<?php echo $row_friend['id'];?>" title=""><?php echo $row_friend['name']?></a></span>
													<ins><?php echo $row_friend['department']?></ins>
													<a href="profile.php?id=<?php echo $row_friend['id'];?>" title="" data-ripple=""><i class="icofont-star"></i>visit</a>
												</div>
											</div>
											<?php 
											}?>
										
											<div class="col-lg-12">
												<div class="sp sp-bars"></div>
											</div>
										</div>
									</div>
								  	<div class="tab-pane fade " id="about">
									  <?php  
												if( $row['type_user']== 1){
													?>
									  <div class="main-wraper">
											<h5 class="main-title">Personal</h5>
											<div class="info-block-list">
												<ul>
													<li>Date of Birth: <span><?php echo $row['age'];?></span></li>
													<li>Location: <span><?php echo $row['address'];?></span></li>
													<li>Web: <span><?php echo $row['website'];?></span></li>
													<li>Email: <span><a href="<?php echo $row['email'];?>" class="__cf_email__" data-cfemail="90e3f1fde0fcf5a1a2a3d0e9ffe5e2fdf1f9fcbef3fffd"><?php echo $row['email'];?></a></span></li>
													<li>Gender: <span><?php if($row['gender'] == 1){echo "Male";}else{echo "Female";} ;?></span></li>
													<li>Phone: <span><?php echo $row['phone'];?></span></li>
													<li>Degree: <span><?php $deg= $row['degree'];
													$sel_deg = $connect->query("SELECT * FROM person_degree WHERE id = '$deg'");
													$ro_d= $sel_deg->fetch_assoc();
													echo $ro_d['name'];
													?></span></li>
												</ul>	
											</div>	
										</div>
										<?php  }
												
													?>
										<div class="main-wraper">
											<h3 class="main-title">About </h3>
											<?php  
												if( $row['type_user']== 2){
													?>
												<div class="lang">
												<h6>ABOUT US</h6>
												<span>
												<?php echo $row['about'];?>
													
												</span>
											</div>


													<?php 
												}else{
											?>
											<div class="lang" <?php if(empty($row['language'])){echo"hidden";}?> >
												<h6>Languages</h6>
												<span><?php $lang = explode('#', $row['language']);
													for($i = 0 ; $i < count($lang);$i++){
														$id_lang = $lang[$i];
														$sel_lang = $connect ->query(" SELECT * FROM discipliens WHERE id = '$id_lang'");
														$data=$sel_lang->fetch_assoc();
														echo $data['language'].",";
													}
													?></span>
											</div>
											<?php 
												}
											?>
											<div class="dis-n-exp" <?php if(empty($row['discipliens'])){echo"hidden";}?>>
												<h6>Discipliens</h6>
												<?php $disci = explode('#', $row['discipliens']);
													for($i = 0 ; $i < count($disci);$i++){
														$id_disci = $disci[$i];
														$sel_disci = $connect ->query(" SELECT * FROM discipliens WHERE id = '$id_disci'");
														$data_disci=$sel_disci->fetch_assoc();
														
													
													?>
												<span><?php echo $data_disci['discipliens'];?></span>
										<?php }
												?>
											</div>
											<div class="dis-n-exp" <?php  
												if(empty($row['skills']) OR $row['type_user']== 2){echo"hidden";}
												
													?> >
												<h6>Skills & Experties </h6>
												<?php $skills = explode('#', $row['skills']);
													for($i = 0 ; $i < count($skills);$i++){
														$id_skills = $skills[$i];
														$sel_skills = $connect ->query(" SELECT * FROM discipliens WHERE id = '$id_skills'");
														$data_skills=$sel_skills->fetch_assoc();
														
													
													?>
												<span><?php echo $data_skills['skills'];?></span>
										<?php }
												?>
											</div>
										</div>
										<div class="main-wraper" <?php  
												if( $row['type_user']== 2){echo 'hidden'; }
													?>>
											<h3 class="main-title">Professional Experience</h3>
											<?php
											$select_exp = $connect ->query("SELECT * FROM experience WHERE id_user = '$id' ");
											foreach($select_exp as $row_exp){
											?>
											<div class="exp-col">
												<div class="exp-meta">
													<h5><i class="icofont-university"></i><?php echo $row_exp['company'] ;?></h5>
													<p><?php echo "from " . $row_exp['from_date'] ;?> <?php if($row_exp['to_date'] == null){
															echo "to now";
													}else{ echo "to " . $row_exp['to_date'] ;} ?></p>
													<span>Position</span>
													<ins><?php echo $row_exp['job'] ;?></ins>
												</div>
												
											</div>
											<?php }?>
										</div>
										
										
									</div>
								</div>
								
							</div>
							<div class="col-lg-4">
								<aside class="sidebar static right">
									<div class="widget">
										<h4 class="widget-title">Post Analytics</h4>
										<ul class="widget-analytics">
											<li>Reads <span>0</span></li>
											<li>Recommendations <span>0</span></li>
											<li>Shares <span>0</span></li>
											<li>References <span>0</span></li>
										</ul>
									</div>
									<div class="widget">
										<h4 class="widget-title">Ask Research Question?</h4>
										<div class="ask-question">
											<i class="icofont-question-circle"></i>
											<h6>Ask questions in Q&A to get help from experts in your field.</h6>
											<a class="ask-qst" href="#" title="">Ask a question</a>
										</div>
									</div>
									
									<div class="widget stick-widget">
										<h4 class="widget-title">Who's follownig</h4>
										<ul class="followers" >
											<li>
												<figure><img alt="" src="images/resources/friend-avatar.jpg"></figure>
												<div class="friend-meta">
													<h4>
														<a title="" href="time-line.html">Kelly Bill</a>
														<span>Dept colleague</span>
													</h4>
													<a class="underline" title="" href="#">Follow</a>
												</div>
											</li>
											<li>
												<figure><img alt="" src="images/resources/friend-avatar2.jpg"></figure>
												<div class="friend-meta">
													<h4>
														<a title="" href="time-line.html">Issabel</a>
														<span>Dept colleague</span>
													</h4>
													<a class="underline" title="" href="#">Follow</a>
												</div>
											</li>
											<li>
												<figure><img alt="" src="images/resources/friend-avatar3.jpg"></figure>
												<div class="friend-meta">
													<h4>
														<a title="" href="time-line.html">Andrew</a>
														<span>Dept colleague</span>
													</h4>
													<a class="underline" title="" href="#">Follow</a>
												</div>
											</li>
											<li>
												<figure><img alt="" src="images/resources/friend-avatar4.jpg"></figure>
												<div class="friend-meta">
													<h4>
														<a title="" href="time-line.html">Sophia</a>
														<span>Dept colleague</span>
													</h4>
													<a class="underline" title="" href="#">Follow</a>
												</div>
											</li>
											<li>
												<figure><img alt="" src="images/resources/friend-avatar5.jpg"></figure>
												<div class="friend-meta">
													<h4>
														<a title="" href="time-line.html">Allen</a>
														<span>Dept colleague</span>
													</h4>
													<a class="underline" title="" href="#">Follow</a>
												</div>
											</li>
										</ul>	
									</div>
								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	
	include "layout/footer.php";
	
	?>