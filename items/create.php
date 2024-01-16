<?php
    if (isTheseParameterAvailable(array('name','imagePath','price'))){
        
        $name=$_POST['name'];
        $imagePath=$_POST['imagePath'];
        $price=$_POST['price'];
        
        try{
            $stmt=$conn->prepare('INSERT INTO items (name,imagePath,price) VALUES(?,?,?)');
            $stmt->bind_param("ssd",$name,$imagePath,$price );
            $stmt->execute();
            $stmt->close();
            $response['error']=false;
            $response['message']='success';
        }catch(Exception $e){
            $response['error']=true;
            $response['message']='Gagal';
        }
    }
    else{
        $response['error']=true;
        $response['message']='Gagal';   
    }
?>