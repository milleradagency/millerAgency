// Gulp
// http://gulpjs.com/
// npm install gulp
// npm install --only=dev
var gulp = require('gulp');

// Gulp FTP
// https://www.npmjs.com/package/gulp-ftp
// npm install gulp-ftp --save-dev
// var ftp = require('gulp-ftp');

// Gulp Util
// https://www.npmjs.com/package/gulp-util
// npm install gulp-util
// var gutil = require('gulp-util');

// Babel
// https://www.npmjs.com/package/gulp-babel
// npm install gulp-babel --save-dev babel-preset-es2015
const babel = require('gulp-babel');

// Babel - Babili
// https://www.npmjs.com/package/gulp-babili
// npm install gulp-babili --save-dev
const babili = require("gulp-babili");

// Sass
// https://www.npmjs.com/package/gulp-sass
// npm install gulp-sass --save-dev
var sass = require('gulp-sass');

// PostCSS
// https://www.npmjs.com/package/gulp-postcss
// npm install gulp-postcss --save-dev
var postcss = require('gulp-postcss');

// CSSnano
// https://www.npmjs.com/package/gulp-cssnano
// npm install gulp-cssnano --save-dev
var nano = require('gulp-cssnano');

// Source Maps
// npm install gulp-sourcemaps --save-dev
// https://www.npmjs.com/package/gulp-sourcemaps
var sourcemaps = require('gulp-sourcemaps');

// Autoprefixer
// https://www.npmjs.com/package/gulp-autoprefixer
// npm install gulp-autoprefixer --save-dev
var autoprefixer = require('autoprefixer');

gulp.task('default', function () {
  return gulp.src('assets/scss/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass()) // using gulp-sass
    .pipe(postcss([ autoprefixer() ]))
    .pipe(nano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css'))
});

gulp.task('watch', function() {
  gulp.watch('assets/scss/**/*.scss', ['default']);
});

gulp.task('babel', () => {
  return gulp.src('assets/js-pre-babel/millerAgency.js')
    .pipe(babel({
      presets: ['es2015']
    }))
    .pipe(babili({
      mangle: {
        keepClassNames: true
      }
    }))
    .pipe(gulp.dest('assets/js'));
});
