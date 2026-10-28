<?php
declare(strict_types=1);

namespace Epay\Magento2EpicPaymentHyvaCheckout\Block\Checkout\Payment;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

class Description extends Template
{
    private const CODES = [
        'epayepicpayment',
        'epayepicpayment_anyday',
        'epayepicpayment_applepay',
        'epayepicpayment_googlepay',
        'epayepicpayment_klarna',
        'epayepicpayment_mobilepay',
        'epayepicpayment_swish',
        'epayepicpayment_viabill',
    ];

    private ScopeConfigInterface $scopeConfig;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }

    public function getDescription(): string
    {
        $code = $this->getMethodCode();
        if ($code === null) {
            return '';
        }

        return (string)$this->scopeConfig->getValue(
            'payment/' . $code . '/description',
            ScopeInterface::SCOPE_STORE
        );
    }

    private function getMethodCode(): ?string
    {
        $method = $this->getData('method');
        if (!is_object($method) || !method_exists($method, 'getCode')) {
            return null;
        }

        $code = (string)$method->getCode();

        return in_array($code, self::CODES, true) ? $code : null;
    }
}
