var eye = document.getElementById('ojo');
var input = document.getElementById('input');
eye.addEventListener("click",function(){
  if(input.type == "password"){
    input.type = "text"
    ojo.style.opacity=0.8
  }else{
    input.type = "password"
    ojo.style.opacity=0.2
  }

})