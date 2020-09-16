<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = App\Company::all();

        foreach ($companies as $company){
            $company->employees()->createMany(factory(\App\Employee::class,20)->make()->toArray());

        }
    }
}
