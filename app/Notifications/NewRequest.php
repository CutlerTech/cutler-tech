<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Requests;
class NewRequest extends Notification {
    use Queueable;
    protected $request;
    /**
     * Create a new notification instance.
     */
    public function __construct(Requests $request) {
        $this->request = $request;
    }
    /**
     * Get the notification's delivery channels.
     * @return array<int, string>
     */
    public function via(object $notifiable): array {
        return ['mail', 'database'];
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage {
        return (new MailMessage)->subject('New Project Request Submitted - CutlerTech')->greeting('Hello ' . $notifiable->name . '!')->line('A new project request has been submitted to CutlerTech.')->line('**Request Details:**')->line('Client: ' . $this->request->name)->line('Email: ' . $this->request->email)->line('Company: ' . ($this->request->company_name ?: 'Not provided'))->line('Project Goal: ' . substr($this->request->goal, 0, 100) . (strlen($this->request->goal) > 100 ? '...' : ''))->line('Phone: ' . ($this->request->phone ?: 'Not provided'))->line('Location: ' . ($this->request->location ?: 'Not provided'))->line('Submitted: ' . $this->request->created_at->format('M d, Y \a\t h:i A'))->action('View Full Request', route('requests.show', $this->request->id))->line('Please review and respond to this request promptly.')->line('Thank you for using CutlerTech!');
    }
    /**
     * Get the database representation of the notification.
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array {
        return [
            'type' => 'new_project_request',
            'request_id' => $this->request->id,
            'client_name' => $this->request->name,
            'client_email' => $this->request->email,
            'company_name' => $this->request->company_name,
            'project_goal' => substr($this->request->goal, 0, 150),
            'message' => 'New project request from ' . $this->request->name . ($this->request->company_name ? ' (' . $this->request->company_name . ')' : ''),
            'action_url' => route('requests.show', $this->request->id),
            'submitted_at' => $this->request->created_at->toISOString(),
        ];
    }
    /**
     * Get the array representation of the notification.
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array {
        return $this->toDatabase($notifiable);
    }
}