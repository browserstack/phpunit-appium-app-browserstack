<?php
require 'vendor/autoload.php';

class AppAutomateTest extends BrowserStackTest {

    public function testNativeApplication() {
        $el = $this->byId('com.example.android.basicnetworking:id/test_action');
        $el->click();
        sleep(2);
        $textElements = $this->elements($this->using('class name')->value('android.widget.TextView'));
        $testElement = null;
        foreach($textElements as $element) {
          if(strpos($element->text(), 'The active connection is')) {
            $testElement = $element;
          }
        }
        if($testElement == null) {
          $screenshotPath = getcwd() . '/screenshot.png';
          $handle = fopen($screenshotPath, 'w');
          $data = $this->currentScreenshot();
          fwrite($handle, $data);
          fclose($handle);
          printf("Screenshot stored at %s\n", $screenshotPath);
          printf("Cannot find the needed text view\n");
        }
        else {
          $matchedString = $testElement->text();
          $this->assertTrue(strpos($matchedString, 'The active connection is wifi') != false);
          $this->assertTrue(strpos($matchedString, 'Up and running') != false);
        }
    }
}
?>
