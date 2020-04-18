<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnswerPost extends Notification
{
    use Queueable;
    private $answerLink;
    private $question;
    private $answerBy;

    /**
     * Create a new notification instance.
     *
     * @param $question
     * @param $answerBy
     * @param $answerLink
     */
    public function __construct($question, $answerBy,$answerLink)
    {
        $this->question = $question;
        $this->answerBy = $answerBy;
        $this->answerLink = $answerLink;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Answer Posted')
                    ->line('Your Question - ' . $this->question . ' has a new answer by ' . $this->answerBy)
                    ->action('Click to view Answer', url('/'.$this->answerLink));

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
