
<a href="?do=add" class="btn btn-primary m-3">Add admin</a>

<table class="table table-bordered table-striped table-hover table-dark" style="margin: auto;width:90%;">
    <thead>
        <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>address</th>
        <th>phone</th>
        <th>control</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $select_admin = "SELECT * FROM admins";
        $result_admin = $connect -> query($select_admin);
        $counter = 0;
        foreach($result_admin as $row_admin){

       
        ?>
        <tr>
        <td><?php echo++$counter;  ?></td>
        <td><?php echo$row_admin['name']  ?></td>
        <td><?php echo$row_admin['email']  ?></td>
        <td><?php echo$row_admin['address']  ?></td>

        <td><?php echo$row_admin['phone']  ?></td>
        <td>
            <a href="?do=edit&id=<?php echo$row_admin['id']?>"><i class="fa fa-edit"></i></a>
            <a href="functions/delete_admin.php?id=<?php echo$row_admin['id']?>"><i class="fa fa-trash"></i></a>
        </td>

        </tr>
        <?php  } ?>


    </tbody>
</table>