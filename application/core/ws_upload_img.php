<?php
/**
 * WS_Upload_Img - Класс загрузки изображений
 * NOTE: Requires PHP version 5 or later 
 */

class WS_Upload_Img
{
// Новая переменная $name для имени файла 
    public $error, $name, $new_name;
    public $width = 800;
    public $height = 800;    
    
    public function __construct($error)
    {
        $this->error = $error;
    }
/*
* Метод загрузки файла на сервер
* @param string $file
* @param string $dir
* @return mixed
*/
    public function uploadFile($file, $dir = 'assets/')
    {
     
        if(!empty($this->error[$_FILES[$file]['error']])) 
            return $this->error[$_FILES[$file]['error']]; 
        elseif(($extension = $this->checkFile($file)) === false)    
            return $this->error['UPLOAD_ERR_EXTENTION']; 
            
        $img = getimagesize($_FILES[$file]['tmp_name']);
            
        if($img[2] < 1 || $img[2] > 3)
            return $this->error['UPLOAD_ERR_EXTENTION'];
        elseif($img[0] > $this->width + $this->width * 0.1) 
            return $this->error['UPLOAD_ERR_WIDTH'];
        elseif($img[1] > $this->height + $this->height * 0.1) 
            return $this->error['UPLOAD_ERR_HEIGHT'];            
        else
        {
            $this->name = $this->generateFilename($file);
            $this->name .=  '.'. $extension;            
            $this->new_name  = WS_HOST . $dir . $this->name;
            $upload_name = WS_ROOT .'/'. $dir . $this->name; 

            if(move_uploaded_file($_FILES[$file]['tmp_name'], $upload_name))
                return false; 
            else  
                return $this->error['UPLOAD_ERR_UPLOAD'];    
        }
    }    
    
/*
* Метод проверки типа файла
* @param string
* @return string
*/
    public function checkFile($file)
    { 
        $extension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);  
        $valid_extensions = array('jpg', 'jpeg', 'gif', 'png');         
         return in_array($extension, $valid_extensions) ? $extension : false;
    }

/*
* Метод генерации уникального имени
* @return string
*/
    public function generateFilename($file)
    {
        return time() . strtolower(substr($_FILES[$file]['tmp_name'], -8, 4)); 
    }
}    
?>