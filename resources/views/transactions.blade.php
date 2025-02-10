<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
    <label>Amount:</label>
    <input type="number" name="amount" step="0.01" required>

    <label>Description:</label>
    <input type="text" name="description" required>

    <button type="submit">Add Transaction</button>
</form>
