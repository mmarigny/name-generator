# Name-Generator [![Build Status](https://travis-ci.org/mmarigny/name-generator.svg?branch=master)](https://travis-ci.org/mmarigny/name-generator)

Create names based on lists of firstname and lastname categorized by country and gender

Genère des noms aléatoires basé sur des listes de prénom et nom de famille catégorisé par pays et sexe
La liste des prenoms et noms français les plus courants est fourni dans le package


Installation
------------

#### Install composer : [how to install composer](https://getcomposer.org/download/)

### Edit your composer.json
  1. Adding package to require in your composer.json:

   ``` json
    {
        "require": {
            "mmarigny/name-generator": "~0.3"
        }
    }
    ```
  2. Run ```composer install```


Usage 
-----

```php
use Mmarigny\NameGenerator\Generator;
$name = $generator->getName();
print_r($name);
```

#### output
    ```Array
    (
        [firstname] => Laurine
        [lastname] => BEL
        [gender] => female
        [country] => FR
    )
    ```
#### Contact: melvyn.marigny@gmail.com
