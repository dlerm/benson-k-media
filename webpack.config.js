const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
  mode: 'production',
  entry: path.resolve(__dirname, 'src/scripts/theme.js'),
  output: {
    path: path.resolve(__dirname, 'dist/js'),
    filename: 'theme.js',
  },
  stats: false,
  optimization: {
    splitChunks: {
      chunks: 'all',
      automaticNameDelimiter: '-',
    },
    minimize: true,
    minimizer: [
      new UglifyJsPlugin(),
    ],
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
        query: {
          cacheDirectory: true,
          presets: ['@babel/preset-env'],
          plugins: ['@babel/plugin-syntax-dynamic-import'],
        },
      },
    ],
  },
  resolve: {
    alias: {
      scripts: path.resolve(__dirname, 'src/scripts/'),
    },
  },
};