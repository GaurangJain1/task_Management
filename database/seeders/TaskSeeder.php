<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\task;
use Illuminate\Support\Facades\File;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/task.json');
        $tasks = collect(json_decode($json));

        $tasks->each(function($task){
            task::create([
                'task_id'=>$task->task_id,
                'task_name'=>$task->task_name,
                'task_description'=>$task->task_description,
                'priority'=>$task->priority,
                'attached_file'=>$task->attached_file,
                'deadline'=>$task->deadline   
            ]);
        });

        // task::create([
            
        //     'task_id'=>1,
        //     'task_name'=>'nameof task',
        //     'task_description'=>'desc',
        //     'priority'=>'High',
        //     'attached_file'=>'xyz',
        //     'deadline'=>'2024-09-04'            
        // ]);
    }
}



// $tasks = collect(
//     [
//         [
//             'task_id'=>2,
//             'task_name'=>'nameof task2',
//             'task_description'=>'desc',
//             'priority'=>'Low',
//             'attached_file'=>'xyz',
//             'deadline'=>'2024-09-04'
//         ],

//         [
//             'task_id'=>3,
//             'task_name'=>'nameof task3',
//             'task_description'=>'desc',
//             'priority'=>'Medium',
//             'attached_file'=>'xyz',
//             'deadline'=>'2024-09-04'
//         ]
//     ]
// );