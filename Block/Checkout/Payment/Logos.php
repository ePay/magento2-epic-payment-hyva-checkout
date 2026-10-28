<?php
declare(strict_types=1);

namespace Epay\Magento2EpicPaymentHyvaCheckout\Block\Checkout\Payment;

use Epay\Magento2EpicPaymentModule\Model\Ui\ConfigProvider;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\View\Element\Template;

class Logos extends Template
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

    private ConfigProvider $configProvider;
    private SerializerInterface $serializer;

    public function __construct(
        Template\Context $context,
        ConfigProvider $configProvider,
        SerializerInterface $serializer,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->configProvider = $configProvider;
        $this->serializer = $serializer;
    }

    public function getLogosJson(): string
    {
        $config = $this->configProvider->getConfig();
        $paymentConfig = $config['payment'] ?? [];
        $logos = [];

        foreach (self::CODES as $code) {
            $methodLogos = $paymentConfig[$code]['logos'] ?? [];
            if ($methodLogos !== []) {
                $logos[$code] = $methodLogos;
            }
        }

        return $this->serializer->serialize($logos);
    }
}
