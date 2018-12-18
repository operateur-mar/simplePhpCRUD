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
<!-- FORM -->
<form action='' method='POST'>
  <fieldset>
    <legend>Delete Data</legend>
    <label>Type the number you want to delete : </label><br/>
    <input type="text" name="id" ><br/>
    <input type="submit" value="Delete Data">

  </fieldset>
</form>
<?php
if(isset($_POST['id'])){
  try{
    // Prepare Statement : 
    $stmnt = $con->prepare("DELETE from training.users
                            where id=:id");
    // Bind Parameters : 
    $stmnt->bindparam(':id',$_POST['id']);
    // Execute Statement ; 
    $stmnt->execute();
    echo " Data Deleted Successfuly :) ";
  }catch(PDOException $e){
        echo " Error : ". $e->getMessage();
  }
  }

?>



    
</body>
<style>
form {
  width : 300px;
}
input{
  margin : 10px 0px;
}
</style>
</html>