<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Drop Files</title>

    <link rel="stylesheet" href="dropzone/dist/dropzone.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <form action="file-upload.php" class="dropzone pretty">
        <div class="fallback">
            <input id="file" name="file" type="file" multiple />
        </div>
    </form>
    <script src="dropzone/dist/dropzone.js"></script>
</body>

</html>