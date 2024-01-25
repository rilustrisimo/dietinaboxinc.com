'use strict';
var browserify = require('browserify'),
  gulp = require('gulp'),
  sass = require('gulp-sass'),
  sassGlob = require('gulp-sass-glob'),
  sourcemaps = require('gulp-sourcemaps'),
  postcss = require('gulp-postcss'),
  postcssSCSS = require('postcss-scss'),
  autoprefixer = require('autoprefixer'),
  source = require('vinyl-source-stream'),
  buffer = require('vinyl-buffer'),
  newer = require('gulp-newer'),
  imagemin = require('gulp-imagemin'),
  fontmin = require('gulp-fontmin'),
  browserSync = require('browser-sync').create(),
  reload = browserSync.reload,
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  watch = require('gulp-watch');

var imgSrc = 'assets/images/*';
var imgDest = 'dist/images/';

var onError = function(err) {
  if (err.code === 'ENOENT') {
    return;
  }

  console.log(err.toString());
  this.emit('end');
};

gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: 'localhost:8888/diet-box'
  });
});

gulp.task('sass', function() {
  return gulp
    .src('assets/sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(
      postcss([
        autoprefixer({
          browsers: ['last 2 versions'],
          cascade: false
        })
      ], {
        syntax: postcssSCSS
      })
    )
    .pipe(
      sass({
        errLogToConsole: true,
        outputStyle: 'compressed'
      }).on('error', sass.logError)
    )
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./'));
});

gulp.task('watch', function() {
  gulp.watch('assets/sass/*.scss', ['sass']).on('change', browserSync.reload);
  gulp
    .watch('assets/sass/**/*.scss', ['sass'])
    .on('change', browserSync.reload);
  gulp.watch('assets/js/**/*.js', ['js']).on('change', browserSync.reload);
  gulp.watch('*.php').on('change', browserSync.reload);
});

gulp.task('images', function() {
  return gulp
    .src(imgSrc, {
      base: 'assets/images'
    })
    .pipe(newer(imgDest))
    .pipe(
      imagemin({
        optimizationLevel: 3,
        progressive: true,
        interlaced: true
      })
    )
    .pipe(gulp.dest(imgDest));
});

gulp.task('fonts', function () {
  return gulp.src('./assets/fonts/*')
    .pipe(fontmin())
    .pipe(gulp.dest('./dist/fonts'));
});

var jsDest = './dist/js';
var jsFiles = ['./assets/js/main.js'];

gulp.task('js', function() {
  return browserify(jsFiles, { debug: true, extensions: ['es6'] })
    .transform('babelify', { presets: ['@babel/preset-env'] })
    .bundle()
    .on('error', onError)
    .pipe(source('main.min.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(jsDest))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task('default', ['sass', 'browser-sync', 'watch', 'fonts', 'images', 'js']);
