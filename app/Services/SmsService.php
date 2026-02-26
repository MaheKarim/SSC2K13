<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected string $baseUrl = 'https://api.mimsms.com/api/SmsSending/SMS';
    protected string $username;
    protected string $apiKey;
    protected string $senderName;

    public function __construct()
    {
        $this->username = config('services.mimsms.username');
        $this->apiKey = config('services.mimsms.api_key');
        $this->senderName = config('services.mimsms.sender_name');
    }

    public function send(string $mobileNumber, string $message): array
    {
        // Ensure number is in international format (880...)
        $mobileNumber = $this->formatNumber($mobileNumber);

        try {
            $response = Http::timeout(30)->post($this->baseUrl, [
                'UserName' => $this->username,
                'Apikey' => $this->apiKey,
                'SenderName' => $this->senderName,
                'TransactionType' => 'T',
                'SmsData' => [
                    [
                        'MobNumber' => $mobileNumber,
                        'Message' => $message,
                    ]
                ],
            ]);

            $result = $response->json();

            Log::info('SMS sent attempt', [
                'mobile' => $mobileNumber,
                'status' => $result['status'] ?? 'unknown',
                'statusCode' => $result['statusCode'] ?? 'missing',
                'trxnId' => $result['trxnId'] ?? null,
                'errorDescription' => $result['errorDescription'] ?? null,
            ]);

            return [
                'success' => ($result['statusCode'] ?? '') === '200',
                'response' => json_encode($result),
            ];
        } catch (\Exception $e) {
            Log::error('SMS sending failed', [
                'mobile' => $mobileNumber,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'response' => json_encode(['error' => $e->getMessage()]),
            ];
        }
    }

    protected function formatNumber(string $number): string
    {
        // Remove any spaces, dashes, plus signs
        $number = preg_replace('/[\s\-\+]/', '', $number);

        // If starts with 0, replace with 880
        if (str_starts_with($number, '0')) {
            $number = '880' . substr($number, 1);
        }

        // If doesn't start with 880, prepend it
        if (!str_starts_with($number, '880')) {
            $number = '880' . $number;
        }

        return $number;
    }
}
