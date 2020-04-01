const gulp = require('gulp');
const webpack = require('webpack-stream');
const webpackConfig = require('../webpack.config.js');

gulp.task('scripts', (done) => {
  gulp
    .src('src/scripts/theme.js')
    .pipe(webpack(webpackConfig))
    .on('error', (err) => done(err))
    .pipe(gulp.dest('dist/js'))
    .on('end', () => done());
});

gulp.task('scripts:watch', (done) => {
  gulp.watch('src/scripts/**/*', gulp.series('scripts'));
  done();
});