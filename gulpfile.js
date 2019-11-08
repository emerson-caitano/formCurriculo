var gulp = require('gulp');
var browserSync = require('browser-sync').create();
 
gulp.task('server', function() {
  browserSync.init({
     server: {
        baseDir: 'src'
     },
  })

  gulp.watch("src/**.*").on('change', browserSync.reload);
})