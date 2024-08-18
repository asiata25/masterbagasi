<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->everyFiveSeconds();
$filePath = storage_path('logs/voucher-schedule.log');
Schedule::command('voucher:active')->everyMinute()->appendOutputTo($filePath);;