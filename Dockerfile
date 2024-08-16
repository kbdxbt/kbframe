FROM webdevops/php-nginx:8.2-alpine

# 配置nginx
COPY ./docker/nginx/vhost.conf /opt/docker/etc/nginx/vhost.conf

# php配置
ENV PHP_MEMORY_LIMIT  '2048M'
ENV PHP_POST_MAX_SIZE  '200M'
ENV PHP_UPLOAD_MAX_FILESIZE  '200M'
ENV PHP_MAX_EXECUTION_TIME  600

#nginx配置
ENV SERVICE_NGINX_CLIENT_MAX_BODY_SIZE  '200m'

#php-fpm配置
ENV FPM_PM_MIN_SPARE_SERVERS 10
ENV FPM_PM_MAX_SPARE_SERVERS 30
ENV FPM_PM_START_SERVERS 10
ENV FPM_PM_MAX_CHILDREN 150
ENV FPM_MAX_REQUESTS 1000

## 把项目复制到容器对应目录
COPY ./ /app

WORKDIR /app

RUN rm -rf  /app/.git

RUN composer install -o --no-dev

RUN set -ex;\
    #代码部署
    if [[ ! -f "/app/.env" ]] && [[ -f "/app/.env.example" ]];\
    then\
       cp /app/.env.example /app/.env;\
       php artisan app:key-generate;\
       php artisan jwt:secret --force;\
    fi; \
#    if [[ ! -f "/app/storage/configure/plus.yml" ]] && [[ -f "/app/storage/configure/plus.yml.example" ]];\
#    then\
#      cp /app/storage/configure/plus.yml.example /app/storage/configure/plus.yml;\
#    fi; \
    php artisan storage:link  && \
    chown -R application:application /app/  && \
    chmod -R 775 /app/storage;

RUN php artisan optimize
