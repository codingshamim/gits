<?php
$data = array();
if(isset($_FILES['upload']['name']))
{
    $fileName = $_FILES['upload']['name'];
    $filePath  = "files/".$fileName;
    $ext == strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    if($ext == 'jpg' || $ext = 'png' || $ext = 'jpeg'){
        if(move_uploaded_file($_FILES['upload']['tmp_name'],$filePath)){
            $data['file'] = $fileName;
            $data['url'] = $filePath;
            $data['uploaded']= 1;
        }else{
            $data['uploaded']= 0;
            $data['error']['message']= 'Error !'; 

        }
    }else{
        $data['uploaded']= 0;
        $data['error']['message']= 'Invalid Extention'; 
    }
}
echo json_encode($data);
?>