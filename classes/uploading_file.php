class Upload{

	public  function validateUpload($filename = null) {
       
        if(!empty($filename)) {
            
            if($_FILES["$filename"]['error'] > 0){
				$objValidation->add2Errors('uploading_error');
			}

			else if(!getimagesize($_FILES["$filename"]['tmp_name'])){
				    $objValidation->add2Errors('ensure_uploading_image');('Please ensure you are uploading an image.');
				}

			else if($_FILES["$filename"]['type'] != 'image/jpg'){
					$objValidation->add2Errors('unsupported_filetype');
				}

			else if($_FILES["$filename"]['size'] > 2400){
				    $objValidation->add2Errors('exceeds_size_limit');
				}

			else if(file_exists('uploaded/' . $_FILES["$filename"]['name'])){
					$objValidation->add2Errors('file_already_exists');
				}

			else{

				if(!move_uploaded_file($_FILES["$filename"]['tmp_name'], 'uploaded/' . $_FILES["$filename"]['name'])){
	   				$objValidation->add2Errors('uploading_error_to_destination');
					}
			}
		}

		else{
			$objValidation->add2Errors('picture_not_selected');
		}
	//public function upload()




 	} //end function bracs
	
} //end class bracs 