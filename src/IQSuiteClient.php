<?php

namespace IQSuite\Platform;

use Illuminate\Http\Client\Factory as HttpFactory;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class IQSuiteClient
{
    protected $httpClient;
    protected $baseUrl;
    protected $apiKey;
    
    public function __construct() {

        $baseUrl = config('iqsuite.base_url');
        $apiKey = config('iqsuite.api_key');

        if (!str_starts_with($baseUrl, 'http')) {
            throw new InvalidArgumentException('Invalid base URL format');
        }

        $this->baseUrl = rtrim($baseUrl, '/');
        $this->apiKey = $apiKey;

        $this->httpClient = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->baseUrl($this->baseUrl);
    }

    public function getAllIndices()
    {
        try {
            $response = $this->httpClient->get('/index');
            return $this->handleResponse($response);
        } catch (RequestException $e) {
            $this->handleException($e);
        }
    }

    public function getAllDocuments(string $indexUuid)
    {
        try {
            $response = $this->httpClient->get('/index/get-all-documents', [
                'index' => $indexUuid
            ]);

            return $this->handleResponse($response);
        } catch (RequestException $e) {
            $this->handleException($e);
        }
    }

    protected function handleResponse($response)
    {
        if ($response->successful()) {
            return $response->json('data');
        }

        throw new \RuntimeException('API request failed: ' . $response->body());
    }

    protected function handleException(RequestException $e)
    {
        if ($e->response) {
            $status = $e->response->status();
            $message = $e->response->json('message') ?? $e->getMessage();
            
            throw new \RuntimeException("API Error [$status]: $message", $status);
        }

        throw new \RuntimeException('Network error: ' . $e->getMessage());
    }

    public function createIndex(string $filePath)
    {
        if(!file_exists($filePath)) {
            throw new \InvalidArgumentException("File not found: $filePath");
        }

        try {
            $fileName = basename($filePath);
            $response = $this->httpClient
                ->attach('document', file_get_contents($filePath), $fileName, ['Content-Type' => 'application/octet-stream'])->post('/index/create');

            return $this->handleResponse($response);
        } catch (RequestException $e) {
            $this->handleException($e);
        }
    }

}