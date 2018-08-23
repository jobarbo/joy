/* Modules
------------------------------------- */
var gulp            = require('gulp'),
  // Tools
  watch           = require('gulp-watch'),
  rename          = require("gulp-rename"),

  // Styles
  sass            = require('gulp-sass'),
  autoprefixer    = require('gulp-autoprefixer'),
  minifyCSS       = require('gulp-minify-css'),
  moduleImporter  = require('sass-module-importer'),

  // Scripts
  uglify          = require('gulp-uglify'),
  rjs             = require('gulp-requirejs-optimize'),

  // BrowserSync
  browserSync     = require('browser-sync'),

  // Prevent watch from crashing on errors
  plumber         = require('gulp-plumber'),

  // get external configs
  rjs_paths       = require('./rjs/rjs-paths.json'),
  rjs_shims       = require('./rjs/rjs-shims.json'),

  gulp_src        = gulp.src,

  mainNpmFiles    = require('main-npm-files'),
  flatten         = require('gulp-flatten');

    // Debug (optional)
    // debug         = require('gulp-debug');

gulp.src = function() {
  return gulp_src.apply(gulp, arguments)
    .pipe(plumber(function(error) {
      console.log(error);
      this.emit('end');
    })
  );
};


/* Paths
------------------------------------- */
var paths = {
  sass: '../sass/',
  css: '../css/',
  js: '../js/',
  data: '../../data/',
  templates: '../../templates/'
};


/* Tasks
------------------------------------- */
// BrowserSync Task
gulp.task('browsersync', function() {
  // If you use vhosts, duplicate 'bs_config.json.sample', rename it 'bs_config.json'
  // and add the address of your local server in that file
  var bsConfig = false;

  try {
      bsConfig = require('./bs_config.json');
  } catch (e) {
    bsConfig = {
      proxy: "localhost:8888" // Do NOT edit this
    };
  }

  browserSync(bsConfig);

});

// RequireJS
gulp.task('requirejs', function() {
    gulp.src(paths.js + 'main.js')
    .pipe(rjs({
        baseUrl: paths.js,
        optimize: 'none',
        name: 'main',
        out: 'application.js',
        deps: ['almond'],
        paths: rjs_paths,
        shim: rjs_shims
    }))
    .pipe(gulp.dest(paths.js))
    .pipe(uglify({
        mangle: true,
        output: {
          comments: 'some'
        }
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(paths.js))
    .pipe(browserSync.reload({stream: true}));
});

// Autoprefixer Task
gulp.task('autoprefix', function () {
  gulp.src(paths.css + 'application.css')

    .pipe(gulp.dest(paths.css))
    .pipe(browserSync.reload({stream: true}));
});

// Minify-CSS Task
gulp.task('minify', function() {
  gulp.src([paths.css+'*.css', '!'+paths.css+'*.min.css'])
    .pipe(minifyCSS({keepBreaks:false}))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(paths.css));
  gulp.src(paths.js + 'application.js')
    .pipe(uglify({
        mangle: true,
        preserveComments: 'some'
      }))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(paths.js));
});

// Sass Task
gulp.task('sass', function () {
  gulp.src(paths.sass + 'application.sass')
    .pipe(sass({
      indentedSyntax: true,
      importer: moduleImporter()
    }))

    //Autoprefixer
    .pipe(autoprefixer({
        browsers: ['> 2%', 'iOS >= 8', 'ie >=  10'],
        cascade: false
    }))
    .pipe(gulp.dest(paths.css))

    //Minification
    .pipe(minifyCSS({keepBreaks:false}))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(paths.css))

    .pipe(browserSync.reload({stream: true}));
});

gulp.task('reload', function() {
   browserSync.reload();
});

gulp.task('main-files', function()  {
  gulp.src(mainNpmFiles('**/*.js'), {base: 'node_modules'})
      .pipe(flatten({ includeParents: 1}))
      .pipe(gulp.dest(paths.js + 'plugins'));
  gulp.src(mainNpmFiles('**/*.?(css|scss|sass)'), {base: 'node_modules'})
    .pipe(flatten({ includeParents: 1}))
    .pipe(gulp.dest(paths.css + 'plugins'));
  gulp.src(mainNpmFiles('**/*.?(jpg|jpeg|png|gif)'), {base: 'node_modules'})
    .pipe(flatten({ includeParents: 1}))
    .pipe(gulp.dest(paths.base + 'img/plugins'));
});


/* METHODS
------------------------------------- */

//
//
// Watch Task
gulp.task('watch', ['sass', 'requirejs'], function () {
    gulp.watch(paths.sass+'**/*.sass', ['sass']);
    gulp.watch([paths.js+'**/*.js', '!'+paths.js+'application*.js'], ['requirejs']);
    gulp.watch(paths.data+'**/*.*', ['reload']);
    gulp.watch(paths.templates+'**/*.*', ['reload']);
});

//
//
// EXPORT
gulp.task('export', ['minify']);

//
//
// SYNC
gulp.task('sync', ['browsersync', 'watch']);

//
//
// DEFAULT
gulp.task('default', ['sync']);
