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
	- For single tests run `composer android_single`
	- For local tests run `composer android_local`
	- For parallel tests
		- In `parallel.php` change `$run_cmd` to `composer android_parallel` 
		- `php parallel.php`
* For IOS
	- For single tests run `composer ios_single`
	- For local tests run `composer ios_local`
	- For parallel tests
		- In `parallel.php` change `$run_cmd` to `composer ios_parallel` 
		- `php parallel.php` 

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
