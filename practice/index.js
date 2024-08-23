const arr=[5,1,3,2,6];
console.log(arr);
function double(x){
    return x*2;
}
function triple(x){
    return x*3;
}

function binary1(x){
    return x.toString(2);
}

const output=arr.map((x)=> x.toString(2)
);
console.log(output);



const arr1=[5,3,7,1,9,2,6];
//filter all odd values;
const output1=arr1.filter((y)=>y%2!==0);
const output3=arr1.filter((y)=>y>=6);
console.log(output1);
console.log(output3);

//maximum number in the array

function red(a){
    let v=0;
    let greatestNumber=0;
    for(let i=0;i<a.length-1;i++){

   if(a[i]>greatestNumber){
        greatestNumber=a[i];
    }
}
    return greatestNumber;
}


console.log(red(arr1));

const output2=arr1.reduce(function(acc,curr){
    acc=acc+curr;
    return acc;
},0)
const arr3=[5,6,3,2,7,9];

const output4=arr3.reduce(function(init,val){
    if(val>init){
        init=val;
    }
    return val;
},0);

console.log(output2);

console.log(output4);