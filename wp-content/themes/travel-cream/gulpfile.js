var gulp         = require('gulp'),
    connect      = require('gulp-connect-php'),
    server       = new connect(),
    browserSync  = require('browser-sync'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    concatCSS    = require('gulp-concat-css'),
    compressCSS  = require('gulp-csso');

// Watching files & reload browser
gulp.task('watcher', ['sass'], function() {
    server.server({}, function() {
        browserSync({
            proxy: 'http://localhost:8888/training/travel-cream'
        });
    });

    gulp.watch('**/*.php').on('change', browserSync.reload);
    gulp.watch('./assets/sass/**/*.sass', ['sass']);
    gulp.watch('**/*.css').on('change', browserSync.reload);
    gulp.watch('**/*.js').on('change', browserSync.reload);
});

// Compile SASS into CSS
gulp.task('sass', function() {
    return gulp.src('./assets/sass/main.sass')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 3 versions', 'ie >= 10'],
            cascade: false
        }))
        .pipe(concatCSS('style.css'))
        // .pipe(compressCSS())
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
});

// gulp.task('default', ['watcher']);