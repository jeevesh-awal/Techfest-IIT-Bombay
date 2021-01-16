<?php
require_once("s3-object.php");;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Data</title>

    <link rel="stylesheet" href="dropzone/dist/dropzone.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>

<body>

    <?php
    $objects = $s3->getIterator('ListObjects', array(
        "Bucket" => $bucketName
    ));

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
                ?>
                    <tr>
                        <td><?php echo $object['Key'];
                            $name = $object['Key']; ?></td>
                        <td><?php echo $object['Size'];   ?></td>
                        <td><a target="_blank" href="<?php echo $s3->getObjectUrl($bucketName, $object['Key']); ?>" class="btn btn-outline-primary">View</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>