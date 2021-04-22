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
# Test profiler
barre du bas, tester l'onglet routing
```bash
#voir les routes et les noms de routes
symfony console debug:router
```
# Controller et routes
## Annotations
ici avec nom de route préfixé par app_ et methode HTTP
```php
    /**
     * @Route("/book", name="app_book", methods={"GET})
     */
```
## Méthodes et types de réponse
1. render() permet d'aller vers une vue html entre autre
2. On peut aussi avoir d'autre types de réponse, voir la méthode `message()`
## Routes et wildcard
Façon de gérer les paramètres des méthodes avec Symfony
# Twig
Voir le code autour du controller book
# Exemple de code
```php
    {% block body %}

    {% for d in data %}
        {% if loop.index0 == 0 %}
            <p style="color:hotpink">{{d.name}} {{d.action}}</p>
        {% else %}
            <p>{{d.name}} {{d.action}}</p>
        {% endif %}
    {% endfor %}

{% endblock %}
```

__NB__: 
-{% %} pour éxecuter
-{{ }} pour afficher

# Entity
## Créer une entité
```bash
 #test console et mot clé = doctrine (ORM)
symfony console

symfony console make:entity

```
## Modifier une entité
J'ai créé une entité mais j'ai oublié quelques attributs
```bash
 #test console et mot clé = doctrine (ORM)
symfony console
symfony console make:entity Book
#ajouter les champs requis
```

# Migrations
```bash
symfony console make:migration
```
Un fichier avec le code relatif au SGBD(Systeme de Gestion de la Base de Données) utilisé est créé
```bash
console doctrine:migrations:migrate
```

# Fixture
-comment alimenter la base de données pour la premiere fois
-systeme qui s'intalle en mode dev
```bash
composer require --dev doctrine/doctrine-fixtures-bundle
# à propose du cache
symfony console cache:clear
```

# Controller et Bookrepository
-Selection de Book enregistrés dans notre base
-plusieurs méthodes

# Suite à faire ensemble
1. Modifier l'entité Book
    -Ajouter un champ résumé
    -Ajouter un champ prix
2. Refaire une migration
3. Modifier la fixture
4. Ajouter au controller une méthode détail
    -Ajouter la vue book/détail.html.twig
5. Dans la vue d'accueil, ajouter un lien qui amène au détail.

