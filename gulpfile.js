const { dest, series, src, task, watch } = require("gulp");
const autoprefixer = require("autoprefixer");
const babel = require("gulp-babel");
const browserSync = require("browser-sync").create();
const minify = require("gulp-clean-css");
const postcss = require("gulp-postcss");
const rename = require("gulp-rename");
const sass = require("gulp-sass")(require("sass"));
const uglify = require("gulp-uglify");

task("js", function () {
  return src("./src/js/*.js")
    .pipe(babel())
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest("./dist/js"))
    .pipe(browserSync.stream());
});

task("scss", function () {
  return src("./src/scss/theme.scss", { sourcemaps: true })
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(minify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest("./dist/css", { sourcemaps: "." }))
    .pipe(browserSync.stream());
});

task("reload", function (callback) {
  browserSync.reload;
  callback();
});

exports.default = function () {
  browserSync.init({
    open: false,
    proxy: "http://playground.local",
  });

  watch("./src/js/*.js", series("js"));
  watch("./src/scss/*.scss", series("scss"));
  watch("**/*.php", series("reload"));
};
