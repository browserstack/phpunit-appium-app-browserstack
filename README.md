# phpunit-appAutomate-browserstack

[PHPUnit](https://phpunit.de/) Integration with BrowserStack.

![BrowserStack Logo](https://d98b8t1nnulk5.cloudfront.net/production/images/layout/logo-header.png?1469004780)

## Setup
* Clone the repo
* Install dependencies `composer install`
* Update dependencies `composer Update`
* Update `*.conf.json` & `*.php` files inside the `config/android` and `config/ios` with your [BrowserStack Username and Access Key](https://www.browserstack.com/accounts/settings) and [App Hash ID](https://www.browserstack.com/app-automate/capabilities)

## Running your tests
* For Android
	- Upload your Native App (.apk file) to BrowserStack servers using upload API:
  ```
  curl -u "username:accesskey" -X POST "https://api.browserstack.com/app-automate/upload" -F "file=@/path/to/app/file/Application-debug.apk"
  ```
  - If you do not have an .apk file and looking to simply try App Automate, [you can download our sample app and upload](https://www.browserstack.com/app-automate/sample-apps/android/WikipediaSample.apk)
to the BrowserStack servers using the above API.
  - For single tests run `composer android_single`
	- For local tests run `composer android_local`
	- For parallel tests `php tests/android/parallel.php`
* For IOS
	- Upload your Native App (.ipa file) to BrowserStack servers using upload API:

  ```
  curl -u "username:accesskey" -X POST "https://api.browserstack.com/app-automate/upload" -F "file=@/path/to/app/file/Application-debug.ipa"
  ```

	- If you do not have an .ipa file and looking to simply try App Automate, [you can download our sample app and upload](https://www.browserstack.com/app-automate/sample-apps/ios/BStackSampleApp.ipa)
to the BrowserStack servers using the above API.
	- For single tests run `composer ios_single`
	- For local tests run `composer ios_local`
	- For parallel tests `php tests/ios/parallel.php` 

## Notes
* You can view your test results on the [BrowserStack App Automate dashboard](https://www.browserstack.com/app-automate)
* You can export the environment variables for the Username and Access Key of your BrowserStack account

  ```
  export BROWSERSTACK_USERNAME=<browserstack-username> &&
  export BROWSERSTACK_ACCESS_KEY=<browserstack-access-key>
  ```

## Additional Resources
* [Customizing your tests on BrowserStack](https://www.browserstack.com/app-automate/capabilities)
* [Browsers & mobile devices for selenium-appium testing on BrowserStack](https://www.browserstack.com/list-of-browsers-and-platforms?product=app_automate)
* [Using REST API to access information about your tests via the command-line interface](https://www.browserstack.com/app-automate/rest-api)
