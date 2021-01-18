<?php
error_reporting(0);
require_once("s3-object.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Data</title>
    <link rel="stylesheet" href="dropzone/dist/dropzone.css" />
</head>

<body>
    <?php
    $objects = $s3->getIterator('ListObjects', array("Bucket" => $bucketName));
    ?>
    <div>
        <table>
            <thead>
                <tr>
                    <th>File</th>
                    <th>File Size (Bytes)</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($objects as $object) {
                    $file_name = $object['Key'];
                    $file_size = $object['Size'];
                    $object_url = $s3->getObjectUrl($bucketName, $file_name);
                ?>
                    <tr>
                        <td><?php echo $file_name; ?></td>
                        <td><?php echo $file_size;   ?></td>
                        <td><a target="_blank" href="<?php echo $object_url; ?>">View</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
