#!/bin/bash

DEFAULT_DIR="/var/www/devrix-job-board/"

if [ ! -d "$DEFAULT_DIR" ]; then
	-u www-data mkdir $DEFAULT_DIR
fi

inotifywait -m ./src/ -r -e attrib -e create -e move -e delete |
	while read dir action file; do
		echo "[`date +"%Y-%m-%d %T"`] Updated folder"
		cp -R ./src/. $DEFAULT_DIR
		chown -R www-data:www-data $DEFAULT_DIR*
	done
