<?php
/**
 * Created by PhpStorm.
 * User: attek
 * Date: 2016/09/19
 * Time: 14:05
 */

namespace attek\ptesaml;


class Saml extends Object
{
    /**
     * Path to simplesamlphp on server
     * @var string
     */
    public $simpleSamlPath = "/usr/share/simplesamlphp/";

    public static function test()
    {
        echo "Test";
    }

}