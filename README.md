# Pay-me Laravel Example App
## _Amir Lifshitz_

[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Laravel app with:

- Payment Class manager
- routes
- ✨M testing

## Features

- Web and Api requests
- blade views

## Tech

Dillinger uses a number of open source projects to work properly:

- [Laravel Sail] - Light-weight command-line interface for interacting with Laravel's default Docker development environment
 
And of course Dillinger itself is open source with a [public repository][dill]
 on GitHub.

## Installation

Pay-me Laravel Example App requires [Composer](https://getcomposer.org/) v2+ to run.

Install the dependencies and devDependencies and start the server.

```sh
cd pay-me
cp .env-examplle .env
composer composer install --ignore-platform-reqs
cd vendor/bin
./sail up
```

DB migration :

```sh
sail artisan migrate 
```
## Host
http://localhost  
(port 80)

## PhpMyAdmin
Phpmyadmin port can be changed via docker-composer.yml.
Username and password can be changed via .env file.
(port 8085)
| Username | Password |
| ------ | ------ |
|sail    | password |
 
 
## Api JSON data

Can send a post to :
```sh
http://localhost/api/pay-me
```

DB migration :
```sh
sail php artisan migrate
```


## License

MIT

**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

    
   [Laravel Sail]: <https://laravel.com/docs/9.x/sail>
    

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
