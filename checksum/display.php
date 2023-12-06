<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <title><?php echo \S::safeHTML(\S::forHTML($fileName)); ?></title>
</head>
<body>
<br/>
<table class="table table-striped">
    <?php
    $this->displayRow('File size', \FM::formatFileSize(\FM::getFileSize($data['fullPath'])));
    $algorithmList = explode(';', self::getSetting('algorithm'));
    foreach ($algorithmList as $algorithm) {
        $algorithm = trim($algorithm);
        $checksum = hash_file(strtolower($algorithm), $data['fullPath']);
        $this->displayRow(strtoupper($algorithm), $checksum);
    }
    ?>
</table>
</body>
</html>