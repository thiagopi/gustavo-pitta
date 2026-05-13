
let arr = [];

for(let i = 0; i < 5; i++){
    // console.log(i + 1);
    let t = {};
    t.id = i + 1;
    t.text = "texto " + (i + 1);
    t.pos = i + 1;
    arr[i] = t;
    console.log(arr);
}


// console.log(JSON.stringify(arr));
