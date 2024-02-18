<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class VirusTotalService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        // $this->apiKey = env('VIRUSTOTAL_API_KEY');
        // Log::info("VirusTotal API Key: " . $this->apiKey);
        // $this->client = new Client();

        $this->apiKey = env('VIRUSTOTAL_API_KEY');
        $this->client = new Client();
    }

    public function getUploadUrl()
    {
        $response = $this->client->request('GET', 'https://www.virustotal.com/api/v3/files/upload_url', [
            'headers' => [
                'x-apikey' => $this->apiKey,
            ],
        ]);

        $uploadUrl = json_decode($response->getBody()->getContents(), true);

        return $uploadUrl['data'];
    }


    public function scanFile($filePath)
    {
        $uploadUrl = $this->getUploadUrl();

        $response = $this->client->request('POST', $uploadUrl, [
            'headers' => [
                'x-apikey' => $this->apiKey,
            ],
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($filePath, 'r'),
                    'filename' => basename($filePath)
                ],
            ],
        ]);

    }

}
