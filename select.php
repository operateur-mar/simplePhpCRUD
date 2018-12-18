<?php include 'config.php' ?>


<?php
  try{
    // Prepare Statement : 
    $stmnt = $con->prepare("SELECT * FROM training.users");
    // Execute Statement ; 
    $stmnt->execute();
    $data = $stmnt->fetchAll();
    // Affect Data : ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <?php
          foreach ($data as $row) { ?>
        <tr>
            <td><?php print $row['id'] ?></td>
            <td><?php print $row['username'] ?></td>
            <td><?php print $row['email'] ?></td>
        </tr>
    <?php }
        ?>
    </table>
     <?php }catch(PDOException $e){
        echo " Error : ". $e->getMessage();
  }
  
?>


<style>
form {
  width : 300px;
}
input{
  margin : 10px 0px;
}
</style>