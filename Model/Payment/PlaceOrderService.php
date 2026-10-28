<?php
declare(strict_types=1);

namespace Epay\Magento2EpicPaymentHyvaCheckout\Model\Payment;

use Hyva\Checkout\Model\Magewire\Payment\AbstractPlaceOrderService;
use Magento\Quote\Model\Quote;

class PlaceOrderService extends AbstractPlaceOrderService
{
    public function canRedirect(): bool
    {
        return true;
    }

    public function getRedirectUrl(Quote $quote, ?int $orderId = null): string
    {
        return 'epay/payment/redirect';
    }
}
