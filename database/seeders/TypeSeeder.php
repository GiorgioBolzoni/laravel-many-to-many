<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Front-end',
            'Back-end',
            'Full Stack'
        ];

        foreach ($categories as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Str::slug($type, '-');

            $newType->save();
        }
    }
}
