var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var concat = require('gulp-concat');
 
 
gulp.task('default', function(){
 
    console.log('default gulp task...')
});

gulp.task('sass', function() {
 
    gulp.src('assets/sass/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('assets/css'));
 
});

gulp.task('watch', function() {
     	gulp.watch('assets/sass/*.scss',['sass']);
});

gulp.task('scripts', function() {
  return gulp.src('assets/js/components/*.js')
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('assets/js/'));
});


gulp.task('default', ['sass','scripts','watch',]);

