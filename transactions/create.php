<?php
    if (isTheseParameterAvailable(array('quantity','totalPrice'))){
        
        $quantity=$_POST['quantity'];
        $totalPrice=$_POST['totalPrice'];
        
        
        try{
            $stmt=$conn->prepare('INSERT INTO transactions (quantity,totalPrice,timestamp) VALUES(?,?,now())');
            $stmt->bind_param("id",$quantity,$totalPrice);
            $stmt->execute();
            $stmt->close();
            $response['error']=false;
            $response['message']='success';
        }catch(Exception $e){
            $response['error']=true;
            $response['message']='Gagal'. $e->getMessage();
        }
    }
    else{
        $response['error']=true;
        $response['message']='Gagal';   
    }
?>