FROM nginx:latest

# create group and user www with uid 1000
RUN groupadd -g 1000 www \
    && useradd -u 1000 -g www -s /bin/bash -m www

RUN usermod -u 1000 www
