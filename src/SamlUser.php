<?php

namespace attek\ptesaml;


class SamlUser
{
    const EDU_PERSON_PRINCIPAL_NAME = "eduPersonPrincipalName";
    const EDU_PERSON_PRINCIPAL_NAME_ID = "urn:oid:1.3.6.1.4.1.5923.1.1.1.6";

    const EDU_PERSON_SCOPED_AFFILIATION = "eduPersonScopedAffiliation";
    const EDU_PERSON_SCOPED_AFFILIATION_ID = "1.3.6.1.4.1.5923.1.1.1.9";

    const EDU_PERSON_TARGETED_ID = "eduPersonTargetedID";
    const EDU_PERSON_TARGETED_ID_ID = "1.3.6.1.4.1.5923.1.1.1.10";

    const SCHAC_HOME_ORGANIZATION_TYPE = "schacHomeOrganizationType";
    const SCHAC_HOME_ORGANIZATION_TYPE_ID =	"1.3.6.1.4.1.25178.1.2.10";

    const MAIL = "mail";
    const MAIL_ID = "urn:oid:0.9.2342.19200300.100.1.3";

    const DISPLAY_NAME = "displayName";
    const DISPLAY_NAME_ID = "urn:oid:2.16.840.1.113730.3.1.241";

    const SN = "sn";
    const SN_ID = "urn:oid:2.5.4.4";

    const GIVEN_NAME = "givenName";
    const GIVEN_NAME_ID = "urn:oid:2.5.4.42";

    const OU = "ou";
    const OU_ID = "urn:oid:2.5.4.11";

    const O = "o";
    const O_ID = "urn:oid:2.5.4.10";

    const PREFERRED_LANGUAGE = "preferredLanguage";
    const PREFERRED_LANGUAGE_ID = "urn:oid:2.16.840.1.113730.3.1.39";


    /**
     * @var tetszőleges állandó azonosító, amely az intézményen belül egyértelműen azonosítja a felhasználót. Kézenfekvő megoldás a felhasználói azonosító (uid) használata, azonban bármilyen más azonosító használható
     */
    public $locale_id;
    /**
     * @var helyi biztonsági tartomány. A végződése kötelezően egy DNS domain, amely az IdP-t üzemeltető intézmény tulajdonában áll.
     */
    public $scope;
    /**
     * @var mixed Email-ek listaja
     */
    public $mail_list;
    /**
     * @var mixed Állandó, nem célzott, nem újra kiosztható egyedi azonosító
     */
    public $eduPersonPrincipalName;
    /**
     * @var mixed A felhasználó megjelenítendő neve
     */
    public $displayName;
    /**
     * @var mixed A felhasználó vezetékneve
     */
    public $sn;
    /**
     * @var mixed A felhasználó keresztneve
     */
    public $givenName;
    /**
     * @var mixed Előnyben részesített nyelv
     */
    public $language;
    /**
     * @var mixed Az intézményen belüli egység teljes neve (organizationalUnit)
     */
    public $organizationalUnit;
    /**
     * @var mixed organizationName
     */
    public $organizationName;
    /**
     * @var mixed Felhasználó és intézmény közti viszony leírása
     */
    public $eduPersonScopedAffiliation;
    /**
     * @var mixed Nem átlátszó, célzott azonosító, amely nem osztható ki újra
     */
    public $eduPersonTargetedID;
    /**
     * @var mixed Az intézmény jellege
     */
    public $schacHomeOrganizationType;

    public function __construct($attributes = [])
    {

        if (is_array($attributes) && count($attributes) >0) {
            foreach ($attributes as $key => $attribute) {
                $this->$key = isset($attribute[0]) ? $attribute[0] : null;

                if ($key == self::EDU_PERSON_PRINCIPAL_NAME || $key == self::EDU_PERSON_PRINCIPAL_NAME_ID) {
                    $data = explode("@", $attribute[0]);
                    $this->locale_id = $data[0];
                    $this->scope = $data[1];
                    $this->eduPersonPrincipalName = $attribute;
                }

                if ($key == self::DISPLAY_NAME_ID || $key == self::DISPLAY_NAME) {
                    $this->displayName = $attribute;
                }

                if ($key == self::SN_ID || $key == self::SN_ID) {
                    $this->sn = $attribute;
                }

                if ($key == self::GIVEN_NAME_ID || $key == self::GIVEN_NAME) {
                    $this->givenName = $attribute;
                }

                if ($key == self::MAIL || $key == self::MAIL_ID) {
                    $this->mail_list = $attribute;
                }

                if ($key == self::PREFERRED_LANGUAGE || $key == self::PREFERRED_LANGUAGE_ID) {
                    $this->language = $attribute;
                }

                if ($key == self::OU || $key == self::OU_ID) {
                    $this->organizationalUnit = $attribute;
                }

                if ($key == self::O || $key == self::O_ID) {
                    $this->organizationName = $attribute;
                }

                if ($key == self::EDU_PERSON_SCOPED_AFFILIATION || $key == self::EDU_PERSON_SCOPED_AFFILIATION_ID) {
                    $this->eduPersonScopedAffiliation = $attribute;
                }

                if ($key == self::EDU_PERSON_TARGETED_ID || $key == self::EDU_PERSON_TARGETED_ID_ID) {
                    $this->eduPersonTargetedID = $attribute;
                }

                if ($key == self::SCHAC_HOME_ORGANIZATION_TYPE || $key == self::SCHAC_HOME_ORGANIZATION_TYPE_ID) {
                    $this->schacHomeOrganizationType = $attribute;
                }

            }
        }

    }
}