<?php

include "layout/header.php";
if(!isset($_GET['id'])){
header("location:index.php");
}
$id_book = $_GET['id'];
$select_book =  $connect->query("SELECT * FROM product WHERE id = '$id_book'");
$row_book = $select_book ->fetch_assoc();
?>
	
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="page-contents" class="row merged20">
							<div class="col-lg-9">
								<div class="main-wraper">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="full-book">
												<figure>
													<img src="<?php echo $row_book['img'] ?>" alt="">
													<span>Trending</span>
												</figure>
												<div class="prod-stat">
													<ul>
												
														<li><span>Availablity:</span> Available</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<div class="prod-detail">
												
												<h4><?php echo $row_book['title'] ?></h4>
												<!-- <span>Price: <i>$20</i></span> -->
												<p>
												<?php echo $row_book['descr'] ?>
												</p>
												<ul class="item-info">
													<li><span>Author:</span> <?php $id_user =  $row_book['id_user']; 
												$user =	$_SESSION['user'];
												$select_user = $connect->query("SELECT * FROM users WHERE id= '$id_user'");
												$row_user =  $select_user ->fetch_assoc();
												echo $row_user['name'];
												?></li>
													
													<li><span>Publish:</span> <?php echo $row_book['date'] ?></li>
											
													<li><span>Publisher:</span> Random House</li>
												</ul>
												<div class="sale-button">
													<a href="<?php echo $row_book['link'] ?>" title="" class="main-btn"><i class="icofont-book-alt"></i> Read Now</a>
													<button class="main-btn purchase-btn"><i class="icofont-cart-alt"></i> Save Cart</button>
												</div>
											</div>
										</div>
									</div>
									
									<div class="comment-area product mt-5">
										<h4 class="comment-title"><span class="num_comment"></span> Feedback</h4>
										<ul class="comments out_comments">
										<?php 
																	$book_id =  $row_book['id'];
																	$select_comment =$connect->query("SELECT * FROM  comments WHERE book_id = '$book_id'");
																	foreach($select_comment as $comment){
																		$user_coment = $comment['id_user']; 
																		$select_c_u = $connect->query("SELECT * FROM users WHERE id ='$user_coment'");
																$row_c_u = $select_c_u->fetch_assoc();
																?>
											<li>
												<div class="comment-box">
													<div class="commenter-photo">
														<img alt="" src="<?php 
																	if(empty($row_c_u['preson_img'])){ echo 'user.jpg';}else{ echo $row_c_u['preson_img'];}
																	?> ">
													</div>
													<div class="commenter-meta">
														<div class="comment-titles">
															<h6><?php 
																	echo $row_c_u['name'];
																	?></h6>
															<span><?php echo $comment['date'];?></span>
															
														</div>
														<p>
														<?php echo $comment['comment'];?>
														</p>
													</div>
												</div>
											</li>
											<?php } ?>
										</ul>
										<div class="add-comment">
											
											<form method="post" class="c-form form_add_comment">
												<input type="hidden" class="id_user" value="<?php echo $_SESSION['user'];?>">
												<input type="hidden" class="id_book" value="<?php echo $row_book['id'];?>">
											
												<textarea rows="4" class="send_comment" placeholder="Write Message"></textarea>
												<button class="main-btn" type="submit">Add Review</button>
											</form>
										</div>
									</div>
								</div>
								<div class="main-wraper">
									<h4 class="main-title">Related Books <a class="view-all" href="#" title="">view all</a></h4>
									<div class="books-caro">
									<?php 
											$user_id =	$_SESSION['user'];
											$select_user_p = $connect->query("SELECT * FROM users WHERE id= '$user_id'");
											$row_u =  $select_user_p ->fetch_assoc();
											$disc =	$row_u['discipliens'];
											
											$select_product = $connect->query("SELECT * FROM product WHERE discipliens= '$disc' AND type_product = 2");
											foreach($select_product as $row_product){
										?>
										<div class="book-post">
											<figure><a href="book-detail.php?id=<?php echo $row_product['id']; ?>" title=""><img src="<?php echo $row_product['img']; ?>" alt=""></a></figure>
											<a href="book-detail.php?id=<?php echo $row_product['id']; ?>" title=""><?php echo $row_product['title']; ?></a>
										</div>
										<?php }?>
									</div>
								</div>
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
										$user_id = $_SESSION['user'];
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