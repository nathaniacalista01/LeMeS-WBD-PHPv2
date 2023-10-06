const handleOpen = (type,id) =>{
    console.log(type);
    let element_id = "delete-popup";
    let user_id_place = "delete_user_id";
    if(type === "edit"){
        element_id = "edit-popup";
        user_id_place = "edit_user_id";
    }
    console.log(element_id);
    const popup = document.getElementById(element_id);
    const user_id = document.getElementById(user_id_place);
    user_id.innerText = id ;
    popup.style.visibility = "visible";
}

const handleDeleteClose = ()=>{
    const popup = document.getElementById("delete-popup");
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


