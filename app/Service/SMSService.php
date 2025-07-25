<?php
namespace App\Service;


use App\Models\Sms;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Psr\Http\Client\NetworkExceptionInterface;
use Illuminate\Support\Facades\Request;

class SMSService implements SMSServiceInterface
{
    protected $mnotifyUrl = 'https://api.mnotify.com/api/sms/quick';
    protected $hubtelUrl = 'https://sms.hubtel.com/v1/messages/send?';

    /**
     * Send SMS message and deduct from global balance
     *
     * @param string $phone Recipient phone number
     * @param string $message SMS content
     * @return array API response
     * @throws \Exception If SMS sending fails
     */
    public function sendSMS(string $phone, string $message): array
    {
        // Prepare and send SMS
        $params = $this->sendViaMNotify($phone, $message);
        $response = Http::post($params['url'], $params);

        // Verify successful response (200 or 202)
        if (!$response->successful()) {
            throw new \Exception('Failed to send SMS: ' . $response->status());
        }

        // Only deduct balance if SMS was successfully sent
        //$credits = $this->calculateSmsLength($message);

        //Sms::subtractFromGlobalBalance($credits);

        return $response->json();
    }

    /**
     * Calculate the number of SMS parts for a message.
     *
     * @param  string $message
     * @return int
     */
    private function calculateSmsLength(string $message): int
    {
        $len = strlen($message);

        if ($len <= 160) {
            return 1;
        }

        // For concatenated messages, each part can hold 153 characters
        return (int) ceil($len / 153);
    }


    /**
     * Send SMS via mNotify API
     * v2
     */
    protected function sendViaMNotify(string $phone, string $message): array
    {
        return [
            'key' => config('services.mnotify.api_key'),
            'recipient' => [$phone], // Changed from 'to' to 'recipient' as array
            'message' => $message,    // Changed from 'msg' to 'message'
            'sender' => config('services.mnotify.sender_id'), // Changed from 'sender_id' to 'sender'
            'is_schedule' => 'false', // Added new required field
            'schedule_date' => '',   // Added new required field
            'url' => $this->mnotifyUrl,
        ];
    }

    /**
     * Send SMS via Hubtel API
     */
    protected function sendViaHubtel(string $phone, string $message): array
    {
        return [
            'clientsecret' => config('services.hubtel.client_secret'),
            'clientid' => config('services.hubtel.client_id'),
            'from' => config('services.hubtel.sender_id'),
            'to' => $phone,
            'content' => $message,
            'url' => $this->hubtelUrl,
        ];
    }
}
