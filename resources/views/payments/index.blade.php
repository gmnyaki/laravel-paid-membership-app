@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <h2> Membership Payment. </h2>
            <form action="/payments/redirect" method="post" id="payment-form">
                @csrf
                <div id="card-element"></div>
                <p id="cardError" style="color: red"></p>
                <button id="pay-button" class="pay-button">Pay Now</button>
            </form>
        </div>
    </div>
    <script>
        const stripe = Stripe('{{ config('stripe.key') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        const payButton = document.getElementById('pay-button');

        payButton.addEventListener('click', async (event) => {
            event.preventDefault();
            document.getElementById("cardError").innerHTML = '';

            payButton.disabled = true;
            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            });

            if (error) {
                payButton.disabled = false;
                document.getElementById("cardError").innerHTML = error.message;
            } else {
                const { paymentIntent, error } = await stripe.confirmCardPayment(
                    '{{ $paymentIntent->client_secret }}', {
                        payment_method: paymentMethod.id,
                    }
                );

                if (error) {
                    payButton.disabled = false;
                    document.getElementById("cardError").innerHTML = error.message;
                    console.error(error);
                } else {
                    form.submit();
                }
            }
        });

    </script>

    <style>
        .pay-button {
            background-color: #00BFA5;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pay-button:hover {
            background-color: #008e76;
        }

        #card-element {
            margin-top: 12px;
        }
    </style>
@endsection
