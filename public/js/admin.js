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

const handleDelete = ()=>{
    const data = new FormData();
    const id = document.getElementById("user_id").innerText;
    data.append("id",parseInt(id));
    const xml = new XMLHttpRequest();
    xml.open("POST","/api/admin/user/delete.php",true);
    xml.onload = function(){
        if(this.status === 200){
            let response = JSON.parse(this.responseText);
            window.location.href = "/admin/users";
        }else{
            console.log("gagal");
        }
    }
    xml.send(data);
}

