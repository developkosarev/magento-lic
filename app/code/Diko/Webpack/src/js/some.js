function sum(n1, n2, ...numbers)
{
	let sum = 0;
	for (let i = 0; i < numbers.length; i++) {
		sum += numbers[i];
	}
	
	return sum;
}

class SomeMath {
	avg(...numbers) {
		return sum(...numbers) / numbers.length
	}
	
	merge(a, b){
		return {
			...a,
			...b
		}
	}
}

function test2()
{
	console.log(2);
}

export default new SomeMath();