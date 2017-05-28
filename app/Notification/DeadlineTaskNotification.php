<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Task;

class DeadlineTaskNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $task;
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/sprints/'.$this->task->sprint->id);
        return (new MailMessage)
                    ->line('Your task will end on '.$this->task->end_day)
                    ->action('View task', $url)
                    ->line('Please check your task. Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }
    public function toDatabase($notifiable)
    {   
        $url = url('/sprints/'.$this->task->sprint->id);
        return [
            'sprint_id' => $this->task->sprint->id,
            'status' => 'deadlineTask',
            'end_day' => $this->task->end_day,
            'name' => $this->task->name,
            'url' => $url,
        ];
    }
}
