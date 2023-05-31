# MICRO SERVICE FOR SENDING NOTIFICATIONS BY SHORT MESSAGE SERVICE (SMS) OR E-MAIL

Project inherent to the creation of a micro service aimed at sending notifications via short message service (sms) or e-mail.

### How to use SMS:

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
> 5) For your application to send a message, just make a http post request passing json with the cell phone number and the message, example:
```json
{
  "cellNumber":"XXXXXXXXXXX",
  "message" : "TEST!!!"
}
```
### How to use E-MAIL:

> 1) Enter SERVER SMTP credentials in .env file:
```php
# SERVER SMTP CREDENCIALS
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
```
> 2) For your application to send a e-mail, just make a http post request passing json, example:
```json
{
  "subject" : "Welcome!",
  "name" : "John Doe",
  "email" : "johndoe@test.com",
  "message" : "Welcome to the e-mail notification microservice!!!"
}
```
> 3) Customize the email template in resources\views\email.blade.php, the data can be accessed according to the example:
```blade
{{ $data['main']['subject'] }}
{{ $data['main']['name'] }}
{{ $data['main']['email'] }}
{{ $data['main']['message'] }}
```

### For to test the project type the commands in different terminals:
```php
php artisan serve
```

```php
php artisan queue:work
```

