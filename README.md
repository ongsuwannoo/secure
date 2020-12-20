# Kaidee.com | Project 06016309 INFORMATION SYSTEM SECURITY AND IT LAWS

## Docker example with Apache, MySql 8.0, PhpMyAdmin and Php

- You can use MySql 5.7 if you checkout to the tag `mysql5.7`

## Config
- Access for less secure apps
https://www.google.com/settings/u/0/security/lesssecureapps

- Edit `/www/secure/config.php`
```
$CONFIG['email_username'] = '*********@gmail.com';
$CONFIG['email_password'] = '*********';
 ```
 
## Start
I use docker-compose as an orchestrator. To run these containers:

```
docker-compose up -d
```

Open phpmyadmin at [http://localhost:8000](http://localhost:8000)
Open web browser to look at a simple php example at [http://localhost:8001](http://localhost:8001)

Run mysql client:

- `docker-compose exec db mysql -u root -p` 

Enjoy !
