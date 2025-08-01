<?php
namespace App\Service;


use App\Models\User;
use App\Service\SMSServiceInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NotificationService implements NotificationServiceInterface
{

    public function __construct(
        private SMSServiceInterface $sMSServiceInterface,
    ) {}

     
}
