<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAssignNotification extends Notification
{
    use Queueable;
    public $task_notification;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $task_notification)
    {
        $this->task_notification = $task_notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail(object $notifiable): MailMessage
//    {
////        return (new MailMessage)
////                    ->line('The introduction to the notification.')
////                    ->action('Notification Action', url('/'))
////                    ->line('Thank you for using our application!');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return $this->task_notification;
    }
}
