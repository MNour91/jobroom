<?php
$current = "sitting";
include "layout/header.php";
$id = $_SESSION['user'];
?>

    <section>
    	<div class="gap no-gap bluesh high-opacity">
			<div style="background-image: url(images/resources/top-bg.jpg)" class="bg-image"></div>
	        <div class="container">
	        	<div class="row">
	        		<div class="col-lg-12">
	        			<div class="post-subject">
							<h1>Account Settings</h1>
							<p> Choose your accounts options and privacy. </p>
			            </div>
		            </div>
	            </div>
	        </div>
    	</div>
    </section>
	
    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                	<div class="col-lg-3 mb-4">
                		<nav class="responsive-tab">
		                    <ul class="nav nav-tabs uk-list">
								<li class="nav-item"><a class="active" href="#account" data-toggle="tab">Account</a></li>
								<li class="nav-item"><a class="" href="#notification" data-toggle="tab">Add Experience</a></li>
								<li class="nav-item"><a class="" href="#privacy" data-toggle="tab">Interested Blog</a></li>
								<li class="nav-item"><a class="" href="#billing" data-toggle="tab">Billing and Payout</a></li>
								<li class="nav-item"><a class="" href="#api" data-toggle="tab">Change Password</a></li>
								<li class="nav-item"><a class="" href="#close" data-toggle="tab">Close Account</a></li>
		                    </ul>
		                </nav>
                	</div>
                    <div class="col-lg-9">
                        <div class="main-wraper">
                            <div class="tab-content" id="components-nav">
                                <!-- settings -->
                                <div class="tab-pane active fade show" id="account">
									<div class="uk-width">
										<div class="setting-card">
											<h2>Account Settings</h2>
											<p class="mb-4">This is your public presence on JOBROOM. You need a account to upload your paid courses, comment on courses, purchased by users, or earning.
											</p>
											<h6>Basic Profile</h6>
											<p>Add information about yourself</p>
											<?php 
												$select = $connect->query("SELECT * FROM users WHERE id = '$id'");
												$row = $select->fetch_assoc();

											?>
											<form  method="post"  action="admin/functions/edit_person.php" enctype="multipart/form-data">
												<fieldset class="row merged-10">
												<div class="mb-4 col-lg-6">
												<label >Profile image</label>
														<input   type="file" name = "preson" >
													</div>
													<div class="mb-4 col-lg-6">
													<label >Background Image</label>
														<input   type="file" name = "back">
													</div>
												<input class="uk-input"  type="hidden" name = "id" value="<?php echo $row['id']  ?>" placeholder="Name" require>
													<div class="mb-4 col-lg-6">
														<input class="uk-input"  type="text" name = "name" value="<?php echo $row['name']  ?>" placeholder="Name" require>
													</div>
													<div class="mb-4 col-lg-6">
														<input class="uk-input"  type="text" name = "username" value="<?php echo $row['username']  ?>"  placeholder="@username" require>
													</div>
													<div class="mb-4 col-lg-6">
														<input class="uk-input"  type="number" name = "phone" value="<?php echo $row['phone']  ?>" placeholder="phone" require>
													</div>
													<div class="mb-4 col-lg-6">
														<input class="uk-input"  type="date" name = "age" value="<?php echo $row['age']  ?>"  placeholder="birthday" require>
													</div>
													<div class="mb-4 col-lg-6">
														<input class="uk-input"  type="text" name="email" value="<?php echo $row['email']  ?>"  placeholder="Email@" require>
													</div>
													<div class="mb-4 col-lg-6">
													<select name="disciplien" require >
													<option disabled selected>Open this select discipliens</option>
													<?php  
													$select_d = $connect ->query("SELECT * FROM discipliens WHERE discipliens != ''");
													while($row_d=$select_d->fetch_assoc()){
													?>
													<option value="<?php echo $row_d['id']; ?>"<?php if($row['discipliens'] == $row_d['id']){echo 'selected';}   ?>><?php echo $row_d['discipliens']; ?></option>
													<?php } ?>
													</select>
													</div>
													
													<div class="mb-4 col-lg-6">
													<label >skills</label>
													<select name="skills[]" multiple>
												
													<?php  
													$select_s = $connect ->query("SELECT * FROM discipliens WHERE skills != ''");
													while($row_s=$select_s->fetch_assoc()){
													?>
													<option value="<?php echo $row_s['id']; ?>"><?php echo $row_s['skills']; ?></option>
													<?php } ?>
													</select>
													</div>
													<div class="mb-4 col-lg-6">
													<label >language</label>
													<select name="language[]" multiple>
													
													<?php  
													$select_l = $connect ->query("SELECT * FROM discipliens WHERE language != ''");
													while($row_l=$select_l->fetch_assoc()){
													?>
													<option value="<?php echo $row_l['id']; ?>"><?php echo $row_l['language']; ?></option>
													<?php } ?>
													</select>
													</div>
													
													
													<?php 
														$select_g = $connect ->query("SELECT * FROM person_degree");
														foreach ($select_g as $row_g) {
															
														
													?>
													<div class="mb-4 col-lg-6">
														<input   type="radio" <?php if($row['degree'] == $row_g['id']){echo 'checked';}   ?> name="degree" value="<?php echo $row_g['id'] ?>" >
														<label ><?php echo $row_g['name'] ?></label>
													</div>
													<?php }?>
													<div class="mb-4 col-lg-6">
														<input class="uk-input"  type="text" value="<?php echo $row['university']; ?>"  name="university" placeholder="Institute, University" >
													</div>
													<div class="mb-4 col-lg-6">
														<input class="uk-input"  type="text"  name="department" value="<?php echo $row['department']; ?>"  placeholder="Department" >
													</div>
													<div class="col-lg-12">
														<input class="uk-input"  type="text" name="address" value="<?php echo $row['address']; ?>"  placeholder="Address" >
													</div>
													
													<div class="col-lg-12">
													<br>
														<input class="uk-input"  type="text" name="website" value="<?php echo $row['website']; ?>"  placeholder="website" >
													</div>
													<div class="col-lg-12">
														<div class="gender">
														<input   type="radio" id="male" name="gender" value="1"<?php if($row['gender'] ==1 ){echo 'checked';}   ?>>
														<label for="male">Male</label>
														<input   type="radio" id="female" name="gender" value="2" <?php if($row['gender'] ==2 ){echo 'checked';}   ?>>
														<label for="female">Female</label>
														</div>	
														<br>
													</div>
													<div class="col-lg-12">
													<br>
														<textarea class="uk-input"   name="about" value="<?php echo $row['about']; ?>"  placeholder="About" ></textarea>
													</div>
													<div class="mb-0 col-lg-12">
														<button type="submit" class="button primary circle">Save Changes</button>
													</div>	
												</fieldset>
											</form>
										</div>
									</div>
                                </div>
                                <!-- Notification -->
                                <div class="tab-pane fade" id="notification">
									<div class="uk-width">
										<div class="setting-card">
											<h2>Experience</h2>
											<p class="mb-4">Experiences - Add your experiences To make Your Profile strong.</p>
											<form  method="post"  action="admin/functions/add_exp.php" >
												<fieldset class="row merged-10">
												
												
													<div class="col-lg-12">
													<label>Company or Place name</label>
														<input class="uk-input"  type="text" name = "company"   placeholder="@company" require>
													</div>
													<div class="mb-4 col-lg-6">
														<br>
													<label>From</label>
														<input class="uk-input"  type="date" name = "from"  require>
													</div>
													<div class="mb-4 col-lg-6">
													<br>
													<label>To</label>
														<input class="uk-input"  type="date" name = "to"  >
													</div>
													<div class="mb-4 col-lg-6">
														<input class="uk-input"  type="hidden" name="id" value="<?php echo $row['id']  ?>"  >
													</div>
													<div class="col-lg-12">
														<input class="uk-input"  type="text" name="job"  placeholder="Job" >
													</div>

													<div class="mb-0 col-lg-12">
													<br>
														<button type="submit" class="button primary circle">Save </button>
													</div>	
												</fieldset>
											</form>
										
										</div>
									</div>
                                </div>
                                <!-- Privacy -->
                                <div class="tab-pane fade" id="privacy">
									<div class="uk-width">
										<div class="setting-card">
											<h2>Interested Blog</h2>
											<p class="mb-2"> </p>
											<div class="card mb-3">
												<div class="card-header">
													<i class="fas fa-table"></i>
													persons  Interested your Blog </div>
												<div class="card-body">
													<div class="table-responsive">
													<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
														<thead>
														<tr>
															<th>blog title</th>
															<th>Person</th>
															<th>CV percent</th>
															<th>SEE</th>
														</tr>
														</thead>
													
														<tbody>
														<?php
														$select_blog = $connect ->query("SELECT *  FROM post WHERE id_user ='$id' AND type_post = 2");
														foreach($select_blog as $row_blog){
															$id_blog = $row_blog['id'];
															$select_int = $connect ->query("SELECT *  FROM intersted_blog WHERE id_blog ='$id_blog'");
															foreach($select_int as $row_int){
														?> 
															<tr>
																<td><?php echo $row_blog['title']; ?></td>
																<td><?php $id_users = $row_int['user_id'];
																$select_user = $connect ->query("SELECT *  FROM users WHERE id ='$id_users'");
																$row_user = $select_user -> fetch_assoc();
																echo $row_user['name'];
																?></td>
																<td><?php $count= 0;
												if(!empty($row_user['name'])){
													$count += 6.666667 ;
												}
												if(!empty($row_user['username'])){
													$count += 6.666667 ;
												}
												if(!empty($row_user['phone'])){
													$count += 6.666667 ;
												}
												if(!empty($row_user['email'])){
													$count += 6.666667 ;
												}

												if(!empty($row_user['university'])){
													$count += 6.666667 ;
												}

												if(!empty($row_user['department'])){
													$count += 6.666667;
												}
												if(!empty($row_user['address'])){
													$count += 6.666667;
												}
												if(!empty($row_user['language'])){
													$count += 6.666667;
												}
												if(!empty($row_user['skills'])){
													$count += 6.666667;
												}
												if(!empty($row_user['discipliens'])){
													$count += 6.666667;
												}
												if(!empty($row_user['preson_img'])){
													$count += 6.666667;
												}
											
												if(!empty($row_user['back_img'])){
													$count += 6.666667;
												}
												if(!empty($row_user['degree'])){
													$count += 6.666667;
												}
												if(!empty($row_user['followers'])){
													$count += 6.666667;
												}
												if(!empty($row_user['follow'])){
													$count += 6.666667;
												}
												echo ceil($count);
											?>%</td>
																<td><a class="#" href="profile.php?id=<?php echo $row_user['id'];?>"><i class="icofont-eye-open"></i></a></td>
															
															</tr>
														<?php
															}
															}
														?>
														</tbody>
													</table>
													</div>
												</div>

												</div>

										</div>
									</div>
                                </div>
                                <!-- Billing & Payout  -->
                                <div class="tab-pane fade" id="billing">
									<div class="uk-width">
										<div class="setting-card">
											<h2>Billing & Payout</h2>
											<p class="mb-4">Want to charge for a course? Provide your payment info and opt in for our promotional programs </p>
											<div class="set-address">
											
												<div class="payment-methods mt-4">
													<h4>Add Payment Method</h4>
													<div class="light-bg pd-20">
														<ul class="uk-tab uk-light nav nav-tabs">
															<li class="nav-item"><a class="active" href="#visa" data-toggle="tab"><img src="images/visa-master.png" alt=""></a></li>
													
														</ul>

														<div class="tab-content">
															<!-- tab 1 -->
															<div class="tab-pane active fade show" id="visa">
																<div class="credit-card billing">
																	<h6><i class="icofont-check-circled"></i> Credit Cards</h6>
																	<figure><img src="images/resources/Credit-Card-Logos.jpg" alt=""></figure>
																	<form method="post"  action="admin/functions/add_card.php" >
																		<div class="row merged20">
																			<div class="col-lg-12 mb-4">
																				<input class="uk-input" type="number" name="card_num" placeholder="Card Number">
																			</div>
																			<input class="uk-input"  type="hidden" name="id" value="<?php echo $row['id']  ?>"  >
																			<div class="col-lg-4 mb-4">
																			<input class="uk-input" type="month" name="date" min='2023-10'value = "2023-10" >
																			</div>
																			<div class="col-lg-4">
																				<a class="number-demo" data-toggle="tooltip" title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus" href="#" aria-expanded="false">
																					<i class="icofont-question-circle"></i>
																				</a>
																				<input class="uk-input" type="number" name="s_code"  placeholder="Security Code">
																			</div>
																			<div class="col-lg-4">
																				<input class="uk-input" type="number" name="post_code" placeholder="post Code">
																			</div>
																			<div class="mt-4">
																				<button class="button primary circle" type="submit">Save Card</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>

														
														</div>
													</div>
												</div>
											</div>
										</div>	
									</div>
                                </div>
                                <!-- API Clients  -->
                                <div class="tab-pane fade" id="api">
									<div class="setting-card">
										<h2>Change Password</h2>
										<form method="post"  action="admin/functions/change_password.php" >
											<div class="row merged20">
												<div class="col-lg-12 mb-4">
													<input class="uk-input" type="password" name="password" placeholder="New Password">
												</div>
												<input class="uk-input"  type="hidden" name="id" value="<?php echo $row['id']  ?>"  >
												
												
												<div class="col-lg-12 mb-4">
													<input class="uk-input" type="password" name="c_password" placeholder="Password Confirmation">
												</div>
												<div class="mt-4">
													<button class="button primary circle" type="submit">Change Password</button>
												</div>
											</div>
										</form>
									</div>
                                </div>
                                <!-- Close Account  -->
                                <div class="tab-pane fade" id="close">
									<div class="del-account">
										<h2>Close Account</h2>
										<p class="mb-4"><b>Warning:</b> If you close your account, you will be unsubscribed from all your followers and friends, and will lose access forever.</p>
										<form method="post" action="admin/functions/delete_user.php">
											<input class="uk-input"  type="hidden" name="id" value="<?php echo $row['id']  ?>"  >
											<div class="row">
												<div class="mb-4 col-lg-6">
													<input class="uk-input" type="text"  name="password" placeholder="Enter Your Password">
												</div>
												<div class="mb-0 col-lg-6">
													<button  class="button danger icon-label circle" type="submit"><i class="icofont-trash"></i> Delete Account</button>
												</div>
											</div>	
										</form>
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