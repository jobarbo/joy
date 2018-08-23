Démarrer un projet avec la base d'Assets
=========================================

1. À l'aide du terminal, rendez-vous à l'intérieur du dossier `_gulp` .
2. `yarn` pour installer gulp et les autres dépendances en mode Global.
3. `gulp` pour démarrer Gulp.
4. Pour plus de détails sur Yarn, consultez l'article sur [Root](http://root.o2web.ca/base-dassets-transition-vers-yarn/).

------
------
------

Javascript
==========

### RequireJS
Afin de segmenter notre Javascript en modules indépendants, nous utilisons RequireJS pour sa capacité à compiler plusieurs fichiers en un seul. 
Le point de départ de la compilations se trouve dans le fichier `main.js`. Référencez chaque fichiers à compiler à l'intérieur du _array_ `require([...])`;

```
// DEFINE MODULE
require([
  'plugin-one',
  'plugin-two',
  'modules/my-module'   // require your plugins and modules here
], function($){

   // in order to keep your code clean, create individual files for each feature.
   // place your files under /modules or /plugins

}); // ... and that's about it for the main.js file.
```

### Ajouter des plugins JS

Si vous voulez ajouter de nouveaux plugins, vous devrez tout d'abord les ajouter dans la liste qui se trouve ici : `_gulp/requireJS.json`. 
Voici les informations requises : 

```
"cookie":{  // identifiant unique utilisé par RequireJS 
  "bower"     : "js-cookie",    // identifiant du répertoire Bower (optionnel)
  "version"   : "~2.0",         // Version requise (optionnel)
  "path"      : "plugins/js-cookie/js.cookie"  // Chemin d'accès où se trouve le fichier principal, relatif au main.js (requis)
},
```

Vos plugins peuvent être ajoutés de deux façons : ils peuvent être chargés _via_ Bower, ou encore être versionnés dans le projet _via_ GIT. 
Dans le deuxième cas, vos plugins seront versionnés automatiquement s'ils sont placés dans les dossiers `js/plugins/o2/` ou `js/plugins/app`.

Une fois que vous avez modifié le fichier `requireJS.json`, vous devrez redémarrer Gulp et mettre à jour la liste de _paths_ utilisés par RequireJS :

1. Assurez-vous que Gulp est arrêté : `ctrl + c`
2. Générez les chemins d'accès et télécharger les plugins avec Yarn : `yarn`
3. Redémarrez Gulp ! `gulp`

------
------
------


Structure de dossiers
=====================

_gulp/
-----

C'est ici que tout se gère l'automatisation avec Gulp.
Roulez `gulp` dans ce dossier pour démarrer Gulp.


Gulpfile.js
-----------

Les actions de base (compilation du sass, compilation et minification du javascript, intégration de BrowserSync, etc.) sont déjà configurées.
Si vous souhaitez changer le proxy utilisé par BrowserSync (localhost:8888 par défaut), pour le remplacer par un vhost par exemple, vous pouvez le faire dans le Gulpfile.

Pour minifier votre code, utilisez la commande : `gulp export`


Assets
------

### css/

Contient le CSS compilé (application.css) ainsi que d'autres fichiers qui sont en CSS et non en SASS (reset.css, feuilles de styles de plugins jQuery, etc.)

### fonts/

Contient les webfonts s'il y a lieu ainsi qu'une structure de fichiers de base pour générer une font d'icônes avec [Fontcustom](http://fontcustom.com/)

Pour utiliser le template de font d'icône:

1. Commencez par installer fontcustom (voir lien plus haut).

2. Enregistrez les icônes dans le dossier svg.

3. Ensuite, en ligne de commande, rendez vous au dossier icons et faites la commande `fontcustom compile`. Ça va créer les fichiers de la font ainsi qu'un fichier SASS qui va aller se placer tout seul dans la base SASS (dossier 0.base/helpers). Ça va vous permettre d'utiliser les icônes à l'aide de classes, d'attributs data ou avec une mixin. Ne modifiez pas ce fichier directement parce qu'il va être écrasé si vous recompilez la font. Vous pouvez utiliser le fichier 3.typography/_icons.sass pour ajouter ou modifier les styles des icônes.

4. Si vous utilisez une font d'icône, allez décomenter la ligne `@import 0.base/helpers/icons` dans application.sass.

### img/

Contient les images du site qui sont utilisées par le css (les images qui servent à la présentation uniquement). Les images de contenu devraient se retrouver dans un dossier d'uploads lié au CMS.

### js/

#### main.js

Sert à importer les modules et définir les variables globales.
Si vous désirez ajouter de nouveaux plugins à votre site/app, n'oubliez pas de les ajouter dans le fichier `_gulp/requireJS.json`, puis rouler la commande `yarn` dans ce même dossier.
Peut également être utilisé pour «coder dur» votre javascript dans le cadre de petits projets

#### modules/

Contient les différents modules. Au départ, init.js et breakpoints.js sont fournis.

Init.js sert à initialiser les différents modules en fonction de leur scope.

Breakpoints.js sert à initialiser ou annuler les modules en fonction de breakpoints définis.

Chaque module contient une ou des fonctions stockées dans des variables globales qui pourront être appelées à partir de init.js ou breakpoints.js. Chaque module peut faire appel aux autres scripts dont il a besoin pour fonctionner.

#### vendor/

Tous les plugins et les librairies venant de sources externes se retrouvent dans le dossier vendor. On peut utiliser Bower et Gulp pour ajouter automatiquement les fichiers requis dans ce dossier (voir instructions de Bower plus bas).

### sass/

Base de travail en SASS. Documentation à venir.
