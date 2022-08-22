FROM s1riu5/lamp:7.2


COPY schema.sql /docker-entrypoint-initdb.d/


COPY src/ /var/www/html

RUN echo "flag{fffllllaaggggg}" > /flag

RUN chmod -R 777 /var/www/html \
    && rm -rf /var/www/html/index.html 


