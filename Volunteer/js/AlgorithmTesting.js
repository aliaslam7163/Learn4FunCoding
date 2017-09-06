$(document).ready(function(){
	
	var test = [1,11,4,5,2,10];
	//console.log(test);
	//bubbleSort(test);
	//insertionSort(test);
	DecimaltoBinary(115);
	
});

function bubbleSort(arr)
{
	var temp;
	var sorted;
	var current;
	var tempArr;
	
	for(i=arr.length-1;i>=0;i--)
	{
		//console.log(i);
		for(j=0;j<=i;j++)
		{
			if(arr[j] > arr[j+1])
				{
					console.log(arr);
					console.log(arr[j]);
					console.log(arr[j+1]);
					current = arr[j];
					temp = arr[j+1];
					arr[j] = temp;
					arr[j+1] = current;
					console.log(arr);
				}
		}				
	}	
}

function insertionSort(arr)
{
	var temp;
	var current;
	var j=0;
	
	for(i=0;i<=arr.length-1;i++)//needs to run as many times as there are elements in the array
	{
		console.log("original = " + arr);
		j=i-1;
		temp = arr[j+1];
		console.log("j = " + j);
		console.log("temp = " + temp);
		while(j>=0 && arr[j] >= temp)
		{
			arr[j+1] = arr[j];
			j--;
		}
		arr[j+1] = temp;	
		console.log("swaped = " + arr);
	}
}

function DecimaltoBinary(n)
{
	
	var convert = n.toString(2);
	//var conBack = parseInt(convert,10);
	var j=0;
	var arr=[];
	var original = [];
	var dec = 0;
	while(j<=convert.length-1)
	{
		original[j]=convert[j];
		if(convert[j] == "1")
			arr[j] = "0";
		else
			arr[j] = "1";
		
		
		j++;
	}
	dec = backtoDecimal(arr);
	console.log(original);
	console.log(arr);
	console.log(dec);	
}

function backtoDecimal(arr)
{
	len = arr.length-1;
	j=len;
	var sum = 0;
	var power = 0;
	while(j>=0)
	{
		
		num = arr[j];
		
		if(num == "0")
			sum += 0;
		
		else if(num == "1")
		{
			sum += Math.pow(2,power);
		}
		j=j-1;
		power++;
	}
	return sum;
}
