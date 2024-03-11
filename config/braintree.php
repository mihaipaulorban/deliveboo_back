<?php

return [
    'environment' => env('BRAINTREE_ENVIRONMENT', 'sandbox'), // Imposta 'sandbox' come valore predefinito se BRAINTREE_ENVIRONMENT non è definito
    'merchantId' => env('BRAINTREE_MERCHANT_ID'),
    'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
    'privateKey' => env('BRAINTREE_PRIVATE_KEY')
];
