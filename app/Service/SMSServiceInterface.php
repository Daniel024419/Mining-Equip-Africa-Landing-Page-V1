<?php
namespace App\Service;


interface SMSServiceInterface
{
     /**
     * Send SMS message and deduct from global balance
     *
     * @param string $phone Recipient phone number
     * @param string $message SMS content
     * @return array API response
     * @throws \Exception If SMS sending fails
     */
    public function sendSMS(string $phone, string $message): array;
}
