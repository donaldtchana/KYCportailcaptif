<?php



use Omnipay\Omnipay;

define('CLIENT_ID', 'PAYPAL_CLIENT_ID_HERE');
define('CLIENT_SECRET', 'PAYPAL_CLIENT_SECRET_HERE');

define('PAYPAL_RETURN_URL', 'http://localhost/ecommerce/paie_success');
define('PAYPAL_CANCEL_URL', 'http://localhost/ecommerce/paie_fail');
define('PAYPAL_CURRENCY', 'USD');

$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(get_setting($db,"paypal_client_id"));
$gateway->setSecret(get_setting($db,"paypal_key_secrete"));
$gateway->setTestMode(true);