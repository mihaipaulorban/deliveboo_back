<div class="container">
    @php
        $counts = array_count_values($foodNames);
    @endphp
    <h1>Your Deliveboo Order</h1>
    <div>
        <p>Dear {{ $order->guest_firstname }} {{ $order->guest_surname }},</p>
        <p>Your order is on the way to you,please listen to your doorbell to receive your tasty food.</p>
        <p>Your food was sent to {{ $order->guest_address }}</p>
        <p>Your total was {{ $order->total }} Euros</p>
        {{-- @foreach ($counts as $item => $count)
            Item {{ $item }} appears {{ $count }} times.<br>
        @endforeach --}}
        @foreach ($counts as $food => $count)
            Item {{ $food }} appears {{ $count }} times.
            @if (!$loop->last)
                <br>
            @endif
        @endforeach
        <p>Enjoy your food!</p>
        <div>Sincerely</div>
        <h3>THE DELIVEBOO TEAM</h3>
    </div>
</div>
