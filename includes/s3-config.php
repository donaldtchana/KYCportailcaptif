<?php


$allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp", "eps", "svg", "pdf", "txt", "docx", "pptx", "zip", "rar", "tar");

$allowedImageExtensions = array("jpg", "jpeg", "png", "gif", "webp", "svg");

function getMainFolderName($folder,$table){

    if($folder == "other"){
        $main_folder = "others";
    }else{
        $main_folder = "";
    }

    return $main_folder;

}

function uploadToS3($KeyFile,$fileTmp,$fileContent="",$private=''){
    global $dir;
		$sub_folder = explode("/",$KeyFile,2);
		$folder = getMainFolderName($sub_folder[0],"");

		if(empty($fileContent)){
			move_uploaded_file($fileTmp,"$dir/$folder/$KeyFile");
		} else {
			file_put_contents("$dir/$folder/$KeyFile", $fileContent);
		}
		return true;

}
function allowed_image_extensions(){

    return array("jpg", "jpeg", "png", "gif", "webp", "svg");

}
function allowed_video_extensions(){

    return array("mp4","m4v");

}


?>