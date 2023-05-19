# MICRO SERVICE FOR SENDING NOTIFICATIONS BY SMS OR EMAIL

Project inherent to the creation of a micro service aimed at sending notifications via sms or email.


How to use:

1) In app\Services\SMS\Providers edit the send method of ExampleProvider.php class;

//json according to the documentation of the service used

$body = [
    "cellNumber" => "{$cellNumber}",
    "message" => "{$message}"
];

2) In app\Services\Providers\AppServiceProvider change line 27 to:

return new ExampleProvider($user, $password, $url);

3) Don't forget:

use App\Services\SMS\Providers\ExampleProvider;

4) To run the project you can use the command:

php artisan serve

5) For your application to send a message, just make a http post request passing json with the cell phone number and the message, example:

{
  "cellNumber":"XXXXXXXXXXX",
  "message" : "TEST!!!"
}

