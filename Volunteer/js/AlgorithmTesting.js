$(document).ready(function(){
	
	var test = [1,11,4,5,2,10];
	//console.log(test);
	//bubbleSort(test);
	//insertionSort(test);
	
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
