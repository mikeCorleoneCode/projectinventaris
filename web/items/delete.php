<?php
    if (isTheseParameterAvailable(array('itemId','name','imagePath','price'))){
        $itemId=$_POST['itemId'];
        $name=$_POST['name'];
        $imagePath=$_POST['imagePath'];
        $price=$_POST['price'];
        
        
        $stmt=$conn->prepare('SELECT itemId, name, imagePath, price FROM items WHERE itemId=?');
        $stmt->bind_param("i",$itemId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0){
            try{
                $path="Foto/".$imagePath;
                unlink($path);
                $stmt=$conn->prepare('DELETE FROM items WHERE itemId=?');
                $stmt->bind_param("i",$itemId);
                $stmt->execute();
                $stmt->close();
                $response['error']=false;
                $response['message']='success';
            }catch(Exception $e){
                $response['error']=true;
                $response['message'] = 'Error: ' . $e->getMessage();
            }

        }else{
            $response['error']=true;
            $response['message']='Data Dengan ID '.$itemId.' Tidak Ada ';
        }
    }