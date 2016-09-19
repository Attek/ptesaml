<?php

namespace attek\ptesaml;


class SamlUser
{


    const EDU_PERSON_PRINCIPAL_NAME = "urn:oid:1.3.6.1.4.1.5923.1.1.1.6";
    const EDU_PERSON_SCOPED_AFFILIATION = "urn:oid:1.3.6.1.4.1.5923.1.1.1.9";
    const EDU_PERSON_TARGETED_ID  = "urn:oid:1.3.6.1.4.1.5923.1.1.1.10";
    const SCHAC_HOME_ORGANIZATION_TYPE = "urn:oid:1.3.6.1.4.1.25178.1.2.10";
    const DISPLAY_NAME = "urn:oid:2.16.840.1.113730.3.1.241";
    const MAIL = "urn:oid:0.9.2342.19200300.100.1.3";
    const NIIF_PERSON_ORG_ID = "urn:oid:1.3.6.1.4.1.11914.0.1.154";
    const SN = "urn:oid:2.5.4.4";
    const GIVEN_NAME = "urn:oid:2.5.4.42";
    const OU = "urn:oid:2.5.4.11";
    const O = "urn:oid:2.5.4.10";

    public $first_name;
    public $last_name;
    public $full_name;
    public $email;
    public $email_list;
    public $locale_id;
    public $scope;
    public $scoped_affiliation;
    public $person_targeted_id;
    public $schac_home_organization_type;
    public $niif_person_org_id;
    public $organisation_unit;
    public $organisation;


    public function __construct($attributes = [])
    {

        if (array_key_exists(self::EDU_PERSON_PRINCIPAL_NAME, $attributes)) {
            $data = explode("@", $attributes[self::EDU_PERSON_PRINCIPAL_NAME][0]);
            $this->locale_id = $data[0];
            $this->scope = $data[1];
        }

        if (array_key_exists(self::EDU_PERSON_SCOPED_AFFILIATION, $attributes)) {
            $this->scoped_affiliation = $attributes[self::EDU_PERSON_SCOPED_AFFILIATION];
        }

        if (array_key_exists(self::EDU_PERSON_TARGETED_ID, $attributes)) {
            $this->person_targeted_id = $attributes[self::EDU_PERSON_TARGETED_ID][0];
        }

        if (array_key_exists(self::EDU_PERSON_TARGETED_ID, $attributes)) {
            $this->person_targeted_id = $attributes[self::EDU_PERSON_TARGETED_ID][0];
        }

        if (array_key_exists(self::SCHAC_HOME_ORGANIZATION_TYPE, $attributes)) {
            $this->schac_home_organization_type = $attributes[self::SCHAC_HOME_ORGANIZATION_TYPE][0];
        }

        if (array_key_exists(self::DISPLAY_NAME, $attributes)) {
            $this->full_name = $attributes[self::DISPLAY_NAME][0];
        }

        if (array_key_exists(self::MAIL, $attributes)) {
            $this->email = $attributes[self::MAIL][0];
            $this->email_list = $attributes[self::MAIL];
        }

        if (array_key_exists(self::NIIF_PERSON_ORG_ID, $attributes)) {
            $this->niif_person_org_id = $attributes[self::NIIF_PERSON_ORG_ID][0];
        }

        if (array_key_exists(self::SN, $attributes)) {
            $this->last_name = $attributes[self::SN][0];
        }

        if (array_key_exists(self::GIVEN_NAME, $attributes)) {
            $this->first_name = $attributes[self::GIVEN_NAME][0];
        }

        if (array_key_exists(self::OU, $attributes)) {
            $this->organisation_unit = $attributes[self::OU][0];
        }

        if (array_key_exists(self::O, $attributes)) {
            $this->organisation = $attributes[self::O][0];
        }

    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getEmailList()
    {
        return $this->email_list;
    }

    /**
     * @return mixed
     */
    public function getLocaleId()
    {
        return $this->locale_id;
    }

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @return mixed
     */
    public function getScopedAffiliation()
    {
        return $this->scoped_affiliation;
    }

    /**
     * @return mixed
     */
    public function getPersonTargetedId()
    {
        return $this->person_targeted_id;
    }

    /**
     * @return mixed
     */
    public function getSchacHomeOrganizationType()
    {
        return $this->schac_home_organization_type;
    }

    /**
     * @return mixed
     */
    public function getNiifPersonOrgId()
    {
        return $this->niif_person_org_id;
    }

    /**
     * @return mixed
     */
    public function getOrganisationUnit()
    {
        return $this->organisation_unit;
    }

    /**
     * @return mixed
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }


}