<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

    require_once 'connect.php';

    $search = $_POST['search'];
    if( $search =""){
        exit();
    }
 

   
    $select = $connect->query("SELECT * FROM users WHERE name LIKE '%$search%' LIMIT 5");
    foreach($select as $row){
       $id = $row['id'];
        ?>
                            <li onclick ="location.href = 'profile.php?id=<?php echo $id?>';">
								<div class="searched-user">
									<figure><img src="<?php 
											if(empty($row['preson_img'])){ echo 'user.jpg';}else{ echo $row['preson_img'];}
											?>" alt=""></figure>
									<span><?php echo $row['name']?></span>
								</div>
								
							</li>


<?php
    }
          
  

    
}
?>