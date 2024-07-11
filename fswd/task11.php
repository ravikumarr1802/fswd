<?php
$states = "Telangana AndhraPradesh Maharashtra Kerala TamilNadu";
$statesList = array();
preg_match('/\b\w*ana\b/', $states, $matches);
$statesList[0] = $matches[0] ?? '';

preg_match('/\bK\w*a\b/i', $states, $matches);
$statesList[1] = $matches[0] ?? '';

preg_match('/\bM\w*a\b/', $states, $matches);
$statesList[2] = $matches[0] ?? '';

preg_match('/\b\w*u\b/', $states, $matches);
$statesList[3] = $matches[0] ?? '';
foreach ($statesList as $index => $state) {
    echo "Element ".($index+1).": $state<br>";
}
?>
