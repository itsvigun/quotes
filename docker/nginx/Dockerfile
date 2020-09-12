FROM nginx:1.15.0

RUN apt-get update && apt-get install -y \
       vim
RUN mkdir /etc/nginx/sites-available
RUN mkdir /etc/nginx/sites-enabled
ADD nginx.conf /etc/nginx/
ADD quotes.conf /etc/nginx/sites-available/

RUN ln -s /etc/nginx/sites-available/quotes.conf /etc/nginx/sites-enabled/quotes && mv /etc/nginx/conf.d/default.conf ../

RUN echo "upstream php-upstream { server php-fpm:9000; }" > /etc/nginx/conf.d/upstream.conf

RUN usermod -u 1000 nginx

EXPOSE 80
EXPOSE 443
