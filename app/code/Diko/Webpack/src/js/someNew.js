export default function (n1, n2, ...numbers)
{
	let sum = 0;
	for (let i = 0; i < numbers.length; i++) {
		sum += numbers[i];
	}

	return sum;
}
