<?php

namespace attek\ptesaml;


class SamlUser
{
    const EDU_PERSON_PRINCIPAL_NAME = "eduPersonPrincipalName";
    const EDU_PERSON_PRINCIPAL_NAME_ID = "urn:oid:1.3.6.1.4.1.5923.1.1.1.6";
    const MAIL = "mail";
    const MAIL_ID = "urn:oid:0.9.2342.19200300.100.1.3";

    const DISPLAY_NAME = "urn:oid:2.16.840.1.113730.3.1.241";
    const SN = "urn:oid:2.5.4.4";
    const GIVEN_NAME = "urn:oid:2.5.4.42";


    public $locale_id;
    public $scope;
    public $mail_list;
    public $eduPersonPrincipalName;
    public $displayName;
    public $sn;
    public $givenName;

    public function __construct($attributes = [])
    {

        if (is_array($attributes) && count($attributes) >0) {
            foreach ($attributes as $key => $attribute) {
                $this->$key = isset($attribute[0]) ? $attribute[0] : null;

                if ($key == self::EDU_PERSON_PRINCIPAL_NAME || $key == self::EDU_PERSON_PRINCIPAL_NAME_ID) {
                    $data = explode("@", $attribute[0]);
                    $this->locale_id = $data[0];
                    $this->scope = $data[1];
                }

                if ($key == self::DISPLAY_NAME) {
                    $this->displayName = $attribute;
                }

                if ($key == self::SN) {
                    $this->sn = $attribute;
                }

                if ($key == self::GIVEN_NAME) {
                    $this->givenName = $attribute;
                }

                if ($key == self::MAIL || $key == self::MAIL_ID) {
                    $this->mail_list = $attribute;
                }
            }
        }

    }
}