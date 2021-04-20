# Install Project
```bash
 symfony new Book --full --version=5.2
```
# Première execution
```bash
 symfony serve
```
# Premier controller
```bash
 #test console
 symfony console
 #puis
 symfony console make:controller  
```
## Premier probleme
A ce stade pas de DB configurée.
Avec la route vers le controller Book, on a une erreur :
-->>Environment variable not found: "DATABASE_URL".
## Solution provisoire?
```bash
# Dans le fichier .env
DATABASE_URL="mysql://root:@127.0.0.1:3306/db_books_eyrolles"
#depuis le terminal
symfony console doctrine:database:create
#taper l'adresse
http://localhost:8000/book
#on arive sur le bon controller qui lance sa vue
```