<?php
    require_once 'connection.php';
    
    $response=array();

    if (isset($_GET['apicall'])){
        switch ($_GET['apicall']){
            case 'itemview' :
                require_once './items/read.php';
                break;
            case 'itemcreate' :
                require_once './items/create.php';
                break;
            case 'itemupdate' :
                require_once './items/update.php';
                break;
            case 'itemdelete' :
                require_once './items/delete.php';
                break;
            case 'categoryview' :
                require_once './category/read.php';
                break;
            case 'categorycreate' :
                require_once './category/create.php';
                break;
            case 'transactionview' :
                require_once './transactions/read.php';
                break;
            case 'transactioncreate' :
                require_once './transactions/create.php';
                break;
                    default :
                $response['error']=true;
                $response['message']='Invalid Operation Called';
            break;
        }
    }else{
        $response['error']=true;
        $response['message']='Invalid API Call';
    }
    if($response){
        echo json_encode($response);
    }

    function isTheseParameterAvailable($params){
        foreach($params as $param){
            if (!isset($_POST[$param])){
                return false;
            }
        }
        return true;
    }