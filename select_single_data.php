<?php include 'config.php' ?>

<form action='' method='GET'>
    <fieldset>
        <legend>Search </legend>
        <label>Search ID: </label><br/>
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
 // show Data :
 print "Username = ".$data['username']. "<br/>Email : ".$data['email'];

    }
 catch(PDOExcpetion $e){
    echo  "Error : ". $e->getMessage();
}
}
?>