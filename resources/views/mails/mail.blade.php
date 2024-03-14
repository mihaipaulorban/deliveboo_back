@php
    $counts = array_count_values($foodNames);
@endphp



<div class="container">
    <div class="inner-container">
        <div class="top">
            <h1>Your Deliveboo Order</h1>
        </div>
        <div>
            <p>Dear {{ $order->guest_firstname }} {{ $order->guest_surname }},</p>
            <p>Your order is on the way to you,please listen to your doorbell to receive your tasty food.</p>
            <p>Your food was sent to {{ $order->guest_address }}</p>
            <div>Here is a summary of your order:</div>
            @foreach ($counts as $food => $count)
                <div> {{ $food }} - {{ $count }}x.</div>
                @if (!$loop->last)
                    <br>
                @endif
            @endforeach
            <p>Total: {{ $order->total }} €</p>
            <p>Enjoy your food!</p>
            <div>Sincerely</div>
            <h3>THE DELIVEBOO TEAM</h3>
        </div>
    </div>
</div>
<style>
    .container {
        background-color: #386641;
        padding: 20px 0;
    }

    .inner-container {

        color: white;
        width: 800px;
        margin: auto;
    }

    .top {
        display: flex;
        justify-content: space-around;
        align-items: center;

    }
</style>
