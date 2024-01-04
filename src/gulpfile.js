const {watch, src, dest, series, parallel} = require("gulp")
const postcss = require("gulp-postcss")
const env = require("gulp-env")
const sass = require("gulp-sass")
const sassGlob = require("gulp-sass-glob")
const browserSync = require("browser-sync")
const autoprefixer = require("autoprefixer")
const cssnano = require("cssnano")

const rollup = require("rollup")
const rollupCommonJs = require("@rollup/plugin-commonjs")
const rollupNodeResolve = require("@rollup/plugin-node-resolve").nodeResolve
const rollupBabel = require("@rollup/plugin-babel").babel
const rollupTerser = require("rollup-plugin-terser").terser
const del = require("del")

const logger = require("eazy-logger").Logger({
  useLevelPrefixes: false
})

env({file: "../.env", type: "ini"})
let rollupCache;

const DEVELOPMENT = process.env.NODE_ENV !== "production"
const PRODUCTION = process.env.NODE_ENV === "production"

const __ = {
  proxy: process.env.USE_DOMAIN ? "http://" + process.env.DOMAIN : "http://localhost:" + process.env.PORT_WORDPRESS,
  location: "./../theme"
}

async function buildJsWithCache() {
  const bundle = await rollup.rollup({
    cache: rollupCache,
    input: "./scripts/main.js",
    watch: {
      include: "./scripts/**",
      exclude: "./node_modules/**"
    },
    treeshake: PRODUCTION,
    plugins: [
      rollupNodeResolve({
        browser: true
      }),
      rollupCommonJs({sourceMap: false}),
      // rollupBabel({
      //   babelHelpers: "runtime",
      //   skipPreflightCheck: true,
      //   presets: [["@babel/env", {modules: false}]],
      //   babelrc: false
      // }),
      rollupTerser({
          format: {
               comments: false
             },
           compress: PRODUCTION
      })
    ]
  });
  
  rollupCache = bundle.cache;
  return bundle;
}

function jsTask(done) {
  buildJsWithCache().then(bundle => {
    bundle.write({
        sourcemap: DEVELOPMENT,
        file: __.location + "/scripts/main.js",
        format: "iife",
        indent: false
      })
      .then(done())
  })
}

function scssTask(done) {
  src(["styles/**/*.scss", "!styles/**/_*.scss"], {sourcemaps: DEVELOPMENT})
    .pipe(sassGlob())
    .pipe(sass({outputStyle: DEVELOPMENT ? "compressed" : "compact"}))
    .on("error", error)
    .pipe(postcss([autoprefixer({grid: true}), cssnano()]))
    .on("error", error)
    .pipe(dest(__.location + "/styles", {sourcemaps: DEVELOPMENT ? "." : false}))
    .pipe(browserSync.stream())
  
  done()
}

function watchFiles(done) {
  watch("./scripts/**/*.js", {interval: 1000}, series(clear, jsTask, reload))
  watch("./styles/**/*.scss", {interval: 1000}, series(clear, scssTask))
  watch(__.location + "/**/*.(twig|php)", {ignored: "!" + __.location + "/vendor", interval: 1000}, series(clear, reload))
  done()
}

function liveReload(done) {
  browserSync.init({proxy: __.proxy}, (err, bs) => {
    browserSync.options = bs.options
    clear()
  })
  
  done()
}

function reload(done) {
  browserSync.reload()
  done()
}

function clean(done) {
  del.sync([__.location + "/styles", __.location + "/scripts"], { force: true })
  done()
}


function error(message) {
  console.log(message)
  this.emit("end")
}

function clear(done) {
  const {options} = browserSync
  const urls = options.get("urls").toJS()
  
  console.clear()
  logger.info("    Proxying: {magenta:%s", options.get("proxy").toJS().target)
  logger.info("{grey:--------------------------------------}")
  logger.info("       Local: {magenta:%s}", urls.local)
  logger.info("    External: {magenta:%s}", urls.external)
  logger.info("{grey:--------------------------------------}")
  logger.info("         UI: {magenta:%s}", urls.ui)
  logger.info("UI External: {magenta:%s}", urls["ui-expoternal"])
  logger.info("{grey:--------------------------------------}")
  
  done && done()
}

const _watch = parallel(jsTask, scssTask, watchFiles, liveReload)

exports.watch = _watch
exports.default = _watch
exports.build = parallel(clean, jsTask, scssTask)
