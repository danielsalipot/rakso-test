<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
        ]);
        User::factory(10)->create();

        $response = Http::get('https://raw.githubusercontent.com/dariusk/corpora/master/data/corporations/fortune500.json');
        $faker = Factory::create();

        $company_arr = [];
        $employee_arr = [];

        foreach ($response['companies'] as $key => $company) {
            $companyModel = Company::create([
                'name' => $company,
                'email' => $faker->email,
                'logo_asset' => 'logo' . rand(1, 3) . '.png',
                'website' => $faker->url,
            ]);

            $num_employee = rand(1, 3);
            for ($i = 0; $i < $num_employee; $i++) {
                $employee_arr[] = [
                    'first_name' => $faker->firstName(),
                    'last_name' => $faker->lastName(),
                    'company_id' => $companyModel->id, // Use the generated company's id
                    'phone' => $faker->phoneNumber(),
                    'email' => $faker->email,
                ];
            }
        }

        Employee::insert($employee_arr);
    }
}
