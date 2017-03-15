gulp = require 'gulp'

$ = require('gulp-load-plugins')({
  pattern: ['gulp-*', 'run-sequence']
});

themePath = ''

sources =
  sass: themePath + 'assets/sass/*.scss'
  coffee: [
    themePath + 'assets/coffee/*.coffee'
  ]

destinations =
  css: themePath + 'assets/css'
  js: themePath + 'assets/js'


###
  Compile SASS files
###
gulp.task 'style', ->
  gulp.src(sources.sass)
  .pipe($.sass({compass: true, style: 'expanded'}))
  .on('error', $.sass.logError)
  .pipe(gulp.dest(destinations.css))


###
  Run Coffee files through Coffee Lint
###
gulp.task 'lint', ->
  gulp.src(sources.coffee)
  .pipe($.coffeelint())
  .pipe($.coffeelint.reporter())


###
  Compile Coffeescript files
###
gulp.task 'coffee', ->
  gulp.src(sources.coffee)
  .pipe($.coffee({bare: true}).on('error', $.util.log))
  .pipe($.concat('app.js'))
  .pipe(gulp.dest(destinations.js))


###
  Keep watching files for changes to update them automatically
###
gulp.task 'watch', ->
  gulp.watch sources.sass, ['style']
  gulp.watch sources.coffee, ['lint', 'coffee']

gulp.task 'build', ['style', 'lint', 'coffee']


###
  Default command to run when calling just "gulp"
###
gulp.task 'default', ['watch']