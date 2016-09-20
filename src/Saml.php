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

        if (is_file($this->simpleSamlPath . 'lib/_autoload.php')) {
            require_once($this->simpleSamlPath . 'lib/_autoload.php');
            $this->simpleSaml = new \SimpleSAML_Auth_Simple($this->config);
        } else {
            throw new \Exception('Simple sample cant find in this path: ' . $this->simpleSamlPath);
        }

    }

    /**
     * @return mixed
     */
    public function getSimpleSaml()
    {
        return $this->simpleSaml;
    }

    /**
     * get SamlUser data
     * @return SamlUser|null
     */
    public function getSamlUser()
    {
        if ($this->simpleSaml != null) {
            return new SamlUser($this->simpleSaml->getAttributes());
        }
        return null;
    }

    /**
     * @return bool
     */
    public function isAuthenticated()
    {
        if ($this->simpleSaml != null) {
            return $this->simpleSaml->isAuthenticated();
        }
        return false;
    }

    /**
     * @return bool
     */
    public function requireAuth()
    {
        if ($this->simpleSaml != null) {
            return $this->simpleSaml->requireAuth();
        }
        return false;
    }

    /**
     * @return bool
     */
    public function getAttributes()
    {
        if ($this->simpleSaml != null) {
            return $this->simpleSaml->getAttributes();
        }
        return false;
    }

    /**
     * @return bool
     */
    public function logout()
    {
        if ($this->simpleSaml != null) {
            return $this->simpleSaml->logout();
        }
        return false;
    }
}