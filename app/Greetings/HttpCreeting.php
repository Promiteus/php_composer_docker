<?php


namespace App\Greetings;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HttpCreeting
{
    /**
     * @var Client
     */
    private $httpClient;

    public function __construct() {
        $this->httpClient = new Client();
    }

    public function getHttpTestRequest(): int {
        try {
            return $this->httpClient->request('GET', 'https://api.github.com/repos/guzzle/guzzle')->getStatusCode();
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        }
        return 'Ошибка запроса';
    }
}