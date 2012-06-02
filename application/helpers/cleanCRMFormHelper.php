<?php

    function cleanCRMForm($fileName, $formName, $submitLabel){
        include "formGroupMappings.php";

        if ($formName == "SP")
            $groupMatches = $ServiceProviderGroups;
        else if ($formName == "Client")
            $groupMatches = $ClientGroups;
        else return "cleanCRMForm not provided with proper form name";

        $fileHandle = fopen($fileName, 'r');
        $rawString = fread($fileHandle, filesize($fileName));
        fclose($fileHandle);

        preg_match('$(<form.*?)<br>$', $rawString, $formTagAndHiddenInputs);
        $output = $formTagAndHiddenInputs[1]."\n";
        
        preg_match_all('$<tr><td[^>]*>([^<]*) &nbsp;$', $rawString, $fieldLabels);
        $fieldLabels = $fieldLabels[1];
        
        preg_match_all('$</td><td[^>]*>(.*?)</td>$', $rawString, $fieldInputs);
        $fieldInputs = $fieldInputs[1];
        
        $fieldArray = array();

        for($i = 0; $i < sizeof($fieldLabels); $i++){
            $currentFieldLabel = $fieldLabels[$i];
            $currentFieldInput = $fieldInputs[$i];

            $currentFieldId = strtocamelcase($currentFieldLabel);
            
            $spacePosition = strpos($currentFieldInput, " ");
            
            $currentFieldInput = substr($currentFieldInput, 0, $spacePosition)." id=\"$currentFieldId\" aria-describedby=\"ExplainationFor$currentFieldId\"".substr($currentFieldInput, $spacePosition);

            $currentFieldHtml = "\t\t<label for=\"$currentFieldId\">\n\t\t\t<span>$currentFieldLabel</span>\n\t\t\t$currentFieldInput\n\t\t</label>\n"; 

            $fieldArray[$currentFieldId] = $currentFieldHtml;
            
        };

        foreach($groupMatches as $groupDescription => $groupMembers){
            $output .= "\t<fieldset id=\"".strtocamelcase($groupDescription)."\">\n\t\t<legend>$groupDescription</legend>\n";
            foreach($groupMembers as $memberId => $memberDescription)
                if (array_key_exists($memberId, $fieldArray)){
                    $output .= $fieldArray[$memberId];
                    $output .= "\t\t<p class=\"Explanation\" id=\"ExplanationFor$memberId\">$memberDescription</p>\n\n";
                }
            $output .= "\t</fieldset>\n\n";
        }
        $output .= "\t<input id=\"SubmitButton\" type=\"submit\" name=\"save\" value=\"$submitLabel\" />\n</form>";

        return $output;
    }

    function strtocamelcase($str){
        return preg_replace_callback('#[^\w]+(.)#',
            create_function('$r', 'return strtoupper($r[1]);'), $str);
    }

echo cleanCRMForm("./form.html", "SP", "Apply");
