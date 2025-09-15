<?php
namespace Tests\Unit;

use App\Models\Requests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestsModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_correct_fillable_attributes()
    {
        $request = new Requests();
        
        $expected = [
            'name', 'goal', 'email', 'company_name', 'website',
            'employees', 'location', 'phone', 'challenge', 'comments'
        ];
        
        $this->assertEquals($expected, $request->getFillable());
    }

    /** @test */
    public function it_has_default_pending_status()
    {
        $request = new Requests();
        
        $this->assertEquals('pending', $request->status);
    }

    /** @test */
    public function it_returns_correct_status_options()
    {
        $expected = [
            'pending' => 'Pending',
            'in_progress' => 'In Progress',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled'
        ];
        
        $this->assertEquals($expected, Requests::getStatusOptions());
    }

    /** @test */
    public function it_returns_correct_status_badge_classes()
    {
        $request = new Requests();
        
        $request->status = 'pending';
        $this->assertEquals('badge-warning', $request->getStatusBadgeClass());
        
        $request->status = 'in_progress';
        $this->assertEquals('badge-info', $request->getStatusBadgeClass());
        
        $request->status = 'completed';
        $this->assertEquals('badge-success', $request->getStatusBadgeClass());
        
        $request->status = 'cancelled';
        $this->assertEquals('badge-danger', $request->getStatusBadgeClass());
        
        $request->status = 'unknown';
        $this->assertEquals('badge-secondary', $request->getStatusBadgeClass());
    }

    /** @test */
    public function employees_attribute_is_cast_to_integer()
    {
        $request = Requests::factory()->create(['employees' => '10']);
        
        $this->assertIsInt($request->employees);
        $this->assertEquals(10, $request->employees);
    }
}