<?php
namespace Database\Factories;
use App\Models\Requests;
use Illuminate\Database\Eloquent\Factories\Factory;
class RequestsFactory extends Factory {
    protected $model = Requests::class;
    public function definition(): array {
        return [
            'name' => $this->faker->name(),
            'goal' => $this->faker->paragraph(),
            'email' => $this->faker->unique()->safeEmail(),
            'company_name' => $this->faker->optional()->company(),
            'website' => $this->faker->optional()->url(),
            'employees' => $this->faker->optional()->numberBetween(1, 1000),
            'location' => $this->faker->optional()->city(),
            'phone' => $this->faker->optional()->phoneNumber(),
            'challenge' => $this->faker->optional()->paragraph(),
            'comments' => $this->faker->optional()->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed', 'cancelled'])
        ];
    }
}
