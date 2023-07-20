const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const OUTPUT_VIEW_PATH = 'view'
const FRONTEND_PATH = 'frontend/web/js/build'
const ADMINHTML_PATH = 'adminhtml/web/js/build'

const OUTPUT_PATH = 'view/frontend/web/js/build'
//const OUTPUT_PATH_DIKO = '../'

const BABEL_TARGETS = 'defaults'
//const BABEL_TARGETS = '> 0.25%, not dead'

let conf = {
	entry: {
		//main: './src/js/index.js',
		//mainNew: './src/js/indexNew.js',
        news: {
            import: './src/js/index.js',
            //filename: 'newsletter/[name].bundle.js',
            filename: path.join(FRONTEND_PATH, '[name].bundle.js'),
            chunkLoading: false, // Disable chunks that are loaded on demand and put everything in the main chunk.
        },
        adminNews: {
            import: './src/js/index.js',
            filename: path.join(ADMINHTML_PATH, '[name].bundle.js'),
            chunkLoading: false, // Disable chunks that are loaded on demand and put everything in the main chunk.
        },
	},
	output: {
		//path: path.resolve(__dirname,  OUTPUT_PATH),
        path: path.resolve(__dirname,  OUTPUT_VIEW_PATH),
		filename: '[name].bundle.js',
		//publicPath: 'view/frontend/web/js/build/'
	},
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            ['@babel/preset-env', { targets: BABEL_TARGETS }]
                        ]
                    }
                }
            }
        ]
    },
    devServer: {
        devMiddleware: {
            publicPath: path.join(__dirname, 'build'),
            writeToDisk: true,
        },
        hot: false,
        port: '8989',
        host: 'magento-lic.local',
        allowedHosts: 'auto',
        proxy: {
            '/': {
                target: `https://localhost/info.php`,
            },
        },
        static: false,
        watchFiles: ['src/**/*.*', 'app/**/*.*'],
    },
    //devServer: {
    //    static: './view',
    //    client: {
    //        overlay: true,
    //    }
    //},
}

module.exports = (env, options) => {
	let production = options.mode === 'production';

	conf.devtool = production
				   ? false
				   : 'eval-source-map';

    conf.mode = production
        ? 'production'
        : 'development';

	return conf;
}
