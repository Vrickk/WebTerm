<?php
$uploadfullPath = "C:/xampp/htdocs/WebTerm/images/";

$imageBaseUrl = "/WebTerm/images/";

$CKEditor = $_GET['CKEditor'] ;

$funcNum = $_GET['CKEditorFuncNum'] ;


$langCode = $_GET['langCode'] ;


$url = '' ;

$message = '';

if (isset($_FILES['upload'])) {

    $name = $_FILES['upload']['name'];
    
    move_uploaded_file($_FILES["upload"]["tmp_name"], $uploadfullPath . $name);

    $url = $imageBaseUrl . $name ;
    
} else {
    $message = '업로드된 파일이 없습니다.';
}


echo "<script type='text/javascript'>; window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message')</script>";

?>