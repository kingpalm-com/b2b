A B2B module for [kingpalm.com](https://kingpalm.com).

## How to install
```
bin/magento maintenance:enable
composer clear-cache
composer require kingpalm/b2b:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
rm -rf pub/static/* && bin/magento setup:static-content:deploy -f en_US --area adminhtml --theme Magento/backend && bin/magento setup:static-content:deploy -f en_US --area frontend --theme Magento/kingpalm
bin/magento maintenance:disable
bin/magento cache:enable
```

## How to upgrade
```
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer update kingpalm/b2b
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
rm -rf pub/static/* && bin/magento setup:static-content:deploy -f en_US --area adminhtml --theme Magento/backend && bin/magento setup:static-content:deploy -f en_US --area frontend --theme Magento/kingpalm
bin/magento maintenance:disable
bin/magento cache:enable
```

If you have problems with these commands, please check the [detailed instruction](https://mage2.pro/t/263).

## Screenshots
![](https://mage2.pro/uploads/default/original/2X/c/c1291a75b828366b710e8f82cfbe8173f95f1ce4.png)

![](https://mage2.pro/uploads/default/original/2X/a/adf0d0f720d9231dd453034e81f3dfe6544bc0d0.png)

![](https://mage2.pro/uploads/default/original/2X/0/0533299914170b64100dc89102fd6a5927496a17.png)