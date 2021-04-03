# devrix-job-board

The repository for my solution of DevriX's exam for their internship program.

It's an oversimplified job offer website, (roughly) following the MVC design pattern and using the LAMP stack (with MySQL).

## Contents
- [Getting started](#Getting%20started)
- [Tools](#Tools)

## Getting started

1. As previously mentioned, the project uses the LAMP stack. Links on setting it up: [Ubuntu 20.04](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04), [Debian 8](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-debian-8) or [CentOS 8](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mariadb-php-lamp-stack-on-centos-8).

2. Currently this repo provides an Apache configuration file (`configs/devrix-job-board.conf`) with the localhost domain `djb.local`.
   - To use that domain, you'll also need to open your `/etc/hosts` file and add on a new line line `127.0.0.1	djb.local`, but **be wary**, it will break any other localhost domains you've setup.
   - If you wanna use it in a server-hosted environment, update the values of `ServerName` and `ServerAlias` with your desired domain and subdomain.

3. Finally, we'll need to move the source code to the `/var/www/devrix-job-board/` folder.
   - This (and creating the folder if it doesn't exist) can be done automatically, just run with sudo the `move-to-www.sh`:
     ```
     sudo ./tools/move-to-www.sh
     ```

## Tools

This repo contains some tools that could be useful during setup and development of the app. They're all located in the `tools` folder.

1. `move-to-www.sh` - moves the source code (located in `src`) to the `/var/www/devrix-job-board/` folder
2. `watch-move-to-www.sh` - does the same thing as `move-to-www.sh`, but does it automatically every time you update a file inside the `src` folder. Especially useful while developing the application.
   - Dependencies: [`inotify-tools`](https://pkgs.org/download/inotify-tools)
