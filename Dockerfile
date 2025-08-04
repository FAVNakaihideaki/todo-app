# ベースイメージ（PHP 8.2 + FPM）
FROM php:8.2-fpm

# システムパッケージのインストール（zipやpdo_mysqlなど）
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install pdo_mysql zip

# Composerのインストール（composer公式イメージからコピー）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/html

# ソースコードをコンテナにコピー
COPY . .

# Composerで依存パッケージをインストール
RUN composer install --no-dev --optimize-autoloader

# Laravelのキャッシュファイルの権限調整（必要なら）
RUN chown -R www-data:www-data storage bootstrap/cache

# ポート開放（PHP-FPMのデフォルト）
EXPOSE 9000

# コンテナ起動時にphp-fpmを実行
CMD ["php-fpm"]
