<?php

$current = "admins";
include "design/header.php";
include "design/sidebar.php";
?>

<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">admins</li>
  </ol>

</div>
<?php

if(!isset($_GET['do'])){
   include "includes/admin_view.php";
}elseif($_GET['do'] == "add"){
  include "includes/admin_add.php";
}elseif($_GET['do'] == 'edit'){
  include "includes/admin_edit.php";
}

?>

</div>


<?php
include "design/footer.php";
?>