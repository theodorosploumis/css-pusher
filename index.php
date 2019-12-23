<?php

include_once __DIR__ . '/vendor/autoload.php';

$css_file = file_get_contents('CSS/tachyons.min.css');

$oCssParser = new Sabberworm\CSS\Parser($css_file);
$oCssDocument = $oCssParser->parse();

echo "<ul class='tachyons-selector'>";

foreach($oCssDocument->getAllDeclarationBlocks() as $oBlock) {
  foreach($oBlock->getSelectors() as $oSelector) {

    if (strpos($oSelector, '.') !== FALSE) {
      $value = $oSelector->getSelector();
      echo "<li><div><input type='checkbox' name='tachyons_selector' value=".$value.">".$value."</div></li>";
    }
  }
}

echo "</ul>";