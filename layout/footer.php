
	<figure class="bottom-mockup"><img src="images/footer.png" alt=""></figure>
	<div class="bottombar">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="">&copy; copyright All rights reserved by JOBROOM 2023</span>
				</div>
			</div>
		</div>
	</div><!-- bottombar -->
	
	
	
	<div class="popup-wraper">
		<div class="popup">
			<span class="popup-closed"><i class="icofont-close"></i></span>
			<div class="popup-meta">
				<div class="popup-head">
					<h5><i>
<svg class="feather feather-message-square" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></i> Send Message</h5>
				</div>
				<div class="send-message">
					<form method="post" class="c-form">
						<input type="text" placeholder="Enter Name..">
						<input type="text" placeholder="Subject">
						<textarea placeholder="Write Message"></textarea>
						<div class="uploadimage">
							<i class="icofont-file-jpg"></i>
							<label class="fileContainer">
								<input type="file">Attach file
							</label>
						</div>
						<button type="submit" class="main-btn">Send</button>
					</form>
				</div>
			</div>
		</div>
	</div><!-- send message popup -->
	
	<div class="side-slide">
		<span class="popup-closed"><i class="icofont-close"></i></span>
		<div class="slide-meta">
			<ul class="nav nav-tabs slide-btns">
				 <li class="nav-item"><a class="active" href="#messages" data-toggle="tab">Messages</a></li>
				
			</ul>
			<div class="tab-content">
				<div class="tab-pane active fade show" id="messages" >
					<h4><i class="icofont-envelope"></i> messages</h4>
					<a href="#" class="send-mesg" title="New Message" data-toggle="tooltip"><i class="icofont-edit"></i></a>
					<ul class="new-messages">
					<?php 
												
													$user_me = $_SESSION['user'];
													$query=mysqli_query($connect,"SELECT * FROM message WHERE 	to_user ='$user_me' ");
													foreach($query as $chat){
													
													$id_from = $chat['id'];
													$query_from=mysqli_query($connect,"SELECT * FROM users WHERE 	id ='$id_from' ");
													$show = $query_from ->fetch_assoc();
													
													?>
						<li onclick="location.href = 'messages.php?id=<?php echo$id_from?>';">
							<figure><img src="<?php 
											if(empty($show['preson_img'])){ echo 'user.jpg';}else{ echo $show['preson_img'];}
											?>" alt=""></figure>
							<div class="mesg-info">
								<span><?php echo $show['name']?></span>
								<a href="#" title=""><?php echo $chat['message']?></a>
							</div>
						</li>
						<?php }	?>
					</ul>
					<a href="#" title="" class="main-btn" data-ripple="">view all</a>
				</div>
				
			</div>
		</div>
	</div><!-- side slide message & popup -->
	
	<div class="post-new-popup">
		<div class="popup" style="width: 800px;">
			<span class="popup-closed"><i class="icofont-close"></i></span>
			<div class="popup-meta">
				<div class="popup-head">
					<h5><i>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></i>Create New Post</h5>
				</div>
				<div class="post-new">
					
					<form method="post" id="privet_post" action="admin/functions/add_post.php" enctype="multipart/form-data">
					<input type="hidden" name='id_user'value="<?php echo $_SESSION['user']; ?>" >
						<div>
						<input type="text"  class="form-control"name='title' placeholder=" Enter title" >
						</div>	
						<br>
						<div>
						<input type="radio" id="privet_post" name="type_post" value="1">
						<label for="privet_post">Privet Post</label>
						<input type="radio" id="blog" name="type_post" value="2">
						<label for="blog">Blog</label>
						<input type="radio" id="question" name="type_post" value="3">
						<label for="question">Question</label>
						</div>	
						<br>
						<div>
						<textarea id="editor"  class="form-control" placeholder="What's On Your Mind?" name="subject" ></textarea>
						</div>	
						<br>
						<div>

						<input type="file" name='img'  class="form-control"placholder=" Enter img" >
						</div>	
						<br>
						<button type="submit" class="main-btn ">Publish</button>
					</form>
					
					
					
					
					
				</div>
			</div>
		</div>
	</div><!-- New post popup -->
	
	<div class="new-question-popup">
		<div class="popup">
			<span class="popup-closed"><i class="icofont-close"></i></span>
			<div class="popup-meta">
				<div class="popup-head">
					<h5><i>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg></i> Ask Question</h5>
				</div>
				<div class="post-new">
					<form method="post" class="c-form" action="admin/functions/add_post.php" enctype="multipart/form-data">
					<input type="hidden" name='id_user'value="<?php echo $_SESSION['user']; ?>" >
						<input type="text" placeholder="Question Title" name='title'>
						<textarea placeholder="Write Question" name="subject"></textarea>
						
						<input type="hidden" id="privet_post" name="type_post" value="3">
						<div class="uploadimage">
							<i class="icofont-eye-alt-alt"></i>
							<label class="fileContainer">
								<input type="file" name='img'>Upload File
							</label>
						</div>
						
						<button type="submit" class="main-btn">Post</button>
					</form>
				</div>
			</div>
		</div>
	</div><!-- ask question -->
	
	
	
	<div class="cart-product">
		<a href="product-cart.php" title="View Cart" data-toggle="tooltip"><i class="icofont-cart-alt"></i></a>
		<span>03</span>
	</div><!-- view cart button -->
	
	<div class="chat-live">
		<a class="chat-btn" href="#" title="Start Live Chat" data-toggle="tooltip"><i class="icofont-facebook-messenger"></i></a>
		<span>07</span>
	</div><!-- chat button -->
	
	<div class="chat-box">
		<div class="chat-head">
			<h4>New Messages</h4>
			<span class="clozed"><i class="icofont-close-circled"></i></span>
			
		</div>
		<div class="user-tabs">
			<ul class="nav nav-tabs">
			<li class="nav-item"><a class="active" href="#link1" data-toggle="tab">All Friends</a></li>

		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active fade show " id="link1" >
				<div class="friend">
					<?php 
					$myuser = $_SESSION['user'];
					$select_users = $connect->query("SELECT * FROM users WHERE id = '$myuser'");
					$mass_user = $select_users ->fetch_assoc();
					$follow =explode('#', $mass_user['follow']);
					for($i = 0 ;$i <count($follow);$i++){
						$friend = $follow[$i];
						$select_friends = $connect->query("SELECT * FROM users WHERE id = '$friend'");
						$show_friend = $select_friends ->fetch_assoc();
					?>
					<a href="messages.php?id=<?php echo$show_friend['id'] ?>" target="_blank" title="" onclick="location.href = 'messages.php?id=<?php echo$friend?>';">
						<figure>
							<img width="50" src="<?php 
											if(empty($show_friend['preson_img'])){ echo 'user.jpg';}else{ echo $show_friend['preson_img'];}
											?>" alt="">
							<span class="status online"></span>
						</figure>
						
						<span><?php echo$show_friend['name'] ?></span>
						<i class=""><img src="<?php 
											if(empty($show_friend['preson_img'])){ echo 'user.jpg';}else{ echo $show_friend['preson_img'];}
											?>" alt=""></i>
					</a>
				<?php 
			} ?>
				</div>
			</div>
			
		</div>
		</div>
	
	</div><!-- chat box -->
	
	
	
		
</div>
	
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
	<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
	<script>
	$(".form_add_comment").submit(function(e){
  
  e.preventDefault();


var id_user = $(".id_user").val();
var id_post = $(".id_post").val();
var id_book = $(".id_book").val();
var comment = $(".send_comment").val();

// console.log(first_name+last_name+email+subject+message);
if(id_post){
	$.post("admin/functions/add_comment.php",{
	id_user   : id_user,
	id_post    : id_post,
	comment      : comment
},function(data){
	$(".out_comments").load(location.href + " .out_comments");
$(".num_comment").html(data);
})
}else{
	$.post("admin/functions/add_comment.php",{
	id_user   : id_user,
	id_book    : id_book,
	comment      : comment
},function(data){
	$(".out_comments").load(location.href + " .out_comments");
$(".num_comment").html(data);
})
}






setTimeout(function(){

$(".send_comment").val("");

},3000)



})
$(".send-massge").submit(function(e){
  
  e.preventDefault();


var id_user = $(".my_user").val();
var to_user = $(".to_user").val();
var message = $(".text-mass").val();




$.post("admin/functions/send_message.php",{
	id_user   : id_user,
	to_user    : to_user,
	message      : message
},function(data){
	$(".out_massage").load(location.href + " .out_massage");

})

setTimeout(function(){

$(".send_comment").val("");

},3000)

})
$(".search_user").keyup(function(){
  
 


var search = $(".search_user").val();


$.post("admin/functions/search.php",{
	search   : search

},function(data){
	$(".out_search").html(data);

})



})

function interestBlog(id , blog){
	var id_user =id;
var id_post = blog;



// console.log(first_name+last_name+email+subject+message);

$.post("admin/functions/add_interest.php",{
	id_user   : id_user,
	id_post    : id_post

},function(data){
	
$("#interest_blog").html('Interested');
})
}
function followMe(id , me){
	var id_user =id;
var id_me = me;


$.post("admin/functions/follow.php",{
	id_user   : id_user,
	id_me    : id_me

},function(data){

})
}
</script>
</body>	


</html>