<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = [
            'title' => 'Sample Order',
            'description' => 'This is a sample order.',
            'user_id' => 1, // Assign the order to User 1
            'status' => 'pending',
            'created_at' => Carbon::now()->setTimezone('America/New_York'),
            'updated_at' => Carbon::now()->setTimezone('America/New_York'),
        ];

        DB::table('orders')->insert($order);
    }
}
