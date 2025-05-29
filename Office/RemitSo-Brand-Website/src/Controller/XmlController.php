<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Controller\Controller;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class XmlController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();       
    }

    public function readXml()
    {
        $xmlFilePath = ROOT . DS . 'webroot' .  DS . 'sitemap.xml';

        if (file_exists($xmlFilePath)) {
           
            $xmlContent = file_get_contents($xmlFilePath);

            
            $xml = simplexml_load_string($xmlContent);
       
            $json = json_encode($xml);
            $array = json_decode($json, TRUE);

            $this->set(compact('array'));
        } else {
            $this->Flash->error(__('XML file not found.'));
        }
    }
}
