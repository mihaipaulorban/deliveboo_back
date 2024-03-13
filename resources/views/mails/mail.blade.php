<div class="container">
    <h1>Your Deliveboo Order</h1>
    <div>
        <p>Dear {{ $order->guest_firstname }} {{ $order->guest_surname }},</p>
        <p>Your order is on the way to you,please listen to your doorbell to receive your tasty food.</p>
        <p>Your food was sent to {{ $order->guest_address }}</p>
        <p>Your total was {{ $order->total }} Euros</p>
        <p>Enjoy your food!</p>
        <div>Sincerely</div>
        <h3>THE DELIVEBOO TEAM</h3>
    </div>
</div>
