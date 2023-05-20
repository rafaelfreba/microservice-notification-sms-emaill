# MICRO SERVICE FOR SENDING NOTIFICATIONS BY SMS OR EMAIL

Project inherent to the creation of a micro service aimed at sending notifications via sms or email.

### How to use:

> 1) In app\Services\SMS\Providers edit the send method of ExampleProvider.php class;
```php
//Json according to the documentation of the service used
$body = [
   "cellNumber" => "{$cellNumber}",
   "message" => "{$message}"
];
```
> 2) In app\Services\Providers\AppServiceProvider change line 27 to:
```php
return new ExampleProvider($user, $password, $url);
```
> 3) Don't forget:
```php
use App\Services\SMS\Providers\ExampleProvider;
```
> 4) Enter API credentials in .env file:
```php
# SMS API CREDENTIALS
SMS_API_USER=
SMS_API_PASSWORD=
SMS_API_URL=
```
> 5) To run the project you can use the command:
```
php artisan serve
```
> 6) For your application to send a message, just make a http post request passing json with the cell phone number and the message, example:
```json
{
  "cellNumber":"XXXXXXXXXXX",
  "message" : "TEST!!!"
}
```
