<?php

/**
 * Provides access to Zoho API.
 *
 * Data fetched from Zoho is parsed and put into Entities which are defined at the bottom
 *
 * Usage:
 * $this->load->library('ZohoClient');
 * $contacts = $this->zohoclient->getContacts(); // returns an array of Contact instances
 */
class ZohoClient {

    /**
     * @var string Url to access API wich JSON responses
     */
    protected $baseUrl = 'https://crm.zoho.com/crm/private/json/';

    /**
     * @var string Default parameter
     */
    protected $scope = 'crmapi';

    /**
     * @var string Stored in config/transfair.php
     */
    protected $authtoken = '';

    /**
     * @var resource cUrl resource
     */
    private $curl;

    public function __construct() {
        $ci =& get_instance();

        $ci->config->load('transfair');
        $this->authtoken = $ci->config->item('authtoken');
    }

    /**
     * Get a list of all contacts
     *
     * @return array|Contact[]
     */
    public function getContacts() {
        return $this->parseToArray($this->execute(
            'Contacts/getRecords',
            array(
                 'selectColumns' => 'Contacts(Email,Company,First Name,Last Name)'
            )
        )->Contacts, 'Contact');
    }

    /**
     * Executes a API call and returns the response as an array
     *
     * @param string $url
     * @param array $params GET parameters
     * @return array Decoded response
     */
    private function execute($url, array $params) {
        $params['authtoken'] = $this->authtoken;
        $params['scope'] = $this->scope;

        $query = array();
        foreach ($params as $key => $value) {
            $query[] = $key . '=' . urlencode($value);
        }
        $queryString = empty($query) ? '' : '?' . implode('&', $query);

        $url = $this->baseUrl . $url . $queryString;

        $data = $this->getResponse($url);

        return json_decode($data)->response->result;
    }

    /**
     * Performs the actual HTTP request and returns response as-is
     *
     * @param string $url
     * @return string The JSON response
     */
    protected function getResponse($url) {
        $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_VERBOSE, true);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($this->curl, CURLOPT_URL, $url);
        $data = curl_exec($this->curl);

        curl_close($this->curl);
        return $data;
    }

    /**
     * Parses the Zoho response to objects
     *
     * @see ZohoClientTest
     *
     * @param $result
     * @param $entityClass
     * @return array
     */
    private function parseToArray($result, $entityClass) {
        $array = array();
        foreach ($result->row as $row) {
            $entity = new $entityClass();
            $array[] = $entity;

            foreach ($row->FL as $field) {
                $name = $field->val;
                $value = $field->content;

                $name = preg_replace('/\s([A-Z][a-z])/', '\1', $name);

                $entity->$name = $value;
            }
        }
        return $array;
    }


}

class Contact {

    public $CONTACTID;

    public $Email;

    public $FirstName;

    public $LastName;

}