# principle33

Steps:

1. clone this project:
```console
foo@bar:~$ git clone https://github.com/swishsh/principle33.git <project_name>
```

2. enter the project
```console
foo@bar:~$ cd <project_name>>
```

3. composer install
```console
foo@bar:~$ php composer.phar install
```

4. rise docker container (after installing docker + docker-compose)
```console
foo@bar:~$ docker-compose up -d
```

5. grab container_id
```console
foo@bar:~$ docker ps | grep <project_name>
```
6. run docker Index.php
```console
foo@bar:~$ docker exec -it <container_id> php Index.php
```

7. run phpunit
```console
foo@bar:~$ docker exec -it <container_id> vendor/bin/phpunit src/Tests/ContractBuilderTest.php
```