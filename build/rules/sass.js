
const ExtractTextPlugin = require("extract-text-webpack-plugin")
const config = require('../config')

module.exports = {
    test: /\.scss$/,
    include: config.paths.assets,
    use: ExtractTextPlugin.extract({
        fallback: 'style-loader',
        //resolve-url-loader may be chained before sass-loader if necessary
        use: ['css-loader', 'sass-loader']
    })
}
