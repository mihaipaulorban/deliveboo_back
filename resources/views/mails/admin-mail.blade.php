<div class="container">
    <div class="inner-container">
        <h2>Dear User</h2>
        <div>A new order of {{ $order->total }} € has ben sent to your restaurant.</div>
        <div>your can check your orders in you Admin page on the website.</div>
        <div>Sincerely</div>
        <h3>THE DELIVEBOO TEAM</h3>
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
