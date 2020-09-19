<?php
/**
 * Optionally change the naming for collection keys in your response. Must keep the same array depth and template
 * {{vars}}. This will not handle adding new fields or removing existing ones. Only edit the keys, not the values.
 */
return [
    'CollectionView' => [
        'collection' => '{{collection}}', // array that holds pagination data
        'collection.url' => '{{url}}', // url of current page
        'collection.count' => '{{count}}', // count on page
        'collection.total' => '{{total}}', // total items
        'collection.next' => '{{next}}', // next page url
        'collection.prev' => '{{prev}}', // previous page url
        'collection.first' => '{{first}}', // first page url
        'collection.last' => '{{last}}', // last page url
        'data' => '{{data}}', // the collection of data
    ]
];