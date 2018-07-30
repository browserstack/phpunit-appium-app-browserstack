<?php
require 'vendor/autoload.php';

class AppAutomateTest extends BrowserStackTest {

    public function testNativeApplication() {
        $el = $this->byAccessibilityId('Text Button');
        $el->click();
        sleep(2);
        $el2 = $this->byAccessibilityId('Text Input');
        $el2->click();
        sleep(2);
        $this->keys("hello@browserstack.com\n");
        sleep(5);
        $el3 = $this->byAccessibilityId('Text Output');
        printf("\n%s\n", $el3->text());
        $this->assertInstanceOf('PHPUnit_Extensions_AppiumTestCase_Element', $el);
        $this->assertTrue(strpos($el3->text(), "browserstack.com") != FALSE);
    }
}
?>
