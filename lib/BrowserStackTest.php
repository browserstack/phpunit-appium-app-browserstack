<?php

require 'vendor/autoload.php';
require 'lib/globals.php';
require_once('PHPUnit/Extensions/AppiumTestCase.php');
require_once('PHPUnit/Extensions/AppiumTestCase/Element.php');

class BrowserStackTest extends \PHPUnit_Extensions_AppiumTestCase
{
    protected static $bs_local;
    public static $browsers = array(array( 'browserName' => '', 'desiredCapabilities' => array()));
    public function setupSpecificBrowser($params)
    {
        $CONFIG = $GLOBALS['CONFIG'];
        $task_id = getenv('TASK_ID') ? getenv('TASK_ID') : 0;

        $host = $GLOBALS['BROWSERSTACK_USERNAME'] . ":" . $GLOBALS['BROWSERSTACK_ACCESS_KEY'] . "@" . $CONFIG['server'];
        $caps = $this->getDesiredCapabilities();
        if(array_key_exists("browserstack.local", $GLOBALS['CONFIG']['capabilities']) && $GLOBALS['CONFIG']['capabilities']["browserstack.local"])
        {
            $bs_local_args = array("key" => $GLOBALS['BROWSERSTACK_ACCESS_KEY']);
            self::$bs_local = new BrowserStack\Local();
            self::$bs_local->start($bs_local_args);
        }
        $this->setHost($host);
        $this->setPort(443);
        $this->setSecure(TRUE);
        $caps = isset($params['desiredCapabilities']) ? $params['desiredCapabilities'] : array();
        if (!$local && !$host && isset($params['sessionStrategy'])) {
            $params['sessionStrategy'] = 'isolated';
        }
        $this->setDesiredCapabilities($caps);
        $this->setUpSessionStrategy($params);
    }

    public static function tearDownAfterClass()
    {
        if(self::$bs_local) self::$bs_local->stop();
    }
}
foreach($GLOBALS['CONFIG']['capabilities'] as $key => $value) {
    BrowserStackTest::$browsers[0]['desiredCapabilities'][$key] = $value;
}
foreach($GLOBALS['CONFIG']['devices'][getenv('TASK_ID')] as $device) {
    BrowserStackTest::$browsers[0]['desiredCapabilities']['device'] = $device;
}
?>
