
<?php
$current = "course";
include "layout/header.php";
?>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="page-contents" class="row merged20">
							<div class="col-lg-9">
								<div class="main-wraper">
									<h4 class="main-title">Courses</h4>
									<div class="row">
									<?php 
											$user_id =	$_SESSION['user'];
											$select_user_p = $connect->query("SELECT * FROM users WHERE id= '$user_id'");
											$row_u =  $select_user_p ->fetch_assoc();
											$disc =	$row_u['discipliens'];
											
											$select_product = $connect->query("SELECT * FROM product WHERE discipliens= '$disc' AND type_product = 1");
											foreach($select_product as $row_product){
										?>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="course">
												<figure>
													<img src="images/resources/course-5.jpg" alt="">
													<i class="icofont-book-mark" title="bookmark"></i>
													<em>Best seller</em>
													
												</figure>
												<div class="course-meta">
													<div class="post-by">
														<figure><img src="<?php echo $row_product['img']; ?>" alt=""></figure>
														<div class="course-cat">
															<span>By: <?php $id_user =  $row_product['id_user']; 
												$user =	$_SESSION['user'];
												$select_user = $connect->query("SELECT * FROM users WHERE id= '$id_user'");
												$row_user =  $select_user ->fetch_assoc();
												echo $row_user['name'];
												?></span>
															<a href="book-detail.php?id=<?php echo $row_product['id']; ?>" title=""><?php $disc =	$row_u['discipliens'];
											
										$select_discipliens = $connect->query("SELECT * FROM discipliens WHERE id= '$disc' ");
										$row_discipliens =$select_discipliens->fetch_assoc();
										echo $row_discipliens["discipliens"];
										?></a>
														</div>
													</div>
													
													<h5 class="course-title"><a href="book-detail.php?id=<?php echo $row_product['id']; ?>" title=""><?php echo $row_product['title']; ?></a></h5>
												
												</div>
											</div>
										</div>
									<?php }?>
										
									</div>
								</div><!-- courses posts -->
								
								<div class="main-wraper">
									<h4 class="main-title">Categories <a title="" href="#" class="view-all">view all</a></h4>
									<div class="row">
									<?php 
											
											
											$select_product = $connect->query("SELECT * FROM product WHERE  type_product = 1  LIMIT 4");
											foreach($select_product as $row_product){
										?>
										<div class="col-lg-3 col-md-3 col-sm-6">
											<div class="categ-card">
												<i><img src="<?php echo $row_product['img']; ?>" alt=""></i>
												<div>
													<h6><?php echo $row_product['title']; ?></h6>
													
												</div>
											</div>
										</div>
										<?php }?>
										
									</div>
								</div><!-- categories -->
								<div class="main-wraper">
									<h4 class="main-title">Recommended Books <a class="view-all" href="#" title="">view all</a></h4>
									
									<div class="books-caro">
									<?php 
										$select_product = $connect->query("SELECT * FROM product WHERE type_product = 2 ORDER BY id DESC LIMIT  6");
										foreach($select_product as $row_product){
										?>
										<div class="book-post">
											<figure><a href="book-detail.php?id=<?php echo $row_product['id']; ?>" title=""><img src="<?php echo $row_product['img']; ?>" alt=""></a></figure>
											<a href="book-detail.php?id=<?php echo $row_product['id']; ?>" title=""><?php echo $row_product['title']; ?></a>
										</div>
									<?php }?>
									</div>
								</div><!-- books carousel -->
							</div>
							<div class="col-lg-3">
								<aside class="sidebar static right">
									<div class="widget">
									<h4 class="widget-title">Popular Books</h4>
										<?php 
										$select_product = $connect->query("SELECT * FROM product WHERE type_product = 2 ORDER BY id DESC LIMIT  3");
										foreach($select_product as $row_product){
										?>
										<div class="popular-book">
											<figure><img src="<?php echo $row_product['img']; ?>" alt=""></figure>
											<div class="book-about">
												<h6><a href="book-detail.php?id=<?php echo $row_product['id']; ?>" title=""><?php echo $row_product['title']; ?></a></h6>
												<span><?php $id_user =  $row_product['id_user']; 
												$user =	$_SESSION['user'];
												$select_user = $connect->query("SELECT * FROM users WHERE id= '$id_user'");
												$row_user =  $select_user ->fetch_assoc();
												echo $row_user['name'];
												?></span>
												
												<a href="book-detail.php?id=<?php echo $row_product['id']; ?>" title="Book Mark"><i class="">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></i></a>
											</div>
										</div>
										<?php }?>
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