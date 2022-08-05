<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
Use App\Models\User;
Use App\Models\Contact;
Use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'email'=>$this->faker->email(),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
            'company_id'=>Company::pluck('id')->random(),
            'user_id' => User::factory(), //factory(User::class), //->create()->id,
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
