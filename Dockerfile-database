FROM mysql:5.7

ENV MYSQL_DATABASE crud

COPY ./database/dump.sql /docker-entrypoint-initdb.d/
