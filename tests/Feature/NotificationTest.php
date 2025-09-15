<?php
namespace Tests\Feature;

use App\Models\Requests;
use App\Models\User;
use App\Notifications\NewRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_view_notifications()
    {
        $user = User::factory()->create();
        
        // Create a notification
        $request = Requests::factory()->create();
        $user->notify(new NewRequest($request));

        $response = $this->actingAs($user)->get('/notifications');

        $response->assertStatus(200);
        $response->assertViewIs('notifications.index');
        $response->assertViewHas('notifications');
    }

    /** @test */
    public function user_can_mark_notification_as_read()
    {
        $user = User::factory()->create();
        $request = Requests::factory()->create();
        $user->notify(new NewRequest($request));
        
        $notification = $user->notifications->first();

        $response = $this->actingAs($user)
            ->get("/notifications/{$notification->id}/mark-read");

        $response->assertRedirect();
        
        $this->assertNotNull($notification->fresh()->read_at);
    }

    /** @test */
    public function user_can_mark_all_notifications_as_read()
    {
        $user = User::factory()->create();
        $request = Requests::factory()->create();
        
        // Create multiple notifications
        $user->notify(new NewRequest($request));
        $user->notify(new NewRequest($request));

        $response = $this->actingAs($user)->get('/notifications/mark-all-read');

        $response->assertRedirect();
        $response->assertSessionHas('success', 'All notifications marked as read.');
        
        $this->assertEquals(0, $user->unreadNotifications->count());
    }

    /** @test */
    public function user_can_delete_specific_notification()
    {
        $user = User::factory()->create();
        $request = Requests::factory()->create();
        $user->notify(new NewRequest($request));
        
        $notification = $user->notifications->first();

        $response = $this->actingAs($user)
            ->delete("/notifications/{$notification->id}");

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Notification deleted successfully.');
        
        $this->assertDatabaseMissing('notifications', [
            'id' => $notification->id
        ]);
    }

    /** @test */
    public function user_can_delete_all_notifications()
    {
        $user = User::factory()->create();
        $request = Requests::factory()->create();
        
        $user->notify(new NewRequest($request));
        $user->notify(new NewRequest($request));

        $response = $this->actingAs($user)->delete('/notifications');

        $response->assertRedirect();
        $response->assertSessionHas('success', 'All notifications deleted successfully.');
        
        $this->assertEquals(0, $user->notifications->count());
    }
}