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
    private $res1;
    private $res2;
    
    function __get($varName){
        return $this->$varName;
    }

    function __set($varName,$value){
        $this->$varName = $value;
    }
   /* function __construct($name,$pass,$email,$job,$birtd,$address,$credit){
        
        $this->name=$name;
        $this->passwd=sha1($pass);
        $this->email=$email;
        $this->address=$address;
        $this->job=$job;
        $this->birthDay=$birtd;
        $this->creditLimit=$credit;
        
    }*/
    
     
    
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
            
            echo "failed to insert";
        }
        
    }
    function select(){
        
        global $mysqli;
        $query="select username,email from users where email=? and password=?";
        $stmt = $mysqli->prepare($query);

        if(!$stmt){
            echo "preparation failed ".$mysqli->errno." : ".$mysqli->error."<br>";
        }

        $email= $this->email;
        $pass = $this->passwd;
        
        $stmt->bind_param('ss',$email,$pass );
        $stmt->execute();   
        $result = $stmt->get_result();
        $row = $result->fetch_array();
        if($row){
            $this -> res1 = $row['username'];
            $this -> res2 = $row['email'];
            //return 1;
           echo "username = ".$row['username']."</br>";
            echo "email = ".$row['email']; 
        }
        else
            return 0;
           echo "not exist";
    }
    
    function update(){
        
        global $mysqli;
        $query="update users set creditLimit=? where username=?";
        $stmt = $mysqli->prepare($query);

        if(!$stmt){
            echo "preparation failed ".$mysqli->errno." : ".$mysqli->error."<br>";
        }

        $username = $this->name;
        $credit = $this->creditLimit;
        echo "<br>".is_int($credit)."<br>";
        echo "<br>"."name: ".$this->name."<br>";
        
        $stmt->bind_param('is',$credit,$this->name );
        //$stmt->execute();
        if($stmt->execute())
            echo "done";
        
        if($stmt->affected_rows>0 ){
            echo "done";
        }else{
            echo "failed to update ";
            
        }
    }
    
    
    
}
?>