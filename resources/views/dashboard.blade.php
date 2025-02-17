@extends('layouts.app')

@section('content')
<div class="container flex flex-col items-center justify-start mt-8">
    <h1 class="mb-4 text-5xl">Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card p-8 bg-sky-500 text-white">
                @if(isset($totalBudget))
                    <h4>Total Budget: ${{ number_format($totalBudget, 2) }}</h4>
                @else
                    <h4>Total Budget: Not defined</h4>
                @endif

                @if(isset($totalSpent))
                <h4>Total Spent: ${{ number_format($totalSpent, 2) }}</h4>
                @else
                    <h4>Total Spent: $0.00</h4>
                @endif

                @if(isset($totalBudget) && isset($totalSpent))
                    <h5>Remaining: ${{ number_format($totalBudget - $totalSpent, 2) }}</h5>
                    @else
                <h5>Remaining: $0.00</h5>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3">
                <h4 class="mb-4">Spending by Category</h4>

                <canvas id="spendingChart"></canvas>

                <ul class="card p-3 bg-sky-500 text-white mt-4">

                @if(isset($spendingByCategory))
                    @foreach($spendingByCategory as $category => $amount)
                        <li>{{ $category }}: ${{ number_format($amount, 2) }}</li>
                    @endforeach

                    @else
                        <li>No expenses by category</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-4 w-1/2">
        <h4 class="text-2xl">Recent Transactions</h4>
        <table class="border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8">
            <thead class="table-header-group">
                <tr class="table-row text-left">
                    <th>Date</th>
                    <th>Category</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>

            @if(isset($recentExpenses))
                @foreach($recentExpenses as $expense)
                    <tr class="table-row border">
                        <td>{{ $expense->created_at->format('Y-m-d') }}</td>
                        <td>{{ $expense->category }}</td>
                        <td>${{ number_format($expense->amount, 2) }}</td>
                    </tr>
                @endforeach

                @else
                <tr class="table-row border"><td>No recent expenses</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    // Get data from Laravel
    const categories = {!! json_encode($spendingByCategory->keys()) !!};
    const amounts = {!! json_encode($spendingByCategory->values()) !!};

    // Chart.js configuration
    const ctx = document.getElementById('spendingChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: categories,
            datasets: [{
                label: 'Spending by Category',
                data: amounts,
                backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0', '#9966ff'],
            }]
        }
    });
</script>
@endsection

