<?php
require 'vendor/autoload.php';

class AppAutomateTest extends BrowserStackTest {

    public function testNativeApplication() {
        printf("\n IN test function \n");
        $searchSelector = $this->byAccessibilityId('Test BrowserStackLocal connection');
        $searchSelector->click();
        sleep(2);
        $responseText = $this->byAccessibilityId('Response is: Up and running');
        if($responseText == null) {
            $screenshotPath = getcwd() . '/screenshot.png';
            $handle = fopen($screenshotPath, 'w');
            $data = $this->currentScreenshot();
            fwrite($handle, $data);
            fclose($handle);
            printf("Screenshot stored at %s\n", $screenshotPath);
            printf("Cannot find the Up and running response\n");
        }
        else {
              $matchedString = $responseText->text();
              $this->assertTrue(strpos($matchedString, 'Up and running') != false);
        }
    }
}
?>
