# Handwriting.io PHP API Wrapper 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/handwriting.svg?style=flat-square)](https://packagist.org/packages/nickcheek/handwriting)
[![Build Status](https://img.shields.io/travis/nickcheek/handwriting/master.svg?style=flat-square)](https://travis-ci.org/nickcheek/handwriting)
[![Quality Score](https://img.shields.io/scrutinizer/g/nickcheek/handwriting.svg?style=flat-square)](https://scrutinizer-ci.com/g/nickcheek/handwriting)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/handwriting.svg?style=flat-square)](https://packagist.org/packages/nickcheek/handwriting)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require nickcheek/handwriting
```

## Usage
You can use renderPNGImage(), renderPNGString(), or renderPDF()
``` php
use Nickcheek\Handwriting\Writer;

$handwriting = new Writer($key, $secret);

//get random font
$random = $handwriting->getAllHandwriting(['limit'=> 50,'offset'=>1,'order_dir'=>'asc','order_by'=>'title']);

//build the url
$build = $handwriting->text('Testing the handwriting.io library')
                    ->font($random[array_rand($random)]->id)
                    ->build();

echo $handwriting->renderPNGImage($build);
```
![Render](http://nickcheek.com/images/example.png)
### Builder Class
The builder class allows you to inject the settings you'd like for your image in a chainable format.
``` php
$build = $handwriting->text('text to output')
            ->font($fontID)
            ->height('50px')
            ->width('10px')
            ->size('25px')
            ->lineSpace()
            ->lineSpaceVariance()
            ->wordSpaceVariance()
            ->randomSeed()
            ->color()
            ->build();
```
Check [the docs](http://handwriting-api-docs.s3-website-us-east-1.amazonaws.com/#handwritings) if you'd like more information.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nick@nicholascheek.com instead of using the issue tracker.

## Credits

- [Nicholas Cheek](https://github.com/nickcheek)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

