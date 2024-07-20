<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SyncCurrencyRates extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = "app:sync-currency-rates";

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Synchronize currency rates with external API";

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
        $response = Http::get('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/usd.json');
        $data = $response->json();

        $date = Carbon::parse($data['date']);
        $rates = $data['usd'];

        $updateData = [];
        foreach ($rates as $currency => $rate) {
            $updateData[] = [
                'currency_code' => $currency,
                'rate' => $rate,
                'updated_at' => $date,
                'created_at' => now(),
            ];
        }

        DB::table('currency_rates')->upsert(
            $updateData,
            ['currency_code'],
            ['rate', 'updated_at']
        );

        $this->info('Currency rates synchronized successfully.');
	}
}
