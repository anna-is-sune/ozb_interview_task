# Prerequisite

- Install [Docker](https://www.docker.com/)
Docker compose should be included. If not, you can run the following command line to install.
```
curl -L https://github.com/docker/compose/releases/download/1.24.1/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
```



3. run command to start docker
```
docker compose build --pull --no-cache 
docker compose up -d
```

