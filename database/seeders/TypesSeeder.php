<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allTypes = ['FrontEnd', ' Backend', 'Fullstack'];
        foreach ($allTypes as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}
