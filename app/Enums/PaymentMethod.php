<?php
namespace App\Enums;

enum PaymentMethod: string
{
    case Stripe = 'card';
    case CashOnDelivery = 'cash_on_delivery';
}
