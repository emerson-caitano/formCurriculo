var gulp = require('gulp'),
    connect = require('gulp-connect-php'),
    browserSync = require('browser-sync');
 
gulp.task('connect-sync', function() {
  connect.server({}, function (){
    browserSync({
      proxy: '127.0.0.1:8000',
      files: [
        "**/**.php",
        "**/**.css",
        "**/**.js"
      ]
    });
  });
 
  gulp.watch('src/**/*.php').on('change', function () {
    browserSync.reload();
  });

  gulp.watch('src/**/*.css').on('change', function () {
    browserSync.reload();
  });
});