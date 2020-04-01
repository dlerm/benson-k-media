const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const uglifyCSS = require('gulp-uglifycss');

const sassSettings = {
  includePaths: ['node_modules'],
};

gulp.task('styles', () => {
  return gulp
    .src('src/styles/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass(sassSettings).on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(uglifyCSS())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('dist/'));
});

gulp.task('styles:watch', (done) => {
  gulp.watch('src/styles/**/*', gulp.series('styles'));
  done();
});