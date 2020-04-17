const dotenv  = require('dotenv').config();
const fs      = require('fs');
const gulp    = require('gulp');
const GulpSSH = require('gulp-ssh');

const config = {
  host: process.env.SFTP_HOST,
  port: process.env.SFTP_PORT,
  username: process.env.SFTP_USER,
  passphrase: process.env.SFTP_PASS,
  privateKey: fs.readFileSync(process.env.SFTP_PRIVATE_KEY)
};

const gulpSSH = new GulpSSH({
  ignoreErrors: false,
  sshConfig: config
});

gulp.task('deploy', () => {
  return gulp.src('dist/**/*')
  .pipe(gulpSSH.dest(process.env.SFTP_THEME_PATH));
});

gulp.task('deploy:watch', (done) => {
  gulp.watch('dist/**/*', gulp.series('deploy'));
  done();
});