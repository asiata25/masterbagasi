<?php

namespace App\Console\Commands;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ActivateVoucher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voucher:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activate vouchers that are scheduled to be active';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $vouchers = Voucher::where('status', 'upcoming')
            ->where('active_at', '<=', Carbon::now())
            ->get();

        foreach ($vouchers as $voucher) {
            $voucher->status = 'active';
            $voucher->save();
            $this->info('vouchers ' . $voucher->code . ' activated successfully.');
        }
    }
}
