const path = require('path');

let conf = {
	//entry: './src/js/index.js',
	entry: {
		main: './src/js/index.js',
		mainNew: './src/js/indexNew.js'
	  },
	output: {
		path: path.resolve(__dirname, 'dist'),
		//filename: 'main.js',
		filename: '[name].bundle.js',
		publicPath: 'dist/'
	}
}

module.exports = (env, options) => {
	let production = options.mode === 'production';

	//conf.devtool = production
	//			   ? false
	//			   : 'eval-sourcemap';

	return conf;
}
