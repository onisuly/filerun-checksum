<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo $settings->currentVersion; ?>"/>
    <style>
        body {
            background-color: white;
            overflow: auto;
        }
    </style>
    <title><?php echo \S::safeHTML(\S::forHTML($fileName)); ?></title>
</head>
<body>
<table style="float:left;margin:10px;">
    <tr>
        <td valign="middle">
            <img src="<?php echo \FM::getFileIconURL($fileName); ?>" width="96"/>
        </td>
    </tr>
    <tr>
        <td align="center"><?php echo $fileName ?></td>
    </tr>
</table>
<br/>
<table class="niceborder" style="clear:both;margin:10px;" cellspacing="1" cellpadding="10">
    <?php $this->displayRow('File size', \FM::formatFileSize(\FM::getFileSize($data['fullPath']))); ?>
    <?php
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