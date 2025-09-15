<?php
namespace Tests\Feature;

use App\Models\Requests;
use App\Models\User;
use App\Notifications\NewRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RequestsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_request_form()
    {
        $response = $this->get('/requests');
        
        $response->assertStatus(200);
        $response->assertViewIs('requests');
    }

    /** @test */
    public function guest_can_submit_valid_request()
    {
        Notification::fake();
        
        $admin = User::factory()->create(['is_admin' => true]);
        
        $requestData = [
            'name' => 'John Doe',
            'goal' => 'Build a web application',
            'email' => 'john@example.com',
            'company_name' => 'Test Company',
            'website' => 'https://example.com',
            'employees' => 10,
            'location' => 'New York',
            'phone' => '123-456-7890',
            'challenge' => 'Need help with backend',
            'comments' => 'Looking forward to working together'
        ];

        $response = $this->post('/requests', $requestData);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Your project request has been submitted successfully!');
        
        $this->assertDatabaseHas('requests', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'status' => 'pending'
        ]);

        Notification::assertSentTo($admin, NewRequest::class);
    }

    /** @test */
    public function request_submission_requires_required_fields()
    {
        $response = $this->post('/requests', []);

        $response->assertSessionHasErrors(['name', 'goal', 'email']);
    }

    /** @test */
    public function authenticated_user_can_view_requests_index()
    {
        $user = User::factory()->create();
        Requests::factory()->count(3)->create();

        $response = $this->actingAs($user)->get('/admin/requests');

        $response->assertStatus(200);
        $response->assertViewIs('requests.index');
        $response->assertViewHas(['requests', 'statusOptions']);
    }

    /** @test */
    public function authenticated_user_can_view_specific_request()
    {
        $user = User::factory()->create();
        $request = Requests::factory()->create();

        $response = $this->actingAs($user)->get("/admin/requests/{$request->id}");

        $response->assertStatus(200);
        $response->assertViewIs('requests.show');
        $response->assertViewHas(['request', 'statusOptions']);
    }

    /** @test */
    public function authenticated_user_can_update_request_status()
    {
        $user = User::factory()->create();
        $request = Requests::factory()->create(['status' => 'pending']);

        $response = $this->actingAs($user)->patch("/admin/requests/{$request->id}/status", [
            'status' => 'in_progress'
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Request status updated successfully!');
        
        $this->assertDatabaseHas('requests', [
            'id' => $request->id,
            'status' => 'in_progress'
        ]);
    }

    /** @test */
    public function authenticated_user_can_delete_request()
    {
        $user = User::factory()->create();
        $request = Requests::factory()->create();

        $response = $this->actingAs($user)->delete("/admin/requests/{$request->id}");

        $response->assertRedirect(route('requests.index'));
        $response->assertSessionHas('success', 'Request deleted successfully!');
        
        $this->assertDatabaseMissing('requests', [
            'id' => $request->id
        ]);
    }

    /** @test */
    public function guest_cannot_access_admin_routes()
    {
        $request = Requests::factory()->create();

        $this->get('/admin/requests')->assertRedirect('/login');
        $this->get("/admin/requests/{$request->id}")->assertRedirect('/login');
        $this->patch("/admin/requests/{$request->id}/status")->assertRedirect('/login');
        $this->delete("/admin/requests/{$request->id}")->assertRedirect('/login');
    }
}