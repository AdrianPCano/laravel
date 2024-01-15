<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $languages = [
          ["name" => "Español",
           "label" => "ES"
          ],
          ["name" => "English",
           "label" => "EN"
          ],
        ];
    
    foreach ($languages as $language) {
        Language::create($language);
    }
  }
}
