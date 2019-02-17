<?php

use yii\helpers\Json;

/**
 * @var array $data
 * @var array $yKeys
 * @var array $labels
 * @var array $lineColors
 * @var array $pointFillColors
 * @var string $element
 * @var string $xKey
 * @var string $yMin
 * @var string $xLabels
 * @var string $hideHover
 * @var string $yLabelFormat
 * @var string $resize
 * @var string $constructor
 * @var integer $gridTextSize
 * @var array $js_options
 */
/*
$dataJson = Json::encode($data);
$yKeysJson = Json::encode($yKeys);
$labelsJson = Json::encode($labels);
$lineColorsJson = Json::encode($lineColors);
$pointFillColorsJson = Json::encode($pointFillColors);
*/
$element = $js_options['element'];
$constructor = $js_options['constructor'];

unset($js_options['constructor']);
?>

<div id="<?= $element ?>"></div>
<?php
$options = [];
foreach ($js_options as $key=>$val) {
    if ($val) {
        $key = strtolower($key);
        $options[] = "{$key}:".Json::encode($val);
    }
}
$opt = implode(',',$options);
$options = Json::encode($js_options);
$js = <<< JS
window.{$element} = Morris.{$constructor}({
  {$opt}  
});

JS;
//var_dump($js); die();

$this->registerJs($js);