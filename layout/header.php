<?php 
session_start();
require "admin/functions/connect.php";
if(!isset($_SESSION['user'])){
    header("location:sign-in.php");
  }
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>JOBROOM</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    

</head>
<body>
<div class="page-loader" id="page-loader">

  <div class="loader"><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span></div>

</div>
<div class="theme-layout">
<?php 
                $id =$_SESSION['user'];
                $select =$connect ->query("SELECT * FROM users WHERE id ='$id'");
                $row =$select ->fetch_assoc();
                $user_name =$row['name'];
                $img_profile =$row['preson_img'];

                
                ?>
	<div class="responsive-header">
		<div class="logo res"><img src="images/logo.png" alt=""><span>JOBROOM</span></div>
		<div class="user-avatar mobile">
			<a href="profile.php?id=<?php echo $id;?>" title="View Profile"><img alt="" src="<?php 
            if(empty($img_profile)){ echo 'user.jpg';}else{ echo $img_profile;}
            ?>"></a>
			<div class="name">
				<h4><?php echo $user_name; ?></h4>
				<span><?php $user_email =$row['email']; echo $user_email;?></span>
			</div>
		</div>
		<div class="right-compact">
			<div class="sidemenu">
				<i>
<svg id="side-menu2" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></i>
			</div>
			<div class="res-search">
				<span>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
			</div>
			
		</div>
		<div class="restop-search">
			<span class="hide-search"><i class="icofont-close-circled"></i></span>
			<form method="post">
				<input type="text" class="search_user" placeholder="Search...">
			</form>
		</div>
	</div><!-- responsive header -->
	
	<header class="">
		<div class="topbar stick">
			<div class="logo"><img src="images/logo.png" alt="">JOBROOM</span></div>
			<div class="searches">
				<form method="post">
					<input type="text" placeholder="Search..." class="search_user">
					<button ><i class="icofont-search"></i></button>
					<span class="cancel-search"><i class="icofont-close"></i></span>
					<div class="recent-search">
						<h4 class="recent-searches">Your's Recent Search</h4>
						<ul class="so-history out_search">
							
							
						</ul>
					</div>
				</form>
			</div>
			
			<ul class="web-elements">
				<li>
					<div class="user-dp">
						<a href="profile.php?id=<?php echo $id;?>" title="">
							<img alt="" src="<?php 
            if(empty($img_profile)){ echo 'user.jpg';}else{ echo $img_profile;}
            ?>">
							<div class="name">
								<h4><?php echo $user_name; ?></h4>
							</div>
						</a>	
					</div>
				</li>
				
				<li>
					<a href="index.php" title="Home" data-toggle="tooltip">
						<i>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></i>
					</a>
				</li>
				<li>
					<a class="mesg-notif" href="#" title="Messages" data-toggle="tooltip">
						<i>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></i>
					</a>
					<span></span>
				</li>
				
				
				<li>
					<a href="#" title="">
						<i>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
						</i>
					</a>
					<ul class="dropdown">
						<li><a href="profile.php?id=<?php echo $id;?>" title=""><i class="icofont-user-alt-3"></i> Your Profile</a></li>
						<li><a href="add-new-course.php" title=""><i class="icofont-plus"></i> New Course</a></li>
						
						
						
						<li><a href="settings.php" title=""><i class="icofont-gear"></i> Setting</a></li>
						<li><a href="privacy-n-policy.php" title=""><i class="icofont-notepad"></i> Privacy</a></li>
						<li><a class="dark-mod" href="#" title=""><i class="icofont-moon"></i> Dark Mode</a></li>
						<li class="logout"><a href="admin/functions/signout.php" title=""><i class="icofont-power"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
		
	</header><!-- header -->
	

	
	<section>
		<div class="white-bg">
			<div class="container-fluid">
				<div class="menu-caro">
					<div class="row">
						<div class="col-lg-2">
							<div class="sidemenu">
								<i>
	<svg id="side-menu" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></i>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="page-caro">
								<div class="link-item">
									<a class="<?php if($current == 'index'){ echo 'active';}?>" href="index.php" title="">
										<i class="">
											<svg class="feather feather-zap" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
										</i>
										<p>Newsfeed</p>
									</a>
								</div>

								<div class="link-item">
									<a href="courses.php" title="" class="<?php if($current == 'course'){ echo 'active';}?>">
										<i class="">
											<svg class="feather feather-airplay" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"/><polygon points="12 15 17 21 7 21 12 15"/></svg></i>
										<p>Courses</p>
									</a>
								</div>
								<div class="link-item">
									<a href="books.php" title="" class="<?php if($current == 'book'){ echo 'active';}?>">
										<i class="">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg></i>
										<p>Books</p>
									</a>
								</div>
								<div class="link-item">
									<a href="blog.php" title="" class="<?php if($current == 'blog'){ echo 'active';}?>">
										<i class=""><svg class="feather feather-layout" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><rect ry="2" rx="2" height="18" width="18" y="3" x="3"/><line y2="9" x2="21" y1="9" x1="3"/><line y2="9" x2="9" y1="21" x1="9"/></svg></i>
										<p>Blog</p>
									</a>
								</div>
								<div class="link-item">
									<a href="Q-A.php" title="" class="<?php if($current == 'ask'){ echo 'active';}?>">
										<i class="">
											<svg class="feather feather-users" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle r="4" cy="7" cx="9"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
										</i>
										<p>Question</p>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="user-inf">
								<div class="folowerz">Followers: <?php 

								$arr = explode("#",$row['followers']);
								$num = count($arr);
								echo $num;
								?></div>
								
							</div>	
						</div>
					</div>
				</div>	
			</div>
		</div>	
	</section><!-- carousel menu -->
	