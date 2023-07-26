<?php
$id = $_GET['id'];
$select_edit = $connect -> query("SELECT * FROM admins WHERE id = '$id'");
$row_edit = $select_edit -> fetch_assoc();


?>
<form method="post" action="functions/edit_admin.php" style="width: 90%;margin:auto;">
<input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-group">

    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" value="<?php echo$row_edit['name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Name">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">password</label>
    <input type="password" name="password"  class="form-control" id="exampleInputEmail1" placeholder="password" >
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="<?php echo$row_edit['email'] ?>" class="form-control" id="exampleInputEmail1" placeholder="email">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="number" name="phone" value="<?php echo$row_edit['phone'] ?>" class="form-control" id="exampleInputEmail1" placeholder="phone">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">address</label>
    <input type="text" name="address" value="<?php echo$row_edit['address'] ?>" class="form-control" id="exampleInputEmail1" placeholder="address">
  </div>


<input type="submit" name="submit" class="btn btn-primary" value="Edit Admin">

</form>
<br>