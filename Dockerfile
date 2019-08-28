FROM kimbtechnologies/php_nginx:latest

# copy sourcecode
COPY --chown=www-data:www-data ./system/ /php-code/
COPY ./build/createInitalUser.php /createInitalUser.php

# place config and translation outside, config done by env
RUN rm /php-code/data/config.json /php-code/data/config.example.json \
	&& echo $' \n\
	# protect private directories \n\
	location ~ ^/(data|php){ \n\
		deny all; \n\
		return 403; \n\
	} \n\
	# first try to serve as file or folder, on error return 404 \n\
	location / { \n\
		try_files $uri $uri/ =404; \n\
	} \n\
	' > /etc/nginx/more-server-conf.conf \
	&& mkdir /data-dir-default/ \
	&& cp -r /php-code/data/* /data-dir-default

# tell the system that it runs in docker container
ENV DOCKERMODE=true \
	CONF_domain=http://localhost:8080 \
	CONF_impressum_url=http://example.com/impressum \
	CONF_impressum_name=Impressum \
	CONF_markdown_info=true \
	CONF_syspoll=60

CMD ["sh", "-c", "php /createInitalUser.php && sh /startup.sh"]