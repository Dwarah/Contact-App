<?php

namespace Database\Seeders;

Use App\Models\User;
Use App\Models\Company;
Use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        // $users = factory(User::class, 5)->create();

        // $users->each(function ($user){
        //     $companies = $user->companies()->saveMany(
        //         factory(Company::class, rand(2, 5))->make()
        //     );

        //     $companies->each(function ($company) use ($user){
        //         $company->contacts()->saveMany(
        //             factory(Contact::class, rand(5, 10))
        //             ->make()
        //             ->map(function ($contact) use ($user){
        //                 $contact->user_id = $user->id;
        //                 return $contact;
        //             })
        //         );
           // });
             \App\Models\User::factory(5)->create();
            \App\Models\Company::factory(10)->create();
            \App\Models\Contact::factory(40)->create();

        //});
  
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}