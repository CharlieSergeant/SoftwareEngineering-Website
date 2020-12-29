<?php
class ResponseApi{
    public function jsonK($code,$message,$data){
        $result = array(
            "code"=>$code,
            "message"=>$message,
            "data"=>$data
        );
        return json_encode($result);
    }//jsonK
}//class
