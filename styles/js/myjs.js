var mode = document.getElementById("mode").value;
document.getElementById("mode").addEventListener("click",changelabel);

function changelabel(){
  
   if(mode == "mpesa"){
       document.getElementById("label").innerText=('M-Pesa code');
   }
   if(mode == "ksh"){
    document.getElementById("label").innerText=('ksh');
   }
   if(mode == "cheque"){
    document.getElementById("label").innerText=('cheque number');
   }
}