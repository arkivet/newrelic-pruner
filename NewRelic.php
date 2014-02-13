<?php


class NewRelic
{

    private $apiKey;

    public function __construct($apiKey)
    {

        $this->apiKey = $apiKey;
    }

    public function listApplications()
    {
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "X-Api-Key:" . $this->apiKey . "\r\n"
            )
        );

        $context = stream_context_create($opts);
        return json_decode(file_get_contents('https://api.newrelic.com/v2/applications.json', false, $context))->applications;
    }

    public function deleteApplication($id)
    {
        $opts = array(
            'http' => array(
                'method' => "DELETE",
                'header' => "X-Api-Key:" . $this->apiKey . "\r\n"
            )
        );

        $context = stream_context_create($opts);
        return json_decode(file_get_contents("https://api.newrelic.com/v2/applications/$id.json", false, $context));
    }

} 