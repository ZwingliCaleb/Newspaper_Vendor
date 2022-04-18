
function del(){
    alert("This record will be deleted");  
}

const url = new URL(location);
url.searchParams.delete('mess');
history.replaceState(null,null,url);
