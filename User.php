<?php
// Call connection : 

class User {
    // Initializing attributes : 
    private $id;
    private $username;
    private $email;
    private $password; 
    // Initializing Constructor:
   /* public function __construct($id,$username,$email,$password) 
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email; 
        $this ->password = $password;
    }*/
    // Setters : 
    public function setId($id) {$this->id = $id;}
    public function setUsername($username){$this->username = $username;}
    public function setEmail($email){$this->email = $email;}
    public function setPassword($password){$this->password = $password;}
    // Getters: 
    public function getId(){return $this->id;}
    public function getUsername(){return $this->username;}
    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;}

    public function addUser(){
        include 'config.php';
        try{
            $query = $con->prepare("Insert into training.user(username,email,password) values (:username , :email, :password)");
            $query->bindparam(':username',$this ->username);
            $query->bindparam(':email',$this->email);
            $query->bindparam(':password',$this->password);
            $query -> execute();
            echo " Your Data Added Successfuly ! ";

        }catch(PDOException $e){
          echo " Error Adding Data : ".  $e->getMessage();
        }

    }

}




?>