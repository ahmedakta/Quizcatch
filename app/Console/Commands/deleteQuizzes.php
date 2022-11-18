<?php

namespace App\Console\Commands;

use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class deleteQuizzes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:quizzes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete quizzes when end time has been comed';
    protected function schedule(Schedule $shedule)
    {
        $shedule->command('delete:quiizes')->everyMinute();
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $quizzes = Quiz::all();
        foreach ($quizzes as $quiz ) {
            if ($quiz->end_time != null) {
                $quiz->where('end_time','<=', Carbon::now())->delete();
            }
        }
    }
}
