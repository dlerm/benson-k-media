const gulp = require('gulp');
const flatten = require('gulp-flatten');
const changed = require('gulp-changed');

gulp.task('copy', () => {
  return gulp
    .src('src/php/**/*')
    .pipe(flatten())
    .pipe(changed('dist/', { hasChanged: changed.compareContents }))
    .pipe(gulp.dest('dist/'));
});

gulp.task('copy:watch', (done) => {
  gulp.watch('src/php/**/*', gulp.series('copy'));
  done();
});