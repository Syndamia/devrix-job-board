#!/bin/bash

if [ "$EUID" -ne 0 ]; then
	echo "Please run as root"
	exit
fi

DEFAULT_DIR="/var/www/devrix-job-board/"

if [ ! -d "$DEFAULT_DIR" ]; then
	mkdir $DEFAULT_DIR
	chown www-data:www-data $DEFAULT_DIR
fi

cp -R ../src/. $DEFAULT_DIR
chown -R www-data:www-data $DEFAULT_DIR*
