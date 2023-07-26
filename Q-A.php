<?php
$current = "ask";
include "layout/header.php";
?>
	
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="page-contents" class="row merged20">
							<div class="col-lg-9">
								<div class="search-question">
									<form method="post">
										<input type="text" placeholder="Search Questoin?">
										<button type="submit"><i class="icofont-search-1"></i></button>
									</form>
								</div>
								<?php
								
									$select_blog =$connect->query("SELECT * FROM post WHERE  type_post = 3");
									foreach($select_blog as $row_blog){
									$user_id = $row_blog['id_user'];
									$select=$connect->query("SELECT * FROM users WHERE id = '$user_id'");
									$row = $select ->fetch_assoc();
									$department = $row_blog['department'];
									$select_dep=$connect->query("SELECT * FROM discipliens WHERE id = '$department'");
									$row_dep = $select_dep ->fetch_assoc();
									?>
								<div class="main-wraper">
									<div class="friend-info">
										<h2 class="question-title"><a href="Q-detail.php?id=<?php echo $row_blog['id'] ?>" title=""><?php echo $row_blog['title'] ?></a></h2>
										<div class="more">
											<div class="more-post-optns">
												<i class="">
												<svg class="feather feather-more-horizontal" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><circle r="1" cy="12" cx="12"/><circle r="1" cy="12" cx="19"/><circle r="1" cy="12" cx="5"/></svg></i>
											</div>
										</div>
										<figure>
											<img src="<?php 
											if(empty($row['preson_img'])){ echo 'user.jpg';}else{ echo $row['preson_img'];}
											?>" alt="">
										</figure>
										<div class="friend-name">
											
											<ins><a href="profile.php?id=<?php echo $row['id'];?>" title=""><?php echo $row['name'] ?></a> added a chapter</ins>
											<span><i class="icofont-globe"></i> published: <?php echo $row_blog['date'] ?></span>
										</div>
										<div class="question-meta">
											<p>
											<?php echo $row_blog['subject']; ?>
											</p>
											<ul class="tags">
												<li><a data-ripple="" title="" href="#"><?php echo $row_dep['discipliens']; ?></a></li>
										
											</ul>
											<a href="Q-detail.php?id=<?php echo $row_blog['id'] ?>" title="" class="main-btn">view Answers</a>
										</div>	
									</div>
								</div>
								<?php }?>
							</div>
							<div class="col-lg-3">
								<aside class="sidebar static right mt-5">
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
										<?php $user_id = $_SESSION['user'];
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