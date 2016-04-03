<?php
/**
 * Description of resize
 *
 * @author Dima
 */
class resizeImg {
    //дескриптор изображения
    private $img;
    //тип изображения
    private $type;
    //размер изображения по ширине
    private $width;
    //размер изображения по высоте
    private $height;
    //изображение после ресайза
    private $resImg;
    
    const WIDTH = 150;
    const HEIGHT = 150;
    const IMAGE_EXT = '.jpg';
    const DIR_SAVE = 'template/gallery/small';
    
    public function __construct($path) {
        if (!file_exists($path)) {
            throw new Exception("Данного файла нет");
        }
        $this->type = $this->getType($path);
        
        switch ($this->type){
            case IMAGETYPE_JPEG :
                $img = imagecreatefromjpeg($path);
                break;    
            case IMAGETYPE_PNG :
                $img = imagecreatefrompng($path);
                break;    
            case IMAGETYPE_PNG :
                $img = imagecreatefrompng($path);
                break;    
            case IMAGETYPE_BMP :
                $img = imagecreatefromwbmp($path);
                break;    
            default : $img = false;
        }
        $this->img = $img;
        if (!$this->img) {
            throw new Exception('Не удалость создать дескриптор изображения');
        }
        $this->width = imagesx($this->img);
        $this->height = imagesy($this->img);
    }
    
    private function getType($path){
        if (!function_exists('exif_imagetype')) {
            throw new Exception('Не подключено расширение exif_imagetype в php.ini');
        }
        return exif_imagetype($path);
    }
    public function resize($newWidth = self::WIDTH, $newHeight = self::HEIGHT, $option = 'width') {
        $arr = $this->getSizes($newWidth,$newHeight,$option);


        $this->imgRes = imagecreatetruecolor(round($arr['width']), round($arr['height']));

        imagecopyresampled($this->imgRes, $this->img, 0, 0, 0, 0, round($arr['width']), round($arr['height']), $this->width,$this->height);

        if($option == 'crop') {
                $w = round($arr['width']);
                $h = round($arr['height']);

                $sx = ($w/2)-($newWidth/2);
                $sy = ($h/2) - ($newHeight/2);

                $img = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($img, $this->imgRes, 0, 0, $sx, $sy, $newWidth, $newHeight, $newWidth, $newHeight);

                $this->imgRes = $img;
        }

    }
    private function getSizes($newWidth,$newHeight,$option) {
		
        switch($option) {
                case 'width':
                        $width = $newWidth;
                        $height = $this->getHeight($newWidth);
                break;
                case 'height':
                        $width = $this->getWidth($newHeight);
                        $height = $newHeight;
                break;
                case 'auto' :
                        $arr = $this->getAuto($newWidth,$newHeight);
                        $width = $arr['w'];
                        $height = $arr['h'];
                break;
                case 'crop' :
                        $arr = $this->getCrop($newWidth,$newHeight);
                        $width = $arr['w'];
                        $height = $arr['h'];
                break;
                case 'exact' :
                        $width = $newWidth;
                        $height = $newHeight;
                break;
        }
    return array('width'=>$width,'height'=>$height);
    }
    
    private function getHeight($newWidth) {
        $k = $this->height / $this->width;//0.75
        return $newWidth * $k;
    }
        
    private function getWidth($newHeight) {
        $k = $this->width / $this->height;//0.56
        return $newHeight * $k;
    }    
        
    private function getAuto($newWidth,$newHeight) {
		
        if($this->width > $this->height) {
                $resWidth = $newWidth;
                $resHeight = $this->getHeight($newWidth);
        }
        elseif($this->width < $this->height) {
                $resWidth = $this->getWidth($newHeight);
                $resHeight = $newHeight;
        }
        else {
                $resWidth = $newWidth;
                $resHeight = $newHeight;
    }
        return array('w'=>$resWidth,'h'=>$resHeight);
    }
    
    private function getCrop($newWidth,$newHeight) {

        $kh = $this->height  / $newHeight;
        $kw = $this->width / $newWidth;

        if($kh < $kw) {
                $res_k  = $kh;
        }
        else {
                $res_k = $kw;
        }
        return array('w'=>($this->width/$res_k),'h'=>($this->height/$res_k));
    }
    public function save($path = FALSE,$quality = 100) {

        if(!$path) {
                $str = md5(microtime());
                $name = substr($str,0,10);
                $ext = self::IMAGE_EXT;
                $path = $name . $ext;
                var_dump($path);
        }
        else {
                $ext = strtolower(strrchr($path,'.'));
        }

        switch($ext) {
                case '.jpg':
                        imagejpeg($this->imgRes,self::DIR_SAVE.'/'.$path,$quality);
                break;
                case '.png':

                        ///70 100
                        ///x 9
                        $quality = round(($quality*9)/100);
                        $quality  = 9 - $quality;
                        //echo $quality;
                        imagepng($this->imgRes,self::DIRSAVE.'/'.$path,$quality);
                break;
                case '.gif':
                        imagegif($this->imgRes,self::DIRSAVE.'/'.$path);
                break;

                imagedestroy($this->imgRes);
                imagedestroy($this->img);
        }

    }    
}
