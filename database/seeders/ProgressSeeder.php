<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\progress;
use Illuminate\Support\Facades\File;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/progress.json');
        $tasks = collect(json_decode($json));
        $tasks->each(function($progress){
            progress::create([
                'percentage_done'=>$progress->percentage_done,
                'task_id'=>$progress->task_id,
                'today'=>$progress->today 
            ]);
        });
        // progress::create([
        //     'percentage_done'=>'70.00',
        //     'task_id'=>3,
        //     'today'=>Carbon::create('2024', '01', '01')
        //  ]);
    }
}
