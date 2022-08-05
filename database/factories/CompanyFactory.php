<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

Use App\Models\User;
Use App\Models\Company;
Use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->Company(),
            'address'=>$this->faker->Address(),
            'website'=>$this->faker->domainName(),
            'email'=>$this->faker->email(),
            'user_id' => User::factory(), //factory(User::class), //->create()->id,
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
