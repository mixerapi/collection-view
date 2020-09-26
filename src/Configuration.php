<?php
declare(strict_types=1);

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
     * @param \Cake\Controller\Controller $controller Controller instance
     * @return \Cake\Controller\Controller
     */
    public function views(Controller $controller): Controller
    {
        if (!$controller->components()->has('RequestHandler')) {
            return $controller;
        }
        $controller->RequestHandler->setConfig(
            'viewClassMap.json',
            'MixerApi/CollectionView.JsonCollection'
        );
        $controller->RequestHandler->setConfig(
            'viewClassMap.xml',
            'MixerApi/CollectionView.XmlCollection'
        );

        return $controller;
    }
}
