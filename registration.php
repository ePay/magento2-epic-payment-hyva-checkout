<?php
declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Epay_Magento2EpicPaymentHyvaCheckout',
    __DIR__
);
