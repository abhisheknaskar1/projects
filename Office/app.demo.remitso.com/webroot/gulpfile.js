'use strict'

var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var del = require('del');
var replace = require('gulp-replace');
var injectPartials = require('gulp-inject-partials');
var inject = require('gulp-inject');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var merge = require('merge-stream');
const { series, parallel } = require('gulp');

gulp.paths = {
    dist: 'dist',
};

var paths = gulp.paths;

function sassWatch() {
  return gulp.src('./scss/style.scss')
          .pipe(sourcemaps.init())
          .pipe(sass())
          .on("error", sass.logError)
          .pipe(sourcemaps.write('./maps'))
          .pipe(gulp.dest('./css'));
}

function style(done) {
  gulp.watch('./scss/**/*.scss', sassWatch).on("change", function(file){
    console.log("File Changed: "+file);
  });
  done();
}

function sassWatchDashboard() {
  return gulp.src('./scss/dashboard.scss')
          .pipe(sourcemaps.init())
          .pipe(sass())
          .on("error", sass.logError)
          .pipe(sourcemaps.write('./maps'))
          .pipe(gulp.dest('./css'));
}

function styleDashboard(done) {
  gulp.watch('./scss/**/*.scss', sassWatchDashboard).on("change", function(file){
    console.log("File Changed: "+file);
  });
  done();
}

function copyRecursiveVendorFiles ( done ) {
    gulp.src(['./node_modules/roboto-fontface/fonts/**/*'])
      .pipe(gulp.dest('./fonts'));
    var mdi = gulp.src(['./node_modules/@mdi/**/*'])
        .pipe(gulp.dest('./vendors/iconfonts/mdi'));
    var fontawesome = gulp.src(['./node_modules/@fortawesome/**/*'])
        .pipe(gulp.dest('./vendors/iconfonts/font-awesome'));
    var paymentfont = gulp.src(['./node_modules/paymentfont/**/*'])
        .pipe(gulp.dest('./vendors/iconfonts/payment-font'));
    var flagicon = gulp.src(['./node_modules/flag-icon-css/**/*'])
        .pipe(gulp.dest('./vendors/iconfonts/flag-icon'));
    var materialdesignicon = gulp.src(['./node_modules/material-design-icons/iconfont/**/*'])
        .pipe(gulp.dest('./vendors/iconfonts/material-design-icons'));

    merge(
        mdi,
        fontawesome,
        paymentfont,
        flagicon,
        materialdesignicon
    );
    done();
}

function buildBaseVendorStyles ( done ) {
    gulp.src([
        './node_modules/roboto-fontface/css/roboto/roboto-fontface.css',
        './vendors/semantic-ui/components/dropdown.min.css',
        './vendors/semantic-ui/components/accordion.min.css',
        './vendors/semantic-ui/components/transition.min.css',
        './vendors/semantic-ui/components/input.min.css',
        './vendors/semantic-ui/components/form.min.css',
        './vendors/semantic-ui/components/button.min.css',
        './vendors/semantic-ui/components/message.min.css',
        './vendors/semantic-ui/components/placeholder.min.css',
        './vendors/semantic-ui/components/step.min.css',
        './vendors/semantic-ui/components/segment.min.css',
        './vendors/semantic-ui/components/checkbox.min.css',
        './vendors/propeller/tab/css/tab.css',
        './node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css',
        './node_modules/@material/list/dist/mdc.list.min.css',
      ])
      .pipe(concat('vendor.bundle.base.css'))
      .pipe(gulp.dest('./vendors/css'));

    gulp.src([
        './vendors/semantic-ui/components/reset.min.css',
        './vendors/semantic-ui/components/site.min.css',
        './vendors/semantic-ui/components/container.min.css',
        './vendors/semantic-ui/components/grid.min.css',
        './vendors/semantic-ui/components/header.min.css',
        './vendors/semantic-ui/components/image.min.css',
        './vendors/semantic-ui/components/menu.min.css',
        './vendors/semantic-ui/components/divider.min.css',
        './vendors/semantic-ui/components/list.min.css',
        './vendors/semantic-ui/components/segment.min.css',
        './vendors/semantic-ui/components/dropdown.min.css',
        './vendors/semantic-ui/components/label.min.css',
        './vendors/semantic-ui/components/placeholder.min.css',
        './vendors/semantic-ui/components/step.min.css',
        './vendors/semantic-ui/components/flag.min.css',
        './vendors/semantic-ui/components/button.min.css',
        './vendors/semantic-ui/components/input.min.css',
        './vendors/semantic-ui/components/form.min.css',
        './vendors/semantic-ui/components/message.min.css',
        './vendors/semantic-ui/components/transition.min.css',
        './vendors/semantic-ui/components/sidebar.min.css',
      ])
      .pipe(concat('vendor.semantic.css'))
      .pipe(gulp.dest('./vendors/css'));
    done();
}

function buildBaseVendorScripts ( done ) {
    gulp.src([
            './node_modules/jquery/dist/jquery.min.js',
            './node_modules/popper.js/dist/umd/popper.min.js',
            './node_modules/bootstrap/dist/js/bootstrap.min.js',
            './vendors/semantic-ui/semantic.min.js',
            './node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js',
            //'./node_modules/semantic-ui-dropdown/dropdown.min.js',
            // './node_modules/selectize/dist/js/standalone/selectize.min.js'
        ])
        .pipe(concat('vendor.bundle.base.js'))
        .pipe(gulp.dest('./vendors/js'));
    done();
}

function buildOptionalVendorScripts ( done ) {
    // gulp.src([
    //         './node_modules/selectize/dist/js/standalone/selectize.min.js',
    //         './node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
    //         './node_modules/js-uuid/js-uuid.js',
    //         './node_modules/sweetalert/dist/sweetalert.min.js',
    //     ])
    //     .pipe(concat('vendor.bundle.addons.js'))
    //     .pipe(gulp.dest('./vendors/js'));
    done();
};

exports.default = series(style, styleDashboard, copyRecursiveVendorFiles, buildBaseVendorScripts, buildBaseVendorStyles, buildOptionalVendorScripts);
