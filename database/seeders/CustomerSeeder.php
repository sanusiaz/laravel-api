<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()
            ->count(25)
            ->hasInvoices(20)
            ->create();

        Customer::factory()
            ->count(100)
            ->hasInvoices(5)
            ->create();
        
        Customer::factory()
            ->count(10)
            ->create();
    }
}
