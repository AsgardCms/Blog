# Blog module

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c54f38d9-20fb-41e8-b2be-bdeb7144ad4b/mini.png)](https://insight.sensiolabs.com/projects/c54f38d9-20fb-41e8-b2be-bdeb7144ad4b)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AsgardCms/Blog/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/AsgardCms/Blog/?branch=master)
[![Code Climate](https://codeclimate.com/github/AsgardCms/Blog/badges/gpa.svg)](https://codeclimate.com/github/AsgardCms/Blog)

## Installation

Execute the following command in your terminal

    composer require "asgardcms/blog-module"  "dev-master"
    
Or add the package to your `require` key in the `composer.json` file:
 		 
 ```json
"asgardcms/blog-module": "dev-master"
```
 		 
Followed by a composer update

### Package migrations

Run the migrations:

``` bash
php artisan module:migrate Blog
```
