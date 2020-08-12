<?php
include 'include/db.php';
include 'include/header.php';


{
    $sql =mysqli_query($conn,"
    select u.id as user_id, concat(u.first_name, ' ',u.last_name) as full_name, tu.*, t.*,
    GROUP_CONCAT(t.name) as 'team'
        from users u
        left join teams_users tu
        on tu.user_id = u.id
        left join teams t
        on tu.team_id = t.id
        where 1
        GROUP BY u.id
        order by u.id ASC
    ");
  
  if($sql === FALSE) 
  { 
      die(mysqli_error()); // TODO: better error handling
  }
?>

<div class="container">
<div class="col-md-12 top_head">
</div>

<div class="row ">
<div class="col-md-3"></div>
    <div class="col-md-6 main_table panel panel-primary">
    <div class="panel panel-heading">
    <h2 class="top_text">Teams Detail</h2>
    </div>
        <table class="table table-bordered table-hoverd">
         <thead>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Teams</th>
            </tr>
         </thead>


   <?php
while($resultSet = mysqli_fetch_assoc($sql))

  {
    ?>
    <tbody>
  <tr>
    <td><?= $resultSet['user_id'];?> </td>
    <td><?= $resultSet['full_name'];?></td>
    <td><?= $resultSet['team'];?></td>
   

  </tr>
  </tbody>

    <?php
  }
	   } 
 ?>

        </table>
    </div>
</div>
</div>