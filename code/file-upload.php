<?php
require_once("s3-object.php");
if (!empty($_FILES)) {
    $keyName = basename($_FILES["file"]['name']);
    $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
    try {
        $file = $_FILES["file"]['tmp_name'];
        $s3->putObject(
            array(
                'Bucket' => $bucketName,
                'Key' =>  $keyName,
                'SourceFile' => $file,
                'StorageClass' => 'STANDARD',
                'ACL' => 'public-read',
                'ContentType' => mime_content_type($file)
            )
        );
    } catch (S3Exception $e) {
        die('Error:' . $e->getMessage());
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
