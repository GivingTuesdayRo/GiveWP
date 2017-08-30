const path = require('path');

const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

const config = require('./config');
const assetsFilenames = '[name]';


const sassRule = require('./rules/sass');

let webpackConfig = {
    /**
     * Application entry files for building.
     * @type {Object}
     */
    entry: config.assets,


    /**
     * Output settings for application scripts.
     * @type {Object}
     */
    output: {
        path: config.paths.public,
        filename: config.outputs.javascript.filename
    },

    context: config.paths.assets,

    module: {
        rules: [
            {
                enforce: 'pre',
                test: /\.(js|s?[ca]ss)$/,
                include: config.paths.assets,
                loader: 'import-glob',
            },
            sassRule,
            {
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    use: [{
                        loader: 'css-loader',
                        options: {importLoaders: 1},
                    }],
                })
            }
        ]
    },
    externals: {
        jquery: 'jQuery',
    },
    plugins: [
        new ExtractTextPlugin(config.outputs.css),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            Popper: ['popper.js', 'default'],
            // In case you imported plugins individually, you must also require them here:
            Util: "exports-loader?Util!bootstrap/js/dist/util",
            Dropdown: "exports-loader?Dropdown!bootstrap/js/dist/dropdown"
        })
    ]
};

module.exports = webpackConfig;
