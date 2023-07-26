<?php
$current = "blog";
include "layout/header.php";

if(!isset($_GET['id'])){
	header("location:blog.php");
}
$id_blog = $_GET['id'];
$select_blog = $connect->query("SELECT * FROM post WHERE id= '$id_blog'");
$rows = $select_blog -> fetch_assoc();

?>
	
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="offset-lg-1 col-lg-10">
						<div class="blog-detail">
							<div class="blog-title">
								<h2><?php echo $rows['title'] ;?></h2>
							</div>
							<div class="blog-details-meta">
								<figure <?php if(empty($rows['img'])){echo 'hidden';} ?>><img src="<?php echo $rows['img'] ;?>" alt=""></figure>
								<ul>
									<li><i class="">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></i><?php 
											$select_seen = $connect->query("SELECT * FROM intersted_blog WHERE id_blog = '$id_blog'");
											$rows_seen = $select_seen -> num_rows; 
											echo $rows_seen ;
										
										?> </li>
									<li><i class="">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></i> <?php echo $rows['date'] ;?></li>
<li><button class="btn btn-info" id="interest_blog" onclick="interestBlog(<?php echo $id?> , <?php echo $id_blog?>)" ><i class="icofont-plus"></i> Interest</button></li>

								</ul>
								<p>
								<?php echo $rows['subject'] ;?>
								</p>	
							
							
								<div class="tag-n-cat">
									<div class="tags">
										<span><i class=""><span><i class=""><svg class="feather feather-tag" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line y2="7" x2="7" y1="7" x1="7"/></svg></i></span></i> Post Tags:</span>
										<a title="" href="#"><?php $id_dpt= $rows['department'] ;
											$select_dpt = $connect->query("SELECT * FROM discipliens WHERE id= '$id_dpt'");
											$rows_dpt = $select_dpt -> fetch_assoc(); 
											echo $rows_dpt['discipliens'];
										
										?></a>
									
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