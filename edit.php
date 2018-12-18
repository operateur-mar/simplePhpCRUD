<?php include 'config.php' ?>

<form action='' method='GET'>
    <fieldset>
        <legend>Search to Edit</legend>
        <label>Search ID to Edit : </label><br/>
        <input type="text" name="id">
        <input type="submit">
    </fieldset>
</form>
<?php 
if(isset($_GET['id'])){
    try {
 // Prepare Statement : 
 $stmnt = $con->prepare("SELECT * FROM training.users where id = :id");
 // Bind Parameters : 
 $stmnt->bindparam(':id',$_GET['id']);
 // Execute Statement ; 
 $stmnt->execute();
 $data = $stmnt->fetch();
 // Affect Data :
    }
 catch(PDOExcpetion $e){
    echo  "Error : ". $e->getMessage();
}
 ?>
    <form action='' method='POST'>
        <fieldset>
            <legend>Edit</legend>
            <input type="text" name="id" hidden value="<?php print $data['id'] ?>">
            <input type="text" name="username" value="<?php print $data['username'] ?>">
            <input type="email" name="email" value="<?php print $data['email'] ?>">
            <input type="password" name="password" value="<?php print $data['password'] ?>">
            <input type="submit">
        </fieldset>
    </form>

   <?php 
    if(isset($_POST['username'])){
        try{
            // Prepare Statement : 
            $stmnt = $con->prepare("UPDATE training.users SET 
                                    username = :username, email = :email,
                                    password = :password WHERE id=:id");
            // Bind Parameters : 
            $stmnt->bindparam(':username',$_POST['username']);
            $stmnt->bindparam(':email',$_POST['email']);
            $stmnt->bindparam(':password',$_POST['password']);
            $stmnt->bindparam(':id',$_POST['id']);
            // Execute Statement ; 
            $stmnt->execute();
            echo " Data Changed Successfuly :) ";

    } catch(PDOExcpetion $e){
        echo  "Error : ". $e->getMessage();
    }
 }
}
 ?>









<style>
form {
  width : 150px;
}
input{
  margin : 10px 0px;
}