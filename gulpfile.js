const { src, dest, watch, parallel, series } = require('gulp');

// CSS
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');

// Javascript
const terser = require('gulp-terser-js');

function css( done ) {
    src('src/scss/**/*.scss') // Identificar el archivo .SCSS a compilar
        .pipe( plumber())
        .pipe( sass() ) // Compilarlo
        .pipe( postcss([ autoprefixer(), cssnano() ]) )
        .pipe( dest('resources/css') ) // Almacenarla en el disco duro
    done();
}

function javascript( done ) {
    src('src/js/*.js')
        .pipe( terser() )
        .pipe(dest('resources/js'));

    done();
}

function dev( done ) {
    watch('src/scss/**/*.scss', css);
    watch('src/js/**/*.js', javascript);
    done();
}
 

exports.css = css;
exports.js = javascript;
exports.default = series(css, javascript, dev);