const
	gulp         = require( "gulp" ),
	browserSync  = require( 'browser-sync' ).create(),
	sass         = require( 'gulp-sass' ),
	autoprefixer = require( 'gulp-autoprefixer' ),
	babel        = require( 'gulp-babel' ),
	plumber      = require( 'gulp-plumber' ),
	uglify      = require( 'gulp-uglify' ),
	//	sourcemaps   = require( 'gulp-sourcemaps' ),
	sassPath     = './sass',
	jsPath       = './js/src';

function css() {
	return gulp
		.src( sassPath + "/**/*.scss" )
		// Use sass with the files found, and log any errors
		.pipe( sass( {outputStyle: 'compressed'} ) )
		.pipe( autoprefixer() )
		.pipe( gulp.dest( "./" ) )
		.pipe( browserSync.stream() );
}

exports.css = css;

function js() {
	return gulp
		.src( jsPath + '/**/*.js' )
		.pipe( plumber() )
		.pipe( babel( {
			presets: [
				['@babel/env', {modules: false}]
			]
		} ) )
		.pipe( uglify() )
		.pipe( gulp.dest( './js' ) );
}

exports.js = js;

function watch() {
	browserSync.init( {
		open  : 'external',
		port  : 8080,
		proxy: 'localhost'
	} );

	css();
	js();

	gulp.watch( sassPath + "/**/*.scss", css );
	gulp.watch( jsPath + '/**/*.js', js );
	gulp.watch( './**/*' ).on( 'change', browserSync.reload );
}

exports.default = watch;