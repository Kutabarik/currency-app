<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRate;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
	public function index(Request $request)
	{
		$query = CurrencyRate::query();

		if ($request->has("search")) {
			$query->where(
				"currency_code",
				"like",
				"%" . $request->input("search") . "%"
			);
		}

		if ($request->has("rate_filter")) {
			$rateFilter = $request->input("rate_filter");
			if ($rateFilter == "greater_than_1") {
				$query->where("rate", ">", 1);
			} elseif ($rateFilter == "less_than_1") {
				$query->where("rate", "<", 1);
			}
		}

		$currencyRates = $query->paginate(15);

		return view("currency_rates", compact("currencyRates"));
	}
}
