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
class CleanCRMForm {

    public function __construct() {
		$this->ci =& get_instance();

		$this->ci->load->helper('file');

    }

    public function cleanCRMForm($formName){
        require "forms/formGroupMappings.php";

        if ($formName == "ServiceProviderRegistration"){
            $groupMatches = $ServiceProviderGroups;
        } else if ($formName == "ClientRegistration") {
            $groupMatches = $ClientGroups;
        } else return "cleanCRMForm not provided with proper form name";
        
        $rawString = read_file("application/libraries/forms/$formName.html");

        preg_match('$<form action=\'(.*?)\'.*?>.*?<table.*?>[\s]*(.*?)[\s]*<br>$', $rawString, $formActionAndHiddenInputs);
        $output = "<input type=\"hidden\" name=\"originalFormAction\" value=\"".$formActionAndHiddenInputs[1]."\">\n".$formActionAndHiddenInputs[2]."\n";

        preg_match_all('$<tr><td[^>]*>([^<]*) &nbsp;$', $rawString, $fieldLabels);
        $fieldLabels = $fieldLabels[1];
        
        preg_match_all('$</td><td[^>]*>(.*?)</td>$', $rawString, $fieldInputs);
        $fieldInputs = $fieldInputs[1];
        
        $fieldArray = array();

        for($i = 0; $i < sizeof($fieldLabels); $i++){
            $currentFieldLabel = $fieldLabels[$i];
            $currentFieldInput = $fieldInputs[$i];

            $currentFieldId = $this->strToCamelCase($currentFieldLabel);
            
            $spacePosition = strpos($currentFieldInput, " ");
            
            $currentFieldInput = substr($currentFieldInput, 0, $spacePosition)." id=\"$currentFieldId\" aria-describedby=\"ExplainationFor$currentFieldId\"".substr($currentFieldInput, $spacePosition);

            $currentFieldHtml = "\t\t<label for=\"$currentFieldId\">\n\t\t\t<span>$currentFieldLabel</span>\n\t\t\t$currentFieldInput\n\t\t</label>\n"; 

            $fieldArray[$currentFieldId] = $currentFieldHtml;
            
        };

        foreach($groupMatches as $groupDescription => $groupMembers){
            $output .= "\t<fieldset id=\"".$this->strToCamelCase($groupDescription)."\">\n\t\t<legend>$groupDescription</legend>\n";
            foreach($groupMembers as $memberId => $memberDescription)
                if (array_key_exists($memberId, $fieldArray)){
                    $output .= $fieldArray[$memberId];
                    $output .= "\t\t<p class=\"Explanation\" id=\"ExplanationFor$memberId\">$memberDescription</p>\n\n";
                }
            $output .= "\t</fieldset>\n\n";
        }

        return $output;
    }

    protected function strToCamelCase($str){
        return preg_replace_callback('#[^\w]+(.)#',
            create_function('$r', 'return strtoupper($r[1]);'), $str);
    }
}
