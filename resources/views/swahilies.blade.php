<!-- resources/views/swahilies.blade.php -->

@php
    $order_id = 'sdvhdvdvjhv';
@endphp

<form method="POST" action="{{ route('checkout.order') }}">
    @csrf
    <input type="text" name="order_id" value="{{ $order_id }}">
    <input type="text" name="amount" value="50000">
    <!-- Other necessary hidden input fields here -->
    <button type="submit">Proceed to Checkout</button>
</form>
