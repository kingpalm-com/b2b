A B2B module for [kingpalm.com](https://kingpalm.com).

## How to install
```
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer require kingpalm/b2b:*
bin/magento cache:enable
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy \
	--area adminhtml \
	--theme Magento/backend \
	-f en_US
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme Smartwave/porto_child \
	-f en_US
bin/magento maintenance:disable
```

## How to upgrade
```
bin/magento maintenance:enable
composer remove kingpalm/b2b
rm -rf composer.lock
composer clear-cache
composer require kingpalm/b2b:*
bin/magento cache:enable
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy \
	--area adminhtml \
	--theme Magento/backend \
	-f en_US
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme Smartwave/porto_child \
	-f en_US
bin/magento maintenance:disable
```

## Screenshots
![](https://mage2.pro/uploads/default/original/2X/c/c1291a75b828366b710e8f82cfbe8173f95f1ce4.png)

![](https://mage2.pro/uploads/default/original/2X/a/adf0d0f720d9231dd453034e81f3dfe6544bc0d0.png)

![](https://mage2.pro/uploads/default/original/2X/0/0533299914170b64100dc89102fd6a5927496a17.png)