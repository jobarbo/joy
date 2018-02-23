//
//
// MAIN JS FILE
// everything starts here
// ======================


// A place to keep your global variables
window.app = {};


// JQUERY ?
// Décommentez pour utiliser un jQuery externe à application.js
// Application.js doit absoluement être inclu APRÈS jQuery.js
if(typeof jQuery === 'function') define('jquery', function () { return jQuery; });



// DEFINE MODULE
require([
  'jquery',
  'modules/init',
  // 'modules/custom-module',   // require your modules here
], function($){


  $(document).ready(function(){
    // code that require jQuery selections should always be executed after the document is ready.
  });


}); // ... and that's about it for the main.js file.

// everything else should go under /modules and /plugins
