var gulp = require('gulp');
var browserSync = require('browser-sync').create();
 
gulp.task('server', function() {
  browserSync.init({
     server: {
   proxy: "localhost/formCurriculo/src/",
      ghostMode: false, 
        baseDir: 'src'
     },
  })

  gulp.watch("src/*.css").on('change', browserSync.reload);
  gulp.watch("src/*.php").on('change', browserSync.reload);
})