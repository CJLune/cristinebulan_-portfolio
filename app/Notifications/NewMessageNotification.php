<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class NewMessageNotification extends Notification
{
    use Queueable;

    public Contact $contact;

    /**
     * Create a new notification instance.
     *
     * @param Contact $contact The new contact message model instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
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
     */
    public function toMail($notifiable)
    {
        $contact = $this->contact;
        
        $submissionTime = Carbon::parse($contact->created_at)->setTimezone(config('app.timezone'))->format('M jS, Y, H:i');

        return (new MailMessage)
            ->subject('NEW CONTACT FORM SUBMISSION: ' . $contact->subject)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('You have received a new message from your portfolio contact form.')
            ->line('**Subject:** ' . $contact->subject)
            ->line('**Sender:** ' . $contact->name . ' (' . $contact->email . ')')
            ->line('**Submitted:** ' . $submissionTime)
            ->action('View Message Details', route('admin.contacts.show', $contact))
            ->line('---')
            ->line(substr($contact->message, 0, 200) . (strlen($contact->message) > 200 ? '...' : ''))
            ->line('---')
            ->salutation('Thanks, and have a productive day!');
    }

    /**
     * Get the array representation of the notification for the database channel.
     * This will be serialized into the database.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $contact = $this->contact;
        
        // This is the payload data. Laravel will correctly use this for the notification's database model.
        return [
            'subject' => $contact->subject,
            'name' => $contact->name,
            'email' => $contact->email,
            'contact_id' => $contact->id,
            'read_url' => route('admin.contacts.show', $contact)
        ];
    }

    // 🔴 IMPORTANT: The databaseColumn() method is REMOVED to simplify the model.
}