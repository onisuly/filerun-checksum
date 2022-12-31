<?php

class custom_checksum extends \FileRun\Files\Plugin
{
    static $localeSection = 'Custom Actions: Checksum';

    function init()
    {
        $this->JSconfig = [
            'title' => self::t('Checksum'),
            'iconCls' => 'fa-hashtag',
            "popup" => true,
            'width' => 600, 'height' => 400,
            'requires' => ['download']
        ];
        $this->settings = [
            [
                'key' => 'algorithm',
                'title' => self::t('Hashing algorithm'),
                'comment' => self::t('Add multiple algorithms splited by semicolon, like: md5;sha1;sha256;sha512;crc32')
            ]
        ];
    }

    function isDisabled()
    {
        return (strlen(self::getSetting('algorithm')) == 0);
    }

    function run()
    {
        $data = $this->prepareRead(['expect' => 'file']);
        $fileName = $data['alias'] ?: \FM::basename($data['fullPath']);
        require($this->path . "/display.php");
    }

    function displayRow($title, $value)
    {
        $value = S::safeHTML(S::forHTML($value));
        echo '<tr>';
        echo '<th scope="row">' . $title . '</th>';
        echo '<td>' . $value . '</td>';
        echo '</tr>';
    }
}