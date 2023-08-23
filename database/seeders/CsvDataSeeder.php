<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CsvDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $json = File::get(database_path('data/CsvData.json'));
        $data = json_decode($json);

        foreach ($data as $row) {
            DB::table('csv_data')->insert([
                'name' => $row->name,
                'price' => $row->price,
                'bedrooms' => $row->bedrooms,
                'bathrooms' => $row->bathrooms,
                'storeys' => $row->storeys,
                'garages' => $row->garages,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
