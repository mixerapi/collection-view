# MixerAPI CollectionView

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mixerapi/collection-view.svg?style=flat-square)](https://packagist.org/packages/mixerapi/collection-view)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE.txt)
[![Build](https://github.com/mixerapi/collection-view/workflows/Build/badge.svg?branch=master)](https://github.com/mixerapi/collection-view/actions)
[![Coverage Status](https://coveralls.io/repos/github/mixerapi/collection-view/badge.svg?branch=master)](https://coveralls.io/github/mixerapi/collection-view?branch=master)
[![MixerApi](https://mixerapi.com/assets/img/mixer-api-red.svg)](https://mixerapi.com)
[![CakePHP](https://img.shields.io/badge/cakephp-%3E%3D%204.0-red?logo=cakephp)](https://book.cakephp.org/4/en/index.html)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.2-8892BF.svg?logo=php)](https://php.net/)

!!! warning ""
    This is an alpha stage plugin.

A simple Collection View for displaying configurable pagination meta data in JSON or XML collection responses. Read 
more at [MixerAPI.com](https://mixerapi.com).

## Installation 

!!! info ""
    You can skip this step if MixerAPI is installed.

```console
composer require mixerapi/collection-view
bin/cake plugin load MixerApi/CollectionView
```

Alternatively after composer installing you can manually load the plugin in your Application:

```php
# src/Application.php
public function bootstrap(): void
{
    // other logic...
    $this->addPlugin('MixerApi/CollectionView');
}
```

## Setup

Your controllers must be using the `RequestHandler` component. This is typically loaded in your `AppController`.

```php
# src/Controller/AppController.php
public function initialize(): void
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
    // other logic... 
}
```

## Usage

That's it, you're done. Perform `application/xml` or `application/json` requests as normal. You may also request by 
`.xml` or `.json` extensions (assuming you've enabled them in your `config/routes.php`). This plugin will only modify 
collections (e.g. controller::index action) requests, not item (e.g. controller::view action) requests. 

<details><summary>JSON sample</summary>
  <p>
  
```json
{
    "collection": {
        "url": "\/actors",
        "count": 2,
        "total": 20,
        "next": "\/?page=2",
        "prev": "",
        "first": "",
        "last": "\/?page=10"
    },
    "data": [
        {
            "id": 1,
            "first_name": "PENELOPE",
            "last_name": "GUINESS",
            "modified": "2006-02-15T04:34:33+00:00",
            "films": [
                {
                    "id": 1,
                    "title": "ACADEMY DINOSAUR",
                    "description": "A Epic Drama of a Feminist And a Mad Scientist who must Battle a Teacher in The Canadian Rockies",
                    "release_year": "2006",
                    "language_id": 1,
                    "rental_duration": 6,
                    "length": 86,
                    "rating": "PG",
                    "special_features": "Deleted Scenes,Behind the Scenes",
                    "modified": "2006-02-15T05:03:42+00:00"
                }
            ]
        }
    ]
}
```
</p>
</details>

<details><summary>XML sample</summary>
  <p>
  
```xml
<response>
  <collection>
    <url>/actors</url>
    <count>2</count>
    <total>20</total>
    <next>/?page=2</next>
    <prev/>
    <first/>
    <last>/?page=10</last>
  </collection>
  <data>
    <id>1</id>
    <first_name>PENELOPE</first_name>
    <last_name>GUINESS</last_name>
    <modified>2/15/06, 4:34 AM</modified>
    <films>
      <id>1</id>
      <title>ACADEMY DINOSAUR</title>
      <description>A Epic Drama of a Feminist And a Mad Scientist who must Battle a Teacher in The Canadian Rockies</description>
      <release_year>2006</release_year>
      <language_id>1</language_id>
      <rental_duration>6</rental_duration>
      <length>86</length>
      <rating>PG</rating>
      <special_features>Deleted Scenes,Behind the Scenes</special_features>
      <modified>2/15/06, 5:03 AM</modified>
    </films>
  </data>
</response>
```
</p>
</details>

## Configuration

This is optional. You can alter the names of the response keys, simply create a config/collection_view.php file. Using 
the example below we can change the `collection` key to `pagination`, `data` to `items`, and alter some key names within 
our new pagination object. Just keep the mapped items `{{names}}` as-is. 

```php
# config/collection_view.php
return [
    'CollectionView' => [
        'pagination' => '{{collection}}', // array that holds pagination data
        'pagination.url' => '{{url}}', // url of current page
        'pagination.pageCount' => '{{count}}', // count on page
        'pagination.totalCount' => '{{total}}', // total items
        'pagination.next' => '{{next}}', // next page url
        'pagination.prev' => '{{prev}}', // previous page url
        'pagination.first' => '{{first}}', // first page url
        'pagination.last' => '{{last}}', // last page url
        'items' => '{{data}}', // the collection of data
    ]
];
```

## Unit Tests

```console
vendor/bin/phpunit
```

## Code Standards

```console
composer check
```