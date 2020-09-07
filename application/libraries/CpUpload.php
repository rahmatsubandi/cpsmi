<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CpUpload
{
  var $CI;

	function __construct() {
    $this->CI =& get_instance();
    $this->CI->load->library(['upload', 'image_lib']);
  }
    
	function run($fieldName = null, $modulName = null, $isReplace = false, $isEncryptName = false, $allowedTypes = 'jpg|png|gif|pdf|doc|docx|xls|xlsx') {
		$isCreatedDir1 = true;
		$isCreatedDir2 = true;

		if ( !is_null($fieldName) && !is_null($modulName) ) {
			$path = FCPATH.'directory/'. $modulName;

			if ( !file_exists($path) ) {
				$isCreatedDir1 = mkdir($path, 0777, true);
			};

			if ( $isCreatedDir1 === true ) {
				$fullPath = FCPATH.'directory/'. $modulName .'/';
				
				if ( !file_exists($fullPath) ) {
					$isCreatedDir2 = mkdir($fullPath, 0777, true);
				};

				if ( $isCreatedDir2 === true ) {
					// Create file name
					$fileExt  = '.'.pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
					$fileName = date('YmdHis').$fileExt;

					$result = $this->set_upload( $fieldName, $modulName, $fullPath, $fileName, $isReplace, $isEncryptName, $allowedTypes );
				} else {
					$result = array( 'status' => false, 'data' => 'Failed to create directory: "'.$modulName.'/".' );
				};
			} else {
				$result = array( 'status' => false, 'data' => 'Failed to create directory: "'.$modulName.'".' );
			};
		} else {
			$result = array( 'status' => false, 'data' => 'FieldName & ModuleName are required.' );
		};

		return (object) $result;
	}
  
	function set_upload($fieldName, $modulName, $fullPath, $fileName, $isReplace, $isEncryptName, $allowedTypes = 'jpg|png|gif|pdf|doc|docx|xls|xlsx') {
		$config['upload_path']      = $fullPath;
		$config['file_name']        = $fileName;
		$config['overwrite']        = $isReplace;
		$config['encrypt_name']     = $isEncryptName;
		$config['allowed_types']    = $allowedTypes;
		$config['max_size']         = '128000';
		$config['file_ext_tolower'] = true;

		$this->CI->upload->initialize($config, true);

		if ( $this->CI->upload->do_upload($fieldName) ) {
			$uploadData = $this->CI->upload->data();

			// Create thumbnail for image only
			if ( getimagesize( $uploadData['full_path'] ) !== false ) {
				$this->set_thumbnail( $fullPath, $uploadData );
			};

			$basePath = array( 'base_path' => 'directory/'.$modulName.'/'.$uploadData['file_name'] );
			$responseData = array_merge($uploadData, $basePath);
			$result = array( 'status' => true, 'data' => (object) $responseData );
		} else {
			$errorMessage = $this->CI->upload->data()['client_name'].' '.strip_tags($this->CI->upload->display_errors());
			$result       = array( 'status' => false, 'data' => $errorMessage );
		};
		
		return (object) $result;
	}
  
	function set_thumbnail($destinationPath, $fileInfo) {
		$percentThumb = 0;
		$limitThumb   = 150;
		$LimitUse     = $fileInfo['image_width'] > $fileInfo['image_height'] ? $fileInfo['image_width'] : $fileInfo['image_height'] ;
		
		if ( $LimitUse > $limitThumb ) {
			$percentThumb  = $limitThumb / $LimitUse ;
		};

		$config['image_library']  = 'GD2';
		$config['quality']        = '100%';
		$config['thumb_marker']   = '_thumb';
		$config['create_thumb']   = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']  		    = $LimitUse > $limitThumb ? $fileInfo['image_width'] * $percentThumb : $fileInfo['image_width'];
		$config['height'] 		    = $LimitUse > $limitThumb ? $fileInfo['image_height'] * $percentThumb : $fileInfo['image_height'];
		$config['source_image']   = $fileInfo['full_path'];
		$config['new_image']      = $destinationPath;

		$this->CI->image_lib->initialize($config);
		$this->CI->image_lib->resize();
		$this->CI->image_lib->clear();
	}
}
