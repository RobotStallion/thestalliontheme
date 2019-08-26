

var gulp = require('gulp');
var sass = require('gulp-sass');
var zip = require('gulp-zip');
var concat = require('gulp-concat');

function defaultTask(cb){
    cb();
}


gulp.task('sass', function () {
    return gulp.src('./sass/**/*.scss')
      .pipe(sass({includePaths:'./node_modules/'}))
      .pipe(sass.sync().on('error', sass.logError))
      .pipe(gulp.dest('./'));
  });

gulp.task('sass:watch', function () {
    gulp.watch('./sass/**/*.scss', gulp.series("sass"));
  });

gulp.task('build', function(){
    return gulp.src(['./**','!node_modules/**', '!build/**', '!js/stallion/**'])
    .pipe(zip('thestalliontheme.zip'))
    .pipe(gulp.dest('build'));
});

gulp.task('js', function(){
    return gulp.src('./js/stallion/**/*.js')
    .pipe(concat('stallion.js'))
    .pipe(gulp.dest('./js'))
});

gulp.task('js:watch', function(){
    gulp.watch('./js/stallion/**/*.js', gulp.series('js'));
});

exports.default = defaultTask;