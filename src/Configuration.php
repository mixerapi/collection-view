<?php

namespace MixerApi\CollectionView;

use Cake\Controller\Controller;
use Cake\Core\Configure;

class Configuration
{
    /**
     * Sets a default configuration
     *
     * @return void
     */
    public function default()
    {
        Configure::write('CollectionView', [
            'collection' => '{{collection}}',
            'collection.url' => '{{url}}',
            'collection.count' => '{{count}}',
            'collection.total' => '{{total}}',
            'collection.next' => '{{next}}',
            'collection.prev' => '{{prev}}',
            'collection.first' => '{{first}}',
            'collection.last' => '{{last}}',
            'data' => '{{data}}',
        ]);
    }

    /**
     * Sets request handler views for json and xml
     *
     * @param Controller $controller
     * @return void
     */
    public function views(Controller $controller): void
    {
        if (!$controller->components()->has('RequestHandler')) {
            return;
        }
        $controller->RequestHandler->setConfig(
            'viewClassMap.json',
            'MixerApi/CollectionView.JsonCollection'
        );
        $controller->RequestHandler->setConfig(
            'viewClassMap.xml',
            'MixerApi/CollectionView.XmlCollection'
        );
    }
}