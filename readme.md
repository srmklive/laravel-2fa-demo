## Laravel with 2-factor autentication

This is a sample laravel application containing 2-factor authentication out of the box.


## Installation
* First simply clone this repo by using following command:
```
git clone https://github.com/srmklive/laravel-2fa-app.git [your-directory]
```

* Now navigate to the directory you cloned the repo into and run the following command
```
composer install
```

* Publish configuration & views:
```
php artisan vendor:publish
```

* Create .env file
```
mv .env.example .env
```

* Set application key
```
php artisan key:generate
```

* Set your database credentials.

* Migrate the databases:
```
php artisan migrate
```

## Authy API Credentials
To enable 2-factor authentication, you must have a registered developer account with [Authy](https://www.authy.com/). Once you have created an account on Authy, and registered an application. You need to add following variables in your *.env* file, and modify it accordingly to your Authy API credentials.
```
AUTHY_MODE=live
AUTHY_TEST_KEY=[YOUR_AUTHY_APP_TEST_KEY]
AUTHY_LIVE_KEY=[YOUR_AUTHY_APP_LIVE_KEY]
AUTHY_SEND_SMS=false
```

Thats it. You are done with installation. Now you have fully functional Laravel application with 2-factor authentication available out of the box. 

## Documentation

This application uses the [Authy](https://github.com/srmklive/laravel-twofactor-authentication) package. You can find the documentation for the package [here](https://github.com/srmklive/laravel-twofactor-authentication/blob/master/README.md).
