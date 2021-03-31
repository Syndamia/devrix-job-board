#!/bin/bash

DEFAULT_DIR="/var/www/devrix-job-board/"

if [ ! -d "$DEFAULT_DIR" ]; then
	sudo -u www-data mkdir $DEFAULT_DIR
fi

sudo cp -R ./src/. $DEFAULT_DIR
sudo chown -R www-data:www-data $DEFAULT_DIR*
