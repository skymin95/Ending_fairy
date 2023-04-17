<?php
if (isset($_POST["submit"])) {
    $target_dir = "uploads/"; // 파일이 저장될 경로
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // 파일이 이미 존재하는지 확인
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // 파일 크기 확인 (10MB 이하로 설정)
    if ($_FILES["fileToUpload"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // 파일 형식 확인
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // 파일 업로드
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>