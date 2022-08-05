<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->truncate();
        $companies=[];
        foreach(range(1,10) as $index)
        {
            $companies[]=[
                'name'=>$name="company $index",
                'address'=>"address $name",
                'website'=>"website $name",
                'email'=>"email $name",
                'created_at'=>now(),
                'updated_at'=>now()
            ];
    }
    DB::table('companies')->insert($companies);
}
}