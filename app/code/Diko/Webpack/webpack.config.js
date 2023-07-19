const path = require('path');

const OUTPUT_PATH = 'view/frontend/web/js/build'

let conf = {
	entry: {
		main: './src/js/index.js',
		mainNew: './src/js/indexNew.js'
	  },
	output: {
		path: path.resolve(__dirname, OUTPUT_PATH),
		filename: '[name].bundle.js',
		publicPath: 'view/frontend/web/js/build/'
	}
}

module.exports = (env, options) => {
	let production = options.mode === 'production';

	//conf.devtool = production
	//			   ? false
	//			   : 'eval-sourcemap';

	return conf;
}
