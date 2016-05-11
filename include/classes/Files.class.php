<?php 

class Files	{

	public $output;
	private $fileName;
	private $fileType;


	function __construct() {
        
	}

	public function registerFiles($files) {
		foreach ($files as $key => $file) {
			
			$parts = explode(".",$file);
			$fileType = end($parts);
			
			if ($fileType == 'js') {
				$output = '<script src="'.$file.'" type="text/javascript" charset="utf-8"></script>';
			}elseif ($fileType == 'css') {
				$output = '<link rel="stylesheet" type="text/css" href="'.$file.'">';
			}
			echo $output;
		}
	}

}