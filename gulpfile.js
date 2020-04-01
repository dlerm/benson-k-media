const gulp = require('gulp');

require('require-dir')('./tasks');

gulp.task('build', gulp.series('clean', 'copy', 'styles', 'scripts'));

gulp.task('watch', gulp.parallel('copy:watch', 'scripts:watch', 'styles:watch'));

gulp.task('dev', gulp.series('build', 'watch'));