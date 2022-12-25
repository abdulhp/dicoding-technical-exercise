<?php

namespace Database\Seeders;

use App\Models\CompanyEmployeeSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyEmployeeSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (["10-50 Karyawan", "50-100 Karyawan", "100-500 Karyawan", "500+ Karyawan"] as $key => $value) {
            CompanyEmployeeSize::create([
                'size' => $value,
            ]);
        }
    }
}
