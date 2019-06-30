<?php
class custom_checksum extends \FileRun\Files\Plugin {
   static $localeSection = 'Custom Actions: Checksum';
   function init() {
      $this->JSconfig = [
         'title' => self::t('Checksum'),
         'iconCls' => 'fa fa-fw fa-hashtag',
         "popup" => true,
         'width' => 600, 'height' => 400,
         'requires' => ['download']
      ];
   }
   function run() {
      $data = $this->prepareRead(['expect' => 'file']);
      $fileName = $data['alias'] ?: \FM::basename($data['fullPath']);
      require($this->path."/display.php");
   }

   function displayRow($title, $value) {
    $value = S::safeHTML(S::forHTML($value));
    echo '<tr>';
        echo '<td nowrap>'.$title.'</td>';
        echo '<td>'.$value.'</td>';
      echo '</tr>';
  }
}