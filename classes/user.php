<?php
require 'config.php';
class users{
    
    private $id;
    private $name;
    private $birthDay;
    private $job;
    private $email;
    private $address;
    private $passwd;
    private $creditLimit;
    
    function __get($varName){
        return $this->$varName;
    }

    function __set($varName,$value){
        $this->$varName = $value;
    }
    function __construct($name,$pass,$email,$job,$birtd,$address,$credit){
        
        $this->name=$name;
        $this->passwd=sha1($pass);
        $this->email=$email;
        $this->address=$address;
        $this->job=$job;
        $this->birthDay=$birtd;
        $this->creditLimit=$credit;
        
    }
    
    function insert(){
        
        global $mysqli;
        $query = "insert into users values(NULL,?,?,?,?,?,?,?)";
        $stmt = $mysqli -> prepare($query);
        if(!$stmt){
            echo "preparation failed ".$mysqli->errno." : ".$mysqli->error."<br>";
        }

        $username = $this->name;
        $pass = $this->passwd;
        $email = $this->email;
        $address = $this->address;
        $job = $this->job;
        $birtd = $this->birthDay;
        $credit = $this->creditLimit;
        
        $stmt->bind_param('sssssss',$username,$pass,$email,$job,$birtd,$address,$credit);
        $stmt->execute();
        
        if($stmt->affected_rows>0){
            
            echo("done");
        }else{
            
            echo "failed to insert".$stmt->errno." : ".$stmt->error."<br>";
            //echo ("failed to insert");
        }
        
    }
    function select(){
        
        global $mysqli;
        $query="select username,email from users where username=? and password=?";
        $stmt = $mysqli->prepare($query);

        if(!$stmt){
            echo "preparation failed ".$mysqli->errno." : ".$mysqli->error."<br>";
        }

        $username = $this->name;
        $pass = $this->passwd;
        
        $stmt->bind_param('ss',$username,$pass );
        $stmt->execute();   
        $result = $stmt->get_result();
        $row = $result->fetch_array();
        if($row){
           echo "username = ".$row['username']."</br>";
            echo "email = ".$row['email']; 
        }
        else
            echo "not exist";
    }
    
    
    
}
?>