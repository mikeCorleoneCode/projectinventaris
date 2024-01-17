<?php
    if (isTheseParameterAvailable(array('name'))){
        $name=$_POST['name'];


        $stmt=$conn->prepare('SELECT name FROM categories WHERE name=?');
        $stmt->bind_param("s",$name);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0){
            $response['error']=true;
            $response['message']='Kategori '. $name .' Sudah Ada';
        }else{
            try{
                $stmt=$conn->prepare('INSERT INTO categories (name) VALUES(?)');
                $stmt->bind_param("s",$name);
                $stmt->execute();
                $stmt->close();
                $response['error']=false;
                $response['message']='success';
            }catch(Exception $e){
                $response['error']=true;
                $response['message']='Gagal';
            }
        }
    }
?>