<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vanderbilt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VanderbiltSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $phpProjects = Http::withHeaders([
            'Authorization' => config('services.github'),
            'Accept' => 'application/vnd.github+json'
        ])->get('https://api.github.com/search/repositories?q=php+language:php&sort=stars&order=desc')->json();
        // dd($phpProjects['items']);

        foreach ($phpProjects['items'] as $phprepo) {
            $input = [
                'name' => $phprepo['full_name'],
                // 'description' => 'Testing in the mean time while bug is worked out.',
                'description' => $phprepo['description'],
                'number_stars' => $phprepo['stargazers_count'],
                'url' => $phprepo['html_url'],
                'ghproject_id' => $phprepo['id']
            ];
            Vanderbilt::create($input);
        }



    }
}
