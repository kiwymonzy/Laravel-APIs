<!-- resources/views/payment.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Initiate Payment</title>
</head>
<body>
    <form id="paymentForm" action="{{ route('initiate-payment') }}" method="POST">
        @csrf <!-- Include this if you're using Laravel's CSRF protection -->
        <label for="orderId">Order ID:</label>
        <input type="text" name="order_id" id="orderId" placeholder="Order ID" required>
        
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="phone_number" id="phoneNumber" placeholder="Phone Number" required>
        
        <!-- Add other necessary fields -->
        
        <button type="submit">Initiate Payment</button>
    </form>
    
    <script>
        const form = document.getElementById('paymentForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);

            fetch("{{ route('initiate-payment') }}", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Handle the response data as needed
                // Redirect to payment URL or handle the response
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
