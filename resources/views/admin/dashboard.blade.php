@extends('layouts.admin')

@section('main-content')

<!-- Main Layout -->
<div class="bg-base-100">
        <!-- Navbar -->
        <div class="navbar mb-8">
            <div class="flex-1">
                <h2 class="text-2xl font-bold">Analytics Dashboard</h2>
            </div>
          
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @foreach([
                ['title' => 'Total Users', 'value' => $userCount, 'change' => $userCountChange, 'icon' => 'users', 'route' => 'admin.users'],
                ['title' => 'Total Revenue', 'value' => '$45.2K', 'change' => '+8.1%', 'icon' => 'currency-dollar', 'route' => 'admin.users'],
                ['title' => 'Conversion Rate', 'value' => '3.8%', 'change' => '-1.2%', 'icon' => 'arrow-trending-up', 'route' => 'admin.users'],
                ['title' => 'Avg. Session', 'value' => '2m 56s', 'change' => '+3.7%', 'icon' => 'clock', 'route' => 'admin.users']
            ] as $stat)
                <a href="{{ route($stat['route']) }}">
                    <div class="card bg-base-200">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div>
                                    <div class="text-sm text-base-content/70">{{ $stat['title'] }}</div>
                                    <div class="text-2xl font-bold mt-2">{{ $stat['value'] }}</div>
                                </div>
                                <div class="badge badge-primary p-4">
                                    <!-- Dynamic Icon -->
                                    <x-dynamic-component :component="'heroicon-o-' . $stat['icon']" class="w-6 h-6" />
                                </div>
                            </div>
                            <div class="mt-2 text-sm {{ str_contains($stat['change'], '+') ? 'text-success' : 'text-error' }}">
                                {{ $stat['change'] }} vs last month
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Chart Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="card bg-base-200">
                <div class="card-body">
                    <h3 class="card-title">Revenue Overview</h3>
                    <div class="h-64 bg-base-300 rounded-lg mt-4 flex items-center justify-center">
                        Chart Placeholder
                    </div>
                </div>
            </div>

            <div class="card bg-base-200">
                <div class="card-body">
                    <h3 class="card-title">Recent Transactions</h3>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach([
                                    ['date' => '2024-03-15', 'id' => '#TRX-5849', 'amount' => '$245.00', 'status' => 'complete'],
                                    ['date' => '2024-03-14', 'id' => '#TRX-5848', 'amount' => '$99.99', 'status' => 'pending'],
                                    ['date' => '2024-03-13', 'id' => '#TRX-5847', 'amount' => '$1,499.00', 'status' => 'failed']
                                ] as $transaction)
                                <tr>
                                    <td>{{ $transaction['date'] }}</td>
                                    <td>{{ $transaction['id'] }}</td>
                                    <td>{{ $transaction['amount'] }}</td>
                                    <td>
                                        <span class="badge badge-{{ $transaction['status'] == 'complete' ? 'success' : ($transaction['status'] == 'pending' ? 'warning' : 'error') }}">
                                            {{ ucfirst($transaction['status']) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>



@endsection