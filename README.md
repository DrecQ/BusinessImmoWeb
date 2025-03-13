Ce que j'ai retenu comme étapes en faisant cet projet :

- Le model permet de créer le format de donnéees dans la base de données. La creation des modèles est suivi de la création des migrations. Les migrations représentes la structure des informations à envoyées dans la base de données. C'est un raccourci que nous offre Laravel afin de pouvoir disposer d'un script pour générer notre base de données à tout momentC'est la première chose à faire après la création du projet 

- Ensuite il faut définir les routes, le système de routing qui va permettre la navigation au sein de l'application. Dans le cas de la réalisation d'un CRUD, il est recommandé d'utiliser la méthode resource.  

- L'étape qui suit doit être la creation des Requests, c'est un moyen de vérifier et de sécuriser les entrées et les autorisations dans l'applications.

- Vient maintennat l'étape de la logique de code qui est géré par les controllers... Tout ce qui sera renvoyé à la vue est au préalable traité et ajouter grâce aux controllers

-Enfin l'étape finale est la création des vues. Pour rendre le code modulable, on peut utiliser des composants et des propriétés spécifiques de blade qui permettent de rendre le style très dynamique 
