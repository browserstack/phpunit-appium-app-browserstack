<?php

$config_file = getenv('CONFIG_FILE');
if(!$config_file) $config_file = 'config/android/single.conf.json';
$GLOBALS['CONFIG'] = json_decode(file_get_contents($config_file), true);

// UPDATE <USERNAME>
$GLOBALS['BROWSERSTACK_USERNAME'] = getenv('BROWSERSTACK_USERNAME');
if(!$GLOBALS['BROWSERSTACK_USERNAME']) $GLOBALS['BROWSERSTACK_USERNAME'] = $GLOBALS['CONFIG']['user'];

// UPDATE <ACCESS_KEY>
$GLOBALS['BROWSERSTACK_ACCESS_KEY'] = getenv('BROWSERSTACK_ACCESS_KEY');
if(!$GLOBALS['BROWSERSTACK_ACCESS_KEY']) $GLOBALS['BROWSERSTACK_ACCESS_KEY'] = $GLOBALS['CONFIG']['key'];

?>
