# ePay EPIC Payment Hyvä Checkout compatibility

Install this module only on stores using Hyvä Checkout:

```bash
composer require epay/magento2-epic-payment-hyva-checkout:^1.0
bin/magento setup:upgrade
bin/magento setup:di:compile
```

The package requires ePay EPIC Payment `^4.0.26` and Hyvä Checkout `^1.3`.
