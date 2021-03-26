# Docker setup

Using docker we can simplify and streamline local development environments.

---

## How to

Install [docker desktop](https://www.docker.com/products/docker-desktop). While docker compose should install with docker desktop, compose is crucial for this to work, so make sure you have it installed before you continue (`docker-compose -v`). If you don't have it read the [Docker Compose install page](https://docs.docker.com/compose/install/).

Once you have Docker up and running (check for the Docker Whale icon in your task/menubar), navigate to the project root folder in terminal.

1. If this is the first time you run this (else skip to step 2), **build the app container**:

`docker-compose build app`

> Depending on what images you already have on your local machine _this can take some time_. So get yourself a fresh ☕️ and hang tight. **NOTE!** Subsequent starts will normaly only take 2-3 seconds 😉

2. When the app is done building, it's time to **start the app container**:

`docker-compose up -d`

3. Again, if this is the first time you initiate all of this you will need to install all composer and npm dependencies:

`docker-compose exec app composer i && npm i`

---

Once everything is done you can view the app on [https://localhost](https://localhost).

The next time you want to start the app container you can do it directly in docker or run:

`docker-compose up -d` in the project root folder 👍

## Web server - NGINX

NGIX is set to use port 80. If you have other services running on port 80 this will cause the NGINX container to crash on start.

1. To **find services using port 80** you can run: `lsof -nti:80` (Mac/Linux). _This will show the process identifier (a.k.a PID) that's using port 80._

2. To **terminate the process** you can run: `kill <PID>`, where `<PID>` is the numer you got from step 1. **NOTE!** If for some reason the kill command doesn't terminate the process you can run `kill -SIGKILL <PID>`. Normally the number 9 is used for SIGKILL, but for clarity (so you know the command being run and not some arbitrary number) the following commands are the same:

-   `kill -9 <PID>`
-   `kill -KILL <PID>`
-   `kill -SIGKILL <PID>`

3. As a final solution you can edit the `docker-compose.yml` file on **line 42** and set the left value to whatever port you want. **NOTE!** If you do this, remember **TO NOT COMMIT THIS CHANGE**. It should only be a temporary solution for your local environment.

**Suggestion:** If you find yourself doing certain commands over and over it could be worth looking in to alias commands in your prefered terminal (e.g. zsh, bash etc). For example you could set up `kill80` as a simple shortcut that will stop all processes using port 80 👌

## Database - PMA

If you need to work with the database you can either view it thru [phpmyadmin](http://localhost:8081) or by going to the MySQL container in the CLI via docker.

The persistent database is in `clonedb`. If for whatever reason you want to trash it, run the following in terminal:

-   `docker-compose down` to **stop containers**
-   `docker volume ls` to **list current volumes**, make sure `clonedb` is there
-   `docker volume rm clonedb` to **delete** clonedb **persistant data**

To **delete all volumes**:

-   `docker-compose down` to **stop containers**
-   `docker rm -f $(docker ps -a -q)` to **delete all containers**
-   `docker volume rm $(docker volume ls -q)` to **delete all volumes**
