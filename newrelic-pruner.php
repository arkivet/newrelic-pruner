<?php

require_once 'NewRelic.php';

$apiKey = $argv[1];


$newRelic = new NewRelic($apiKey);

$applications = $newRelic->listApplications();

foreach ($applications as $application) {
    if (!$application->reporting) {
        echo 'Deleting ' . $application->name . '...';
        $newRelic->deleteApplication($application->id);
        echo 'DONE' . PHP_EOL;
    }
}
