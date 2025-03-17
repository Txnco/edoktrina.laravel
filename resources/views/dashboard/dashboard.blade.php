@extends('layouts.admin')

@section('main-content')

<!-- Main Layout -->
<div class="min-h-screen bg-base-100">

      <!-- Main Content -->
      <div class="drawer-content flex flex-col lg:ml-64 mt-16 p-6">
        <!-- Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
          <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
              <div class="flex items-center justify-between">
                <div>
                  <div class="text-sm text-base-content/70">Total Users</div>
                  <div class="text-3xl font-bold mt-1">24.5K</div>
                </div>
                <div class="badge badge-primary p-3">
                  <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                    </svg>
                </div>
              </div>
            </div>
          </div>
          <!-- Repeat similar cards for other stats -->
        </div>
    
        <!-- Chart Section -->
        <div class="card bg-base-100 shadow-sm mb-6">
          <div class="card-body">
            <h3 class="card-title">Revenue Overview</h3>
            <div class="h-64 bg-base-200 rounded-box mt-4 flex items-center justify-center">
              Chart Placeholder
            </div>
          </div>
        </div>
    
        <!-- Recent Activity Table -->
        <div class="card bg-base-100 shadow-sm">
          <div class="card-body">
            <h3 class="card-title">Recent Activity</h3>
            <div class="overflow-x-auto">
              <table class="table">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Action</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Table rows -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Navbar -->
        <div class="navbar bg-base-100 mb-8 p-0">
            <div class="flex-1">
                <h2 class="text-2xl font-bold">Analytics Dashboard</h2>
            </div>
          
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @foreach([
                ['title' => 'Total Users', 'value' => '24.5K', 'change' => '+12.3%', 'icon' => 'users'],
                ['title' => 'Total Revenue', 'value' => '$45.2K', 'change' => '+8.1%', 'icon' => 'currency-dollar'],
                ['title' => 'Conversion Rate', 'value' => '3.8%', 'change' => '-1.2%', 'icon' => 'trending-up'],
                ['title' => 'Avg. Session', 'value' => '2m 56s', 'change' => '+3.7%', 'icon' => 'clock']
            ] as $stat)
            <div class="card bg-base-200">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="text-sm text-base-content/70">{{ $stat['title'] }}</div>
                            <div class="text-2xl font-bold mt-2">{{ $stat['value'] }}</div>
                        </div>
                        <div class="badge badge-primary p-4">
                        </div>
                    </div>
                    <div class="mt-2 text-sm {{ str_contains($stat['change'], '+') ? 'text-success' : 'text-error' }}">
                        {{ $stat['change'] }} vs last month
                    </div>
                </div>
            </div>
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
</div>

<script>
    // Add any necessary JavaScript here
    document.addEventListener('DOMContentLoaded', function() {
        // Theme toggle logic is handled automatically by DaisyUI
    });
</script>

@endsection