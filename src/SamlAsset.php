<?php

namespace attek\ptesaml;

use yii\web\AssetBundle;

class SamlAsset extends AssetBundle
{
    public $sourcePath = '@vendor/attek/ptesaml/src/assets';

    public $css = [
        'saml.css',
    ];

}
