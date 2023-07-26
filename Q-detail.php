<?php
$current = "ask";
include "layout/header.php";
$id_ask = $_GET['id'];
$select_blog =$connect->query("SELECT * FROM post WHERE  id = '$id_ask'");
// foreach($select_blog as $row_blog){
	$row_blog = $select_blog ->fetch_assoc();
$user_id = $row_blog['id_user'];
$select=$connect->query("SELECT * FROM users WHERE id = '$user_id'");
$row = $select ->fetch_assoc();
$department = $row_blog['department'];
$select_dep=$connect->query("SELECT * FROM discipliens WHERE id = '$department'");
$row_dep = $select_dep ->fetch_assoc();
?>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="page-contents" class="row merged20">
							<div class="col-lg-9">
								<!-- <div class="search-question">
									<form method="post">
										<input type="text" placeholder="Search Questoin?">
										<button type="submit"><i class="icofont-search-1"></i></button>
									</form>
								</div> -->
								<div class="main-wraper">
									<div class="friend-info">
										<h2 class="question-title"><a href="#" title=""><?php echo $row_blog['title'] ?></a></h2>
										<div class="more">
												<div class="more-post-optns">
													<i class="">
<svg class="feather feather-more-horizontal" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><circle r="1" cy="12" cx="12"/><circle r="1" cy="12" cx="19"/><circle r="1" cy="12" cx="5"/></svg></i>
													<ul>
														<li>
															<i class="icofont-pen-alt-1"></i>Edit Post
															<span>Edit This Post within a Hour</span>
														</li>
														<li>
															<i class="icofont-ban"></i>Hide Post
															<span>Hide This Post</span>
														</li>
														<li>
															<i class="icofont-ui-delete"></i>Delete Post
															<span>If inappropriate Post By Mistake</span>
														</li>
														<li>
															<i class="icofont-flag"></i>Report
															<span>Inappropriate content</span>
														</li>
													</ul>
												</div>
											</div>
										<figure>
											<img src="<?php 
											if(empty($row['preson_img'])){ echo 'user.jpg';}else{ echo $row['preson_img'];}
											?>" alt="">
										</figure>
										<div class="friend-name">
											
											<ins><a href="time-line.html" title=""><?php echo $row['name'] ?></a> added a chapter</ins>
											<span><i class="icofont-globe"></i> published:<?php echo $row_blog['date'] ?></span>
										</div>
										<div class="question-meta">
											<p>
											<?php echo $row_blog['subject'] ?>
											</p>
											<ul class="tags">
												<li><a data-ripple="" title="" href="#"><?php echo $row_dep['discipliens']; ?></a></li>
											
											</ul>
										</div>	
									</div>
									<form method="post" class="form_add_comment c-form" >
														<input type="hidden" class="id_user" value="<?php echo $_SESSION['user'];?>">
															<input type="hidden" class="id_post" value="<?php echo $id_ask;?>">
														
															<input type="text" class="send_comment"  placeholder="write comment">
															<button type="submit"><i class="icofont-paper-plane"></i></button>
									</form>
									<div class="anser out_comments">
			
										<i class="icofont-check-circled" title="Best Answer"></i>
										<?php 
																
																	$select_comment =$connect->query("SELECT * FROM  comments WHERE id_post = '$id_ask'");
																	foreach($select_comment as $comment){
																		$user_coment = $comment['id_user']; 
																		$select_c_u = $connect->query("SELECT * FROM users WHERE id ='$user_coment'");
																$row_c_u = $select_c_u->fetch_assoc();
																?>
										<div class="friend-info">
											<div class="more">
												<div class="more-post-optns">
													<i class="">
													<svg class="feather feather-more-horizontal" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><circle r="1" cy="12" cx="12"/><circle r="1" cy="12" cx="19"/><circle r="1" cy="12" cx="5"/></svg></i>
													<ul>
														<li>
															<i class="icofont-pen-alt-1"></i>Edit Post
															<span>Edit This Post within a Hour</span>
														</li>
														<li>
															<i class="icofont-ban"></i>Hide Post
															<span>Hide This Post</span>
														</li>
														<li>
															<i class="icofont-ui-delete"></i>Delete Post
															<span>If inappropriate Post By Mistake</span>
														</li>
														<li>
															<i class="icofont-flag"></i>Report
															<span>Inappropriate content</span>
														</li>
													</ul>
												</div>
											</div>
											<figure>
												<img src="<?php 
																	if(empty($row_c_u['preson_img'])){ echo 'user.jpg';}else{ echo $row_c_u['preson_img'];}
																	?> " alt="">
											</figure>
											<div class="friend-name">

												<ins><a href="profile.php?id=<?php echo $row_c_u['id'];?>" title=""><?php 
																	echo $row_c_u['name'];
																	?></a> added a chapter</ins>
												<span><i class="icofont-globe"></i> published:<?php echo $comment['date'];?></span>
											</div>
											<div class="question-meta">
												<p><?php echo $comment['comment'];?></p>
												
											</div>	
										</div>
										
										<?php }?>
									</div>	
								</div>
								<div class="main-wraper">
									<h4 class="main-title">Related Questions</h4>
									<ul class="related-qst">
										<?php
										$select_blog =$connect->query("SELECT * FROM post WHERE  type_post = 3");
										foreach($select_blog as $row_blog){
										?>
										<li>
											<a href="?id=<?php echo $row_blog['id'] ?>" title=""><?php echo $row_blog['title'] ?></a>
										</li>
										<?php }?>	
									</ul>
								</div>
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