FROM php:8.3-fpm-alpine

ARG USER_NAME=userLaravel
ARG GROUP_NAME=groupLaravel
ARG UID
ARG GID
 
ENV UID=${UID}
ENV GID=${GID}

RUN addgroup -g ${GID} --system ${GROUP_NAME}
RUN adduser -G ${GROUP_NAME} --system -D -s /bin/sh -u ${UID} ${USER_NAME}

RUN sed -i "s/user = www-data/user = ${USER_NAME}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${GROUP_NAME}/g" /usr/local/etc/php-fpm.d/www.conf

USER ${USER_NAME}

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

EXPOSE 9000