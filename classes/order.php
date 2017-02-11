<?php
class order{
    private $order_id;
    private $prod_id;
    private $quentity;


    function insert()
    {
        require 'config.php';
        $success=false;
        $query = "insert into orders(order_id,prod_id,quentity) values(?,?,?)";
        $stmt = $mysqli->prepare($query);

        $stmt->bind_param('iii',$this->order_id,$this->prod_id, $this->quentity);

        $stmt->execute();

        if(!$stmt)
        {
            echo "preparation failed ".$mysqli->errno." : ".$mysqli->error."<br>";
        }


        else
        {
            $success=true;

        }
        return $success;
    }//insert func end


    function orderslist()
    {
        require 'config.php';

        $query = "select * from orders";

        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;


    }//orderslist func end
   

    function update($Norder_id,$Nprod_id,$Nquentity,$order_id,$prod_id)
    {
        require 'config.php';
        $success=false;
        $query = "update orders set order_id= ? , prod_id= ?, quentity=? where order_id= ? and prod_id=?";

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param('iiiii',$Norder_id,$Nprod_id,$Nquentity,$order_id,$prod_id);



        $stmt->execute();
        if($stmt->affected_rows>0)
        {


            header("Location:orderList.php");

        }else{
            echo "order not updated";
        }

    }//update func end

    function delete($order_id,$prod_id)
    {
        require 'config.php';
        $query="delete from orders where order_id=? and prod_id=? ";
        $stmt = $mysqli->prepare($query);

        $stmt->bind_param('ii',$order_id,$prod_id);
        $stmt->execute();

        if($stmt->affected_rows>0)
        {


            header("Location:orderList.php");

        }else{
            echo "order not deleted";
        }
    }//delete func end

}//class end

?>