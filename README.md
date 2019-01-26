# Marathon du Web 2014-2015


## Déroulement du concours


## Le sujet


Le projet a pour objectif de mettre en place une application WEB qui permettra à chaque internaute enregistré de raconter, modifier et visualiser le(les) périple(s) (voyage, road trip, ...) forcement extraordinaire qu'il vient de vivre. Les visiteurs anonymes pourront visualiser les voyages publiés. Pour pouvoir publier un voyage, le visiteur devra auparavant s'enregistrer puis s'identifier sur le site. 
Le visiteur identifié pourra créer, modifier, publier et retirer ses propres voyages. Il pourra également visualiser et commenter les voyages des autres membres

Un voyage possède une date de début et une date de fin. Son auteur pourra lui associer une liste de caractéristiques (tags) qui permettront de le rechercher dans la liste des voyages publiés. Un voyage est décrit par un texte court. Un média titre (photo, vidéo, son) lui est associé. Enfin un voyage est constitué d'une suite d'étages.

Une étape s'inscrit dans le temps, elle a une date de début et une date de fin. Elle est associée à un lieu. Une étape pourra faire l'objet d'une description textuelle accompagnée de documents multimédias tels que photos, enregistrements audios et/ou vidéos. 
Un voyage débute à la date de début de sa première étape et se termine à la date de fin de sa dernière étape. Pour le reste, la date de fin d'une étape correspond obligatoirement à la date de début de l'étape suivante. Pour une même étape,les dates de début et de fin peuvent être égales.

Un visiteur identifié pourra ajouter un commentaire à un voyage.

### Voyage 
 
Un **voyage** se compose d'une liste d'étapes. Il est caractérisé par : 

* un titre   
* une description
* une média titre
* état (publié ou non)

### Etape

Une **étape** est associée à un voyage. Elle représente un point de départ pour aller visiter des sites particuliers qui constituent l'intérêt du voyage. Une étape est caractérisée par :

* un intitulé
* une référence à un voyage
* un numéro d'ordre
* une date de début
* une date de fin
* une description sous la forme d'un texte
* une liste de médias

La date de début de la première étape correspond à la date de début du voyage. La date de fin de la dernière étape correspond à la date de fin du voyage. Le numéro d'ordre permet de classer les étapes qui se déroulent dans la même journée.

### Média

Un **média** accompagne la description d'une étape et/ou le voyage, il est caractérisé par :

* une URL
* sa nature  (image, son, vidéo, document)
* une référence à une étape

### Commentaire

Un voyage peut être commenté par les visiteurs identifiés. Le **commentaire** est un texte, il est caractérisé par :

* un auteur (utilisateur identifié)
* une date et une heure
* un contenu sous la forme d'un texte
* une référence à un voyage
* une évaluation du voyage (0 à 5)

### Utilisateur

Un **Utilisateur** est un visiteur inscrit et identifié.

* un pseudo
* un mot de passe
* actif

### Les acteurs de l'application

Les acteurs de l'application seront d'une part les **utilisateurs inscrits** qui pourront créer, modifier, supprimer  leurs voyages et les **visiteurs** qui pourra *pourront* visualiser les voyages.

![Cas d'utilisation][casutil]

## Travail à réaliser


### Obligatoire

* Inscription
* Authentification
* Création/modification d'un voyage
* Ajout/modification d'une étape sans gestion de la cohérence des dates et des numéros d'ordre
* Ajout/suppression d'un média
* Ajout de commentaires
* Visualisation de la liste des voyages publiés
* Visualisation de la liste des voyages de l'utilisateur authentifié
* Visualisation d'un voyage avec les commentaires
* Visualisation d'une étape avec les médias associés

* Publication d'un voyage avec un ou plusieurs médias associés (photos, vidéo, son)
* Anglais ...

### Options

* gestion de l'état des utilisateurs (activé, désactivé)
* Suppression des utilisateurs
* Suppression d'un voyage
* Modification/suppression d'une étape avec gestion de la cohérence des dates et des numéros d'ordre
* Gestion de la cohérence des dates
* Gestion de la cohérence des numéros d'ordre
* Modification/suppression des commentaires 
* Visualisation d'une liste de voyages en fonction d'un critère de filtrage
* Visualisation des commentaires suivant un critère de filtrage
* Enchaîner la visualisation des étapes consécutives d'un voyage


## Notations



## Recommandations



## Base de données


![Le système d'information][sysinfo]

