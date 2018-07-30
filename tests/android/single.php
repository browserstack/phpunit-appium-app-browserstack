<?php
require 'vendor/autoload.php';

class AppAutomateTest extends BrowserStackTest {

    public function testNativeApplication() {
        $el = $this->byAccessibilityId('Search Wikipedia');
        $el->click();
        $this->keys("BrowserStack");
        sleep(2);
        $textElements = $this->elements($this->using('class name')->value('android.widget.TextView'));
        $this->assertTrue(sizeof($textElements) > 0);
        $this->assertInstanceOf('PHPUnit_Extensions_AppiumTestCase_Element', $el);
    }
}
?>
