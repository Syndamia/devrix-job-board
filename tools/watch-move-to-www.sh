#!/bin/bash

if ! type "inotifywait" > /dev/null; then
	echo "You'll need to install inotify-tools!"
fi

if [ "$EUID" -ne 0 ]; then
	echo "Please run as root!"
	exit
fi

DEFAULT_DIR="/var/www/devrix-job-board/"

if [ ! -d "$DEFAULT_DIR" ]; then
	mkdir $DEFAULT_DIR
	chown www-data:www-data $DEFAULT_DIR
fi

inotifywait -m ../src/ -r -e attrib -e create -e move -e delete |
	while read dir action file; do
		echo "[`date +"%Y-%m-%d %T"`] Updated folder"
		cp -R ../src/. $DEFAULT_DIR
		chown -R www-data:www-data $DEFAULT_DIR*
	done
