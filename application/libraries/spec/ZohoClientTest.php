<?php

include_once '../ZohoClient.php';

class ZohoClientTest extends \PHPUnit_Framework_TestCase {

    public function testParsingResponse() {
        $client = new MockZohoClient();

        $contacts = $client->getContacts();

        $this->assertEquals(2, count($contacts));
        $contact = $contacts[0];
        $this->assertEquals('123', $contact->CONTACTID);
        $this->assertEquals('Test2', $contact->FirstName);
        $this->assertEquals('Tester2', $contact->LastName);
        $this->assertEquals('test2@test.de', $contact->Email);
    }

}

class MockZohoClient extends ZohoClient {

    public function __construct() {

    }

    protected function getResponse($url) {
        return '{"response":{"result":{"Contacts":{"row":[{"no":"1","FL":[{"content":"123","val":"CONTACTID"},{"content":"Test2","val":"First Name"},{"content":"Tester2","val":"Last Name"},{"content":"test2@test.de","val":"Email"}]},{"no":"2","FL":[{"content":"234","val":"CONTACTID"},{"content":"Test","val":"First Name"},{"content":"Tester","val":"Last Name"},{"content":"test@test.de","val":"Email"}]}]}},"uri":"/crm/private/json/Contacts/getRecords"}}';
    }

}