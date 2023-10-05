const handleOpen = (id) =>{
    const popup = document.getElementById("popup");
    const user_id = document.getElementById("user_id");
    user_id.innerText = id ;
    popup.style.visibility = "visible";
}

const handleClose = ()=>{
    const popup = document.getElementById("popup");
    popup.style.visibility = "hidden";
}

const handleDelete = (id)=>{
    const data = new FormData();
    data.append("id",id);
    const xml = new XMLHttpRequest();
    xml.open("POST","/api/admin/user/delete.php",true);
    xml.onload = function(){
        console.log(this);
        if(this.status === 200){
            console.log("Berhasil")
        }else{
            
        }
    }
    xml.send(data);
}

