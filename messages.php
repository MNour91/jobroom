<?php
$current = "book";
include "layout/header.php";
?>
	
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="page-contents" class="row merged20">
							<div class="col-lg-8">
								<div class="main-wraper">
									<h3 class="main-title">Messages</h3>
									<div class="message-box">
										<div class="message-content">
											
											<div class="chat-content">
												
												<ul class="chatting-area out_massage">
													<?php 
													$user_to = $_GET['id'];
													$user_me = $_SESSION['user'];
													$query=mysqli_query($connect,"SELECT * FROM message WHERE 	from_user ='$user_to' AND to_user ='$user_me' OR from_user ='$user_me' AND to_user ='$user_to' ");
													foreach($query as $chat){
													// $user_from = $chat ->fetch_assoc();
													$id_from = $chat['id'];
													$query_from=mysqli_query($connect,"SELECT * FROM users WHERE 	id ='$id_from' ");
													$show = $query_from ->fetch_assoc();
													?>
													<li class="me">
														<figure><img src="<?php 
											if(empty($show['preson_img'])){ echo 'user.jpg';}else{ echo $show['preson_img'];}
											?>" alt=""></figure>
														<p><?php echo $chat['message']?></p>
														<p><?php echo $chat['date']?></p>
													</li>
													
													<?php }?>
													
												</ul>
												<div class="message-text-container">
													<div class="more-attachments">
														<i class="icofont-plus"></i>
													</div>
												
													<form method="post" class="send-massge">
													<input type="hidden" class="my_user" value="<?php echo $_SESSION['user'];?>">
													<input type="hidden" class="to_user" value="<?php echo $user_to;?>">
														<textarea rows="1" placeholder="say someting..."class="text-mass"></textarea>
														<button title="send" type="submit"><i class="icofont-paper-plane"></i></button>
														
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="profile-short">
								<div class="chating-head">
									<div class="s-left">
										<?php $query_show=mysqli_query($connect,"SELECT * FROM users WHERE 	id ='$user_to' ");
											 $user_show = $query_show ->fetch_assoc();?>
										<h5><?php echo $user_show['name']?></h5>
										<p><?php echo $user_show['address']?></p>
									</div>
									
								</div>
								<div class="short-intro">
									<figure><img src="<?php 
											if(empty($user_show['preson_img'])){ echo 'user.jpg';}else{ echo $user_show['preson_img'];}
											?>" alt=""></figure>
									<ul>
										<li>
											<span>User Name</span>
											<p><?php echo $user_show['address']?></p>
										</li>
										<li>
											<span>Date Join</span>
											<p><?php echo $user_show['date_join']?></p>
										</li>
										<li>
											<span>Email Address</span>
											<p><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2e7d4f435e424b6e49434f4742004d4143">[email&#160;protected]</a></p>
										</li>
										<li>
											<span>Phone Number</span>
											<p>+20 <?php echo $user_show['phone']?></p>
										</li>
										
									</ul>
									<a class="button primary circle" href="profile.php?id=<?php echo $user_show['id'];?>" title="">view Profile</a>
									
								</div>
							</div>
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