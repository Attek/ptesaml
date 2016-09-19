<?php

namespace attek\ptesaml;

use yii\base\Object;

class Saml extends Object
{
    /**
     * Path to simplesamlphp on server
     * @var string
     */
    public $simpleSamlPath = "/usr/share/simplesamlphp/";

    /**
     * @var string
     */
    public $config = "default-sp";

    /**
     * @var SimpleSAML_Auth_Simple
     */
    private $simpleSaml;

    public function init()
    {
        parent::init();
        require_once($this->simpleSamlPath . 'lib/_autoload.php');
        $this->simpleSaml =new \SimpleSAML_Auth_Simple($this->config);
    }

    /**
     * @return mixed
     */
    public function getSimpleSaml()
    {
        return $this->simpleSaml;
    }

}