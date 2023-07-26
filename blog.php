<?php
$current = "blog";
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
									<div class="main-title">Blog Posts</div>
									<?php
									$user_id = $_SESSION['user'];
									$select=$connect->query("SELECT * FROM users WHERE id = '$user_id'");
									$row = $select ->fetch_assoc();
									$dept = $row['discipliens'];
									$select_blog =$connect->query("SELECT * FROM post WHERE department = '$dept' AND type_post = 2");
									foreach($select_blog as $row_blog){
									
									?>
									<div class="blog-posts">
										<figure <?php if(empty($row_blog['img'])){echo "hidden";}?>><img src=" <?php echo $row_blog['img'];?>" alt=""></figure>
										<div class="blog-post-meta">
											<ul>
												<li><i class="icofont-comment"></i><a title="comments" href="#">33</a></li>
											</ul>
											
											<h4><?php echo $row_blog['title'];?></h4>
											<p>
											<?php 
											
											function get_first_num_of_words($string, $num_of_words)
												{
													$string = preg_replace('/\s+/', ' ', trim($string));
													$words = explode(" ", $string); // an array

													// if number of words you want to get is greater than number of words in the string
													if ($num_of_words > count($words)) {
														// then use number of words in the string
														$num_of_words = count($words);
													}

													$new_string = "";
													for ($i = 0; $i < $num_of_words; $i++) {
														$new_string .= $words[$i] . " ";
													}

													return trim($new_string);
												}
												echo get_first_num_of_words($row_blog['subject'], 10);
											 ?>
											</p>
											<span><i class="icofont-clock-time"></i> <?php echo $row_blog['date'];?></span>
											<a href="blog-detail.php?id=<?php echo $row_blog['id']?>" title="" class="button primary circle">read more</a>
										</div>
									</div>
									<?php }?>
									
								</div>	
							</div>
							<div class="col-lg-3">
								<aside class="sidebar static right">
									<div class="widget">
										<h4 class="widget-title">Popular Books</h4>
										<div class="popular-book">
											<figure><img src="images/resources/book10.jpg" alt=""></figure>
											<div class="book-about">
												<h6><a href="#" title="">Vu.js 2 Basics</a></h6>
												<span>Richard Ali</span>
												<a href="#" title=""><i class="icofont-book-mark"></i></a>
											</div>
										</div>
										<div class="popular-book">
											<figure><img src="images/resources/book9.jpg" alt=""></figure>
											<div class="book-about">
												<h6><a href="#" title="">Css3 for Bigners</a></h6>
												<span>Richard Ali</span>
												<a href="#" title=""><i class="icofont-book-mark"></i></a>
											</div>
										</div>
										<div class="popular-book">
											<figure><img src="images/resources/book5.jpg" alt=""></figure>
											<div class="book-about">
												<h6><a href="#" title="">Technology Wants 2020</a></h6>
												<span>Richard Ali</span>
												<a href="#" title=""><i class="icofont-book-mark"></i></a>
											</div>
										</div>
									</div>
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