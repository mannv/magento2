https://vi-magento.com/danh-sach-magento-2/

# magento2

```
composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition magento2
```

```
export PATH=$PATH:/var/www/magento2/bin
php /var/www/magento2/bin/magento list
```

```
php magento setup:install \
--base-url=http://localhost \
--db-host=mysql \
--db-name=db_web \
--db-user=default \
--db-password=123 \
--admin-firstname=admin \
--admin-lastname=admin \
--admin-email=admin@admin.com \
--admin-user=admin \
--admin-password=admin123 \
--language=en_US \
--currency=USD \
--timezone=Asia/Bangkok \
--use-rewrites=1 \
--search-engine=elasticsearch7 --elasticsearch-host=elasticsearch --elasticsearch-port=9200
```

```
php magento module:disable Magento_TwoFactorAuth
```