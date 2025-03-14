<?php

namespace GoTotus\Totus;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GoTotus\Totus\Errors\{TotusClientError, AuthenticationError, NotFoundError, ClientError, ServerError};

class Client
{
    private $client;
    private $apiKey;
    private $baseUrl;

    public function __construct(?string $apiKey = null, string $endpoint = 'https://api.totus.cloud', ?string $proxy = null)
    {
        $this->apiKey = $apiKey ?? getenv('TOTUS_KEY');
        if (!$this->apiKey) {
            throw new TotusClientError('API Key must be provided or set in TOTUS_KEY environment variable');
        }
        $this->baseUrl = rtrim($endpoint, '/');
        $this->client = new GuzzleClient([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => "Bearer {$this->apiKey}",
                'Accept' => 'application/json',
            ],
            'proxy' => $proxy ? ['https' => $proxy] : [],
        ]);
    }

    private function makeRequest(string $method, string $endpoint, array $params = [], ?array $data = null): array
    {
        try {
            $options = $data ? ['json' => $data] : ['query' => $params];
            $response = $this->client->request($method, ltrim($endpoint, '/'), $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            $status = $e->getResponse() ? $e->getResponse()->getStatusCode() : null;
            $message = $e->getResponse() ? $this->parseErrorMessage($e->getResponse()->getBody()->getContents()) : 'Unknown error';

            switch ($status) {
                case 401:
                    throw new AuthenticationError($message, $status);
                case 404:
                    throw new NotFoundError("Resource not found: {$this->baseUrl}{$endpoint}", $status);
                case ($status >= 400 && $status < 500):
                    throw new ClientError("Bad request: {$message}", $status);
                case ($status >= 500 && $status < 600):
                    throw new ServerError("Server error: {$message}", $status);
                default:
                    throw new TotusClientError("Unexpected HTTP error: {$message}", $status);
            }
        }
    }

    private function parseErrorMessage(string $body): string
    {
        $data = json_decode($body, true);
        return $data['error'] ?? $body ?: 'Unknown error';
    }

    public function Reference(): Reference
    {
        return new Reference($this);
    }

    public function Validate(): Validate
    {
        return new Validate($this);
    }

    // Internal method for sub-services to use
    public function request(string $method, string $endpoint, array $params = [], ?array $data = null): array
    {
        return $this->makeRequest($method, $endpoint, $params, $data);
    }
}