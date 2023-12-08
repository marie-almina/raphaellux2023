
# Team Raphaellux

## To run the project (on Linux with docker installed and launchec)
- Clone the project
```
git clone url
```
- Lancer le docker compose (en background)
```
./vendor/bin/sail up -d
```
- Créer la BDD
```
./vendor/bin/sail artisan migrate
```
- Peupler la BDD
```
./vendor/bin/sail artisan db:seed
```
- Le projet est accessible sur localhost:80
