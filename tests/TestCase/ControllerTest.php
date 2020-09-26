<?php

namespace MixerApi\CollectionView\Test\TestCase;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class ControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * @var string[]
     */
    public $fixtures = [
        'plugin.MixerApi/CollectionView.Actors',
        'plugin.MixerApi/CollectionView.FilmActors',
        'plugin.MixerApi/CollectionView.Films',
    ];

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        static::setAppNamespace();
    }

    public function testJson()
    {
        $this->get('/actors.json');
        $body = (string)$this->_response->getBody();
        $object = json_decode($body);

        $this->assertResponseOk();
        $this->assertTrue(isset($object->collection->url));
        $this->assertNotEmpty($object->data);
    }

    public function testXml()
    {
        $this->get('/actors.xml');
        $body = (string)$this->_response->getBody();
        $object = simplexml_load_string($body);

        $this->assertResponseOk();
        $this->assertTrue(isset($object->collection->url));
        $this->assertNotEmpty($object->data);
    }
}