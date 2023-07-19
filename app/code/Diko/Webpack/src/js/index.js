import {sum} from './some.js'
console.log(sum(1,2,3,4,5,6,7,9));

import some from './some.js'

console.log('11111');
console.log('22222');
console.log(some.merge({a:1}, {b:2}));

function test1()
{	
	console.log(1245);
}

function test2()
{
	console.log(2);
}

var test3 = function()
{
	console.log('function 3');
}

window.addEventListener("load", function() {
	test3();
	console.log('load')
});