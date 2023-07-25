
//----------slide show------------//

var slide = document.getElementById('img');
var anh = [
    'src/img/product_Sub1.webp',
    'src/img/product_Sub2.webp',
    'src/img/product_Sub3.webp'
];
var len = anh.length;
var index =0;
 function next(){
    if(index ==len -1){
        index=0
        img.src = anh[index]
      
    }else{
        index++;
        img.src = anh[index];
    }
 }
 function pre() {
    if (index == 0) {
        index = len - 1
        img.src = anh[index]
    }
    else {
        index--;
        img.src = anh[index]
    }
}


