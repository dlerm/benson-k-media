const gulp = require('gulp');
const flatten = require('gulp-flatten');
const changed = require('gulp-changed');

gulp.task('copy:php', () => {
  return gulp
    .src('src/php/**/*')
    .pipe(flatten())
    .pipe(changed('dist/', { hasChanged: changed.compareContents }))
    .pipe(gulp.dest('dist/'));
});

gulp.task('copy:images', () => {
  return gulp
    .src('src/images/**/*')
    .pipe(flatten())
    .pipe(changed('dist/images/', { hasChanged: changed.compareContents }))
    .pipe(gulp.dest('dist/images/'));
});

gulp.task('copy', gulp.series('copy:php', 'copy:images'));

gulp.task('copy:watch', (done) => {
  gulp.watch(['src/php/**/*','src/images/**/*'], gulp.series('copy'));
  done();
});