<?php include 'config.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
<!-- Form --> 
<form action='' method='POST'>
  <fieldset>
    <legend>Add Data</legend>
    <input type="text" name="username" placeholder="Type Username"><br/>
    <input type="email" name="email" placeholder="Type Email"><br/>
    <input type="password" name="password" placeholder="Type Password"><br/>
    <input type="submit" value="Add Data">

  </fieldset>
</form>

<?php
if(isset($_POST['username'])){
  try{
    // Prepare Statement : 
    $stmnt = $con->prepare("Insert Into 
                            training.users(username,email,password)
                            values(:username,:email,:password)");
    // Bind Parameters : 
    $stmnt->bindparam(':username',$_POST['username']);
    $stmnt->bindparam(':email',$_POST['email']);
    $stmnt->bindparam(':password',$_POST['password']);
    // Execute Statement ; 
    $stmnt->execute();
    echo " Data Added Successfuly :) ";
  }catch(PDOException $e){
        echo " Error : ". $e->getMessage();
  }
  }

?>

  
</body>
<style>
form {
  width : 150px;
}
input{
  margin : 10px 0px;
}
</style>
</html>