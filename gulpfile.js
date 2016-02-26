// gulpfile.js

// --- INIT
var gulp = require('gulp'),
    less = require('gulp-less'), // compiles less to CSS
    sass = require('gulp-sass'), // compiles sass to CSS
    minify = require('gulp-minify-css'), // minifies CSS
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'), // minifies JS
    rename = require('gulp-rename'),
    livereload = require('gulp-livereload'),
    imagemin = require('gulp-imagemin'),
    autoprefixer = require('gulp-autoprefixer');


// Paths variables
var paths = {
    'dev': {
        'less'  : 'dev/less/',
        'img'   : 'dev/img/',
        'js'    : 'dev/js/',
    },
    'assets': {
        'css'   : 'public/assets/css/',
        'js'    : 'public/assets/js/',
        'img'   : 'public/assets/img/',
    }

};

gulp.task('frontend.css', function() {
  return gulp.src(paths.dev.less+'frontend.less') // get file
    .pipe(less())
    .pipe(gulp.dest(paths.assets.css))
    .pipe(autoprefixer({
      browsers: ['last 15 versions'],
      cascade: true
    }))
    .pipe(minify({keepSpecialComments:0, keepBreaks: true}))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(paths.assets.css));
});

gulp.task('frontend.js', function(){
  return gulp.src([
      paths.assets.vendor+'jquery/dist/jquery.js',
      paths.assets.vendor+'bootstrap/dist/js/bootstrap.js',
      paths.dev.js+'frontend.js'
    ])
    .pipe(concat('frontend.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.assets.js));
});

gulp.task('imagemin', function(){
  return gulp.src(paths.dev.img+'/*')
    .pipe(imagemin({
      progressive: true
    }))
    .pipe(gulp.dest(paths.assets.img));
})
 
gulp.task('watch', function() {
  livereload('35729', 'localhost');
  livereload.listen();
  gulp.watch('resources/views/**/*.php', '').on('change', livereload.changed);
  gulp.watch('app/**/*.php', '').on('change', livereload.changed);
  gulp.watch(paths.dev.img+'/*', ['imagemin']).on('change', livereload.changed);
  gulp.watch(paths.dev.less+'/*.less', ['frontend.css']).on('change', livereload.changed);
  gulp.watch(paths.dev.js+'/*js', ['frontend.js']).on('change', livereload.changed);
});
