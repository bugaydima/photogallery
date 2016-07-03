<?php
class AdminUploadController extends AdminBase{

    public function actionIndex(){

        $userId = self::checkAdmin();
        
        $albums = Category::getCategoryGallery();
        $category = Category::getAdminCategory();

         if($_SERVER['REQUEST_METHOD'] == 'POST'){
             if (isset($_POST['data'])) {
                 $_SESSION['id_cat'] = $_POST['data'];
             }
                $uploader = new Uploader();
                $data = $uploader->upload($_FILES['file'], array(
                    'limit' => 5, //Maximum Limit of files. {null, Number}
                    'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
                    'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
                    'required' => false, //Minimum one file is required for upload {Boolean}
                    'uploadDir' => 'template/gallery/large/', //Upload directory {String}
                    'title' => array('name'), //New file name {null, String, Array} *please read documentation in README.md
                    'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
                    'perms' => null, //Uploaded file permisions {null, Number}
                    'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
                    'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
                    'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
                    'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
                    'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
                    'onRemove' => 'onFilesRemoveCallback' //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
                ));
                $img = new resizeImg('template/gallery/large/' . $_FILES['file']['name']);
                $img->resize(150, 150, 'crop');
                $img->save($_FILES['file']['name']);
                Gallery::saveImgToDB($_FILES['file']['name'], $_SESSION['id_cat']);
        }
        $title = "Загрузка изображений";
        
        $this->render('admin\adminUpload', ['title' => $title,
                                            'user'  => $userId['email']]);
        return true;
    }
}

