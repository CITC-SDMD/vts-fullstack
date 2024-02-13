<?php

namespace App\Notifications;

use App\Models\CaseLog;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AssistanceLogNotification extends Notification
{
    use Queueable;

    private $caseLog;

    /**
     * Create a new notification instance.
     */
    public function __construct(CaseLog $caseLog)
    {
        $this->caseLog = $caseLog;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->caseLog->case_log_number.' update.',
            'body' => 'An assistance log has an update.',
            'link' => env('APP_URL').'/case-logs/'.$this->caseLog->uuid.'/details',
        ];
    }
}
