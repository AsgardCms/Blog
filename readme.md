# Blog module

[![Slack](http://slack.asgardcms.com/badge.svg)](http://slack.asgardcms.com/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c54f38d9-20fb-41e8-b2be-bdeb7144ad4b/mini.png)](https://insight.sensiolabs.com/projects/c54f38d9-20fb-41e8-b2be-bdeb7144ad4b)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AsgardCms/Blog/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/AsgardCms/Blog/?branch=master)
[![Code Climate](https://codeclimate.com/github/AsgardCms/Blog/badges/gpa.svg)](https://codeclimate.com/github/AsgardCms/Blog)

## Installation

Execute the following command in your terminal

    composer require "asgardcms/blog-module"  "dev-develop"

Or add the package to your `require` key in the `composer.json` file:

 ```json
"asgardcms/blog-module": "dev-develop"
```

Followed by a composer update

### Package migrations

Run the migrations:

``` bash
php artisan module:migrate Blog
```

## Publish package assets

``` bash
php artisan asgard:publish:module Blog
```

## Resources

- [View the changelog](CHANGELOG.md)
- [Contribute to AsgardCMS](CONTRIBUTING.md)
- [License](LICENSE.md)


## Info

All AsgardCMS modules respect [Semantic Versioning](http://semver.org/).
