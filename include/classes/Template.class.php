<?php 


class Template {


    protected $_templatePath;
    
    function __construct() {
        $this->_templatePath = "../templates/";
    }

    public function renderPartial($viewPath) {   
        // global $basePath;
        // if (0 !== strpos($viewPath, $basePath)) {
        //     $viewPath = $basePath . $viewPath;
        // }
        $viewPath = $this->_templatePath.$viewPath.'.php';


        if (file_exists($viewPath)) {

            // if ($data) {
            //     foreach ($data as $key => $val) {
            //         ${$key} = $val;
            //     }
            // }
            ob_start();
            $res = include($viewPath);
            if (is_object($res)) {
                return $res;
            }
            $viewFile = trim(ob_get_clean());
            if ($viewFile !== false) {
                return $viewFile;
            } else {
                return '';
            }
        } else {
            return 'template not found!';
        }
    }

}

