const mix = require("laravel-mix");
const path = require('path');

const TerserPlugin = require("terser-webpack-plugin");

const glob = require("glob");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { PurgeCSSPlugin } = require("purgecss-webpack-plugin");
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const PATHS = {
  src: path.join(__dirname, "public"),
};

mix.js("resources/js/app.js", "public/js").sass('resources/sass/app.scss', 'public/css').vue();
mix.sass('resources/sass/ready.scss', 'public/css');
mix.webpackConfig({
  optimization: {
    splitChunks: {
      chunks: "all",
    },
    minimize: true,
    minimizer: [new TerserPlugin()],

  },
  output: {
    // path: path.resolve(__dirname, 'public/js'),
    chunkFilename: "js/[name].js",
    // asyncChunks: true,

  },
  resolve: {
    // extensions: ['.vue'],
  },
  plugins: [
    new MiniCssExtractPlugin(),
    new PurgeCSSPlugin({
      paths: glob.sync(`${PATHS.src}/**/*`, { nodir: true }),
    }),
  ],
});