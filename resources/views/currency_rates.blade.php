<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
		<title>USD</title>
	</head>
	<body>
		<div>
			<h1>Current exchange rates against USD</h1>
			<div class="table">
				<div class="filters">
					<form action="{{ route('currency_rates.index') }}" method="GET">
		                <input type="text" name="search" placeholder="Search by currency code" value="{{ request()->input('search') }}">
		                <select name="rate_filter" id="rate_filter">
		                    <option value="">Filter by rate</option>
		                    <option value="greater_than_1" {{ request()->input('rate_filter') == 'greater_than_1' ? 'selected' : '' }}>Greater than 1</option>
		                    <option value="less_than_1" {{ request()->input('rate_filter') == 'less_than_1' ? 'selected' : '' }}>Less than 1</option>
		                </select>
		                <button type="submit">Apply</button>
		            </form>
				</div>
				<table>
					<thead>
						<tr>
							<th>Currency code</th>
							<th>Rate</th>
							<th>Updated at</th>
						</tr>
					</thead>
					<tbody>
						@foreach($currencyRates as $currency)
							<tr>
								<td>{{ $currency->currency_code}}</td>
								<td>{{ $currency->rate}}</td>
								<td>{{ $currency->updated_at}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{ $currencyRates->links('vendor.pagination.default') }}
			</div>
		</div>
	</body>
</html>
