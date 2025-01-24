<?php

namespace IQSuite\Platform;

use GuzzleHttp\Client;
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

        $this->apiKey = $apiKey;

        $this->httpClient = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function getAllIndices()
    {
        try {
            $response = $this->httpClient->get('index');
            return $this->handleResponse($response);
        } catch (RequestException $e) {
            $this->handleException($e);
        }
    }

    public function getAllDocuments(string $indexUuid)
    {
        try {
            $response = $this->httpClient->get('index/get-all-documents', [
                'index' => $indexUuid
            ]);

            return $this->handleResponse($response);
        } catch (RequestException $e) {
            $this->handleException($e);
        }
    }

    protected function handleResponse($response)
    {
        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody());
        }

        throw new \RuntimeException('API request failed: ' . $response->body());
    }

    protected function handleException(RequestException $e)
    {
        if ($e->response) {
//            $status = $e->response->status();
//            $message = $e->response->json('message') ?? $e->getMessage();
            
            throw new \RuntimeException("API Error");
        }

        throw new \RuntimeException('Network error: ' . $e->getMessage());
    }

    public function createIndex($fileObject)
    {
        if(!file_exists($fileObject)) {
            throw new \InvalidArgumentException("File not found: $fileObject");
        }

        try {
            $mimeType = MimeType::getMimeType($fileObject);
            $maxFileSize = 20 * 1024 * 1024; // 20 MB

            $supportedTypes = [
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation'
            ];

            if (filesize($fileObject) > $maxFileSize) {
                throw new \InvalidArgumentException('File size exceeds the maximum allowed limit of 20 MB.');
            }

            if (!in_array($mimeType, $supportedTypes)) {
                throw new \InvalidArgumentException('Unsupported file type: ' . $mimeType);
            }

            $fileContent = fopen($fileObject, 'r');

            $response = $this->httpClient->post('index/create', [
                'multipart' => [
                    [
                        'name' => 'document',
                        'contents' => $fileContent,
                    ]
                ]
            ]);

            return $this->handleResponse($response);
        } catch (RequestException $e) {
            $this->handleException($e);
        }
    }

    public function createIndexAndPoll($fileObject, int $timeout = 300, int $pollInterval = 10)
    {
        ini_set('max_execution_time', $timeout);

        if ($timeout < 10 || $timeout > 300) {
            throw new \InvalidArgumentException("Timeout must be between 10 and 300 seconds");
        }

        if ($pollInterval < 10 || $pollInterval > 60) {
            throw new \InvalidArgumentException("Poll interval must be between 10 and 60 seconds");
        }

        $creationResult = $this->createIndex($fileObject);
        $checkStatusUrl = $creationResult->data->check_status;

        $startTime = time();
        $lastStatus = null;

        do {
            // Get current task status
            $status = $this->getTaskStatus($checkStatusUrl);
            $lastStatus = $status;

            // Return final status if processing completed
            if ($status->status !== 'processing') {
                return $status;
            }

            // Check timeout
            if ((time() - $startTime) >= $timeout) {
                throw new \RuntimeException(sprintf(
                    "Task %s timed out after %d seconds",
                    $creationResult->task_id,
                    $timeout
                ));
            }

            // Wait for next poll
            sleep($pollInterval);

        } while (true);
    }

    private function getTaskStatus(string $checkStatusUrl)
    {
        try {
            $response = $this->httpClient->get($checkStatusUrl);
            return $this->handleResponse($response);
        } catch (RequestException $e) {
            $this->handleException($e);
        }
    }

    public function checkTaskStatus(string $taskUuid)
    {
        if(!isset($taskUuid)) {
            throw new \InvalidArgumentException("Task uuid is required");
        }

        try {
            $response = $this->httpClient->get("create-index/task-status/$taskUuid");
            return $this->handleResponse($response);
        } catch (RequestException $e) {
            $this->handleException($e);
        }
    }

    

}