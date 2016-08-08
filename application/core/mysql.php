<?php
class DB
{
    static $link;  
    
    public static function conhect()
    {
        self::$link = mysqli_connect(WS_DBSERVER, WS_DBUSER, WS_DBPASSWORD, WS_DATABASE) 
                       or die('No connect'); 
        
        mysqli_set_charset(self::$link, 'utf8');    
    }
    
}
    DB::conhect();    

    function mysqlQuery($sql, $print = false) 
    { 
     
        $result = mysqli_query(DB::$link, $sql); 
     
        if($result === false || $print) 
        { 
            $error =  mysqli_error(DB::$link); 
            $trace =  debug_backtrace(); 
            
            $head = !empty($error) ?'<b style="color:red">MySQL error: </b><br> 
            <b style="color:green">'. $error .'</b><br><br>':NULL;     
             
            $error_log = date("Y-m-d h:i:s") .' '. $head .' 
            <b>Query: </b><br> 
            <pre><span style="color:#CC0000">'. $trace[0]['args'][0] .'</pre></span><br><br>
            <b>File: </b><b style="color:#660099">'. $trace[0]['file'] .'</b><br> 
            <b>Line: </b><b style="color:#660099">'. $trace[0]['line'] .'</b>'; 
 
           die($error_log);
 
            file_put_contents(WS_ROOT .'log/mysql.log', strip_tags($error_log) ."\n\n", FILE_APPEND); 
            header("HTTP/1.1 404 Not Found"); 
            die(file_get_contents(WS_ROOT .'/404.html')); 
        } 
        else 
            return $result; 
    }

    function escapeString($data)   
    {
     
        if(is_array($data))
            $data = array_map("escapeString", $data);
        else              
            $data = mysqli_real_escape_string(DB::$link, $data);
        
        return $data;
    }