# ptesaml
PTE Saml Login

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run
```
    composer require attek/ptesaml "dev-master" 
```

or add 

```
"attek/ptesaml" : "dev-master"
```

or clone form github

```
    git clone https://github.com/Attek/ptesaml
```

## Usage

Set in config file (web.php)
```php
'components' => [
    'saml' => [
            'class' => 'attek\ptesaml\Saml',
            'simpleSamlPath' => "/usr/share/simplesamlphp/",
            'config' => "default-sp"
    ]
]
```

Use in code
```php
$saml = Yii::$app->saml;
//check is authenticated
$saml->getSimpleSaml()->isAuthenticated();
//Login
$saml->getSimpleSaml()->requireAuth();
$saml->getSimpleSaml()->getAttributes();
$saml->getSimpleSaml()->logout();
$saml->getSamlUser();
```
Login button
```
<?= Html::a(Yii::t('app', 'Login'), ['saml'], ['class' => 'btn btn-primary pte-login']) ?>
```