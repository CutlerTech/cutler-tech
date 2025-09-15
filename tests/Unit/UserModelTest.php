<?php
namespace Tests\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class UserModelTest extends TestCase {
    use RefreshDatabase;
    /** @test */
    public function it_has_correct_fillable_attributes(): void {
        $user = new User();
        $expected = ['name', 'email', 'password'];
        $this->assertEquals($expected, $user->getFillable());
    }
    /** @test */
    public function it_hides_sensitive_attributes(): void {
        $user = new User();
        $expected = ['password', 'remember_token'];
        $this->assertEquals($expected, $user->getHidden());
    }
    /** @test */
    public function password_is_automatically_hashed(): void {
        $user = User::factory()->create(['password' => 'plaintext']);
        $this->assertNotEquals('plaintext', $user->password);
        $this->assertTrue(strlen($user->password) > 50); // Hashed passwords are longer
    }
}