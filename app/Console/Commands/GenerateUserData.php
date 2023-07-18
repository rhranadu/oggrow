<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenerateUserData extends Command
{
    protected $signature = 'data:generate';

    protected $description = 'Generate user dataset';

    public function handle()
    {
        $faker = FakerFactory::create();

        $batchSize = 500; // Number of records to insert in each batch
        $totalRecords = 20000; // Total number of records to generate

        $this->output->progressStart($totalRecords);

        for ($i = 0; $i < $totalRecords; $i += $batchSize) {
            $data = [];

            for ($j = 0; $j < $batchSize; $j++) {
                $data[] = [
                    'name' => $faker->name(),
                    'email' => $faker->email(),
                    'address' => $faker->address(),
                    'created_at' => Carbon::now(),
                    'updated_at' =>Carbon::now(),
                ];

                $this->output->progressAdvance();
            }

            DB::table('users')->insert($data);
        }

        $this->output->progressFinish();
        $this->info('User dataset generated successfully.');
    }
}
