<?php

include "layout/header.php";
?>
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-12">
						<div class="main-wraper">
							<h4 class="main-title">Add New Course or Book</h4>
							<h6 class="mb-4">Add new course and book for sale in the <b>JOBROOM</b> Market Place</h6>
							<div class="add-credits">
								<form  method="post" action="admin/functions/add_product.php" enctype="multipart/form-data">
									<fieldset class="row merged-10">
										<div class="mb-4 col-lg-6 col-md-6 col-sm-6">
											<input class="uk-input" type="text" name="title" placeholder="Title" require>
											<input class="uk-input" type="hidden" name="id" value="<?php echo $_SESSION['user'];?>" require>
										</div>
										<div class="mb-4 col-lg-6 col-md-6 col-sm-6">
											<input class="uk-input" type="text"  name="link" placeholder="Link " require>
										</div>
										<div class="uk-margin col-lg-4 mb-4">
											<select class="uk-select" name="type">
												<option value="1">course</option>
												<option value="2">book</option>
											
											</select>
										</div>
										<div class="uk-margin col-lg-4 mb-4">
											<select class="uk-select" name="discipliens" require>
											<option disabled selected>Open this select discipliens</option>
													<?php  
													$select_d = $connect ->query("SELECT * FROM discipliens WHERE discipliens != ''");
													while($row_d=$select_d->fetch_assoc()){
													?>
													<option value="<?php echo $row_d['id']; ?>"<?php if($row['discipliens'] == $row_d['id']){echo 'selected';}   ?>><?php echo $row_d['discipliens']; ?></option>
													<?php } ?>
													</select>
											</select>
										</div>
										
										<div class="mb-4 col-lg-12">
											<textarea placeholder="description" require rows="4" name = "description"class="uk-textarea"></textarea>
										</div>
										
										<div class="mb-4 col-lg-4 col-md-6 col-sm-6">
											<label >EGP</label>
											<input class="uk-input" name ="price"type="text" placeholder="Price" require>
										</div>
										<div class="mb-4 col-lg-4 col-md-6 col-sm-6">
											<label >Cover Image</label>
											<br>
											<input name="img" type="file" require />
										</div>
									
							
								<div class="mt-3 col-lg-12">
									<button type="submit" class="button primary circle">Publish</button>
								</div>	
									</fieldset>
								</form>
								
							
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