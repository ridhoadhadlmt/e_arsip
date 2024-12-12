<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmissionMailNotification extends Notification
{
    use Queueable;
    protected $submission;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($submissionmail)
    {
        $this->submissionmail = $submissionmail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->greeting('Surat Pengajuan Baru')
            ->line('Dari :'.  $this->submissionmail->fullname)
            ->line('Perihal :'. $this->submissionmail->as_for)
            ->line('Silahkan menunggu balasan dari admin atau operator');
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
            'fullname' => $this->submissionmail->fullname,
            'email' => $this->submissionmail->email,
            'as_for' => $this->submissionmail->as_for,
            'date' => $this->submissionmail->date
        ];
    }
}
