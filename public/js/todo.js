function RemoveUserFromTable(element) {
    let modal = element.closest(".modal");
    let userid = element.closest("tr").getAttribute("class").replace("user","");

    element.closest("tr").remove();
    let currentUsers = modal.querySelector('input[name="assigned_users"]').value;
    currentUsers = RemoveUser(currentUsers,userid);
    modal.querySelector('input[name="assigned_users"]').value = currentUsers;
}

function RemoveUser(value,id) {
    let usersArray;
    let newArray = [];
    if(value === ""){
        usersArray = [];
    }else{
        usersArray = value.split(",");
    }

    let k = 0;
    for(let i = 0; i < usersArray.length;i++){
        if(usersArray[i] !== id){
            newArray[k] = usersArray[i];
            k++;
        }
    }

    return newArray;
}

function AddToUsers(value,id) {
    let usersArray;
    if(value === ""){
        usersArray = [];
    }else{
        usersArray = value.split(",");
    }

    usersArray[usersArray.length] = id;
    return usersArray.join(",");
}

function CheckExist(current,id) {
    let exist = false;
    let usersArray;
    if(current === ""){
        usersArray = [];
    }else{
        usersArray = current.split(",");
    }

    for(let i = 0; i < usersArray.length;i++){
        if(id === usersArray[i]){
            exist = true;
            break;
        }
    }

    return exist;
}

document.addEventListener("DOMContentLoaded", function(){

    currentModal = undefined;

    /* Delete */
    let deleteModal = document.getElementById('deleteConfirmModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget;
        let href = button.getAttribute("href");

        document.getElementById('delete_href').href = href;
    });

    /* Edit */
    let addModal = document.getElementById('addNewModal');
    addModal.addEventListener('show.bs.modal', function (event) {
        currentModal = addModal;
    });

    /* Edit */
    let editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        currentModal = editModal;
        var button = event.relatedTarget;
        let href = button.getAttribute("href");

        var httpRequest = new XMLHttpRequest();
        httpRequest.open("POST", "ajax",true);
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        httpRequest.onreadystatechange = function() {
            if(httpRequest.readyState == 4 && httpRequest.status == 200) {
                let data = JSON.parse(httpRequest.responseText);

                if(data.msg !== undefined && data.msg === "success"){
                    editModal.querySelector('input[name="name"]').value = data.todo.name;
                    editModal.querySelector('select[name="status"]').value = data.todo.status;
                    editModal.querySelector('textarea[name="description"]').value = data.todo.description;
                    editModal.querySelector('input[name="id"]').value = href.split("&")[0].split("=")[1];

                    if(data.users.length !== 0){
                        let currentUsers = editModal.querySelector('input[name="assigned_users"]').value;
                        let tbody = editModal.querySelector('tbody');
                        for(let i = 0; i < data.users.length;i++){
                            if(!CheckExist(currentUsers,data.users[i].id)){
                                currentUsers = AddToUsers(currentUsers,data.users[i].id);

                                let tr = document.createElement("tr");
                                tr.classList = "user"+data.users[i].id;
                                tr.innerHTML = "<td>"+data.users[i].name +"</td>" +
                                    "<td>"+data.users[i].email+"</td>" +
                                    "<td>" +
                                    "<button type='button' onclick='RemoveUserFromTable(this)' class=\"minus\" ><i class=\"fas fa-minus\"></i></button>" +
                                    "</td>";

                                tbody.appendChild(tr);

                                editModal.querySelector('input[name="assigned_users"]').value = currentUsers;
                            }
                        }


                    }


                }else{

                }
                //debugger;
            }else{

            }
        };

        httpRequest.send(href+"&mode=get");

    });

    /* Add User */
    let addUserModal = document.getElementById('addUserModal');
    addUserModal.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();

        var httpRequest = new XMLHttpRequest();
        httpRequest.open("POST", "ajax",true);
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        let href = "mode=add_user";

        let inputs = this.querySelectorAll("input");

        for(let i = 0; i < inputs.length;i++){
            href += "&"+inputs[i].getAttribute("name")+"="+inputs[i].value;
        }

        httpRequest.onreadystatechange = function() {
            if(httpRequest.readyState == 4 && httpRequest.status == 200) {
                let data = JSON.parse(httpRequest.responseText);

                if(data.msg !== undefined && data.msg === "success"){

                    let tbody = currentModal.querySelector('tbody');
                    let tr = document.createElement("tr");

                    tr.classList = "user"+data.user.id;
                    tr.innerHTML = "<td>"+data.user.name+"</td>" +
                        "<td>"+data.user.email+"</td>" +
                        "<td>" +
                        "<button type='button' onclick='RemoveUserFromTable(this)' class=\"minus\" ><i class=\"fas fa-minus\"></i></button>" +
                        "</td>";

                    tbody.appendChild(tr);

                    let currentUsers = currentModal.querySelector('input[name="assigned_users"]').value;
                    currentModal.querySelector('input[name="assigned_users"]').value = AddToUsers(currentUsers,data.user.id);

                    document.querySelector("#addUserModal").querySelector(".cancel").click();
                    document.querySelector("#addUserModal").querySelector("input[name='name']").value = "";
                    document.querySelector("#addUserModal").querySelector("input[name='email']").value = "";
                }else{

                }

            }else{

            }
        };

        httpRequest.send(href);
    });

    /* Select User */
    let selectUserModal = document.getElementById('selectUserModal');
    selectUserModal.addEventListener('show.bs.modal', function (event) {

        let href = "mode=get_users";

        let inputs = this.querySelectorAll("input");

        for(let i = 0; i < inputs.length;i++){
            href += "&"+inputs[i].getAttribute("name")+"="+inputs[i].value;
        }

        var httpRequest = new XMLHttpRequest();
        httpRequest.open("POST", "ajax",true);
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        httpRequest.onreadystatechange = function() {
            if(httpRequest.readyState == 4 && httpRequest.status == 200) {
                let data = JSON.parse(httpRequest.responseText);

                if(data.msg !== undefined && data.msg === "success"){
                    let selectmodal = document.querySelector('#selectUserModal');
                    let tbody = selectmodal.querySelector('tbody');

                    for(let i = 0; i < data.users.length; i++){
                        let tr = document.createElement("tr");

                        tr.classList = "user"+data.users[i].id;
                        tr.innerHTML = "<td><input type='checkbox' name='selectedUsers[]' value='"+data.users[i].id+"'></td>" +
                            "<td>"+data.users[i].name+"</td>" +
                            "<td>"+data.users[i].email+"</td>";

                        tbody.appendChild(tr);
                    }
                }else{

                }
                //debugger;
            }else{

            }
        };

        httpRequest.send(href);
    });


    selectUserModal.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();

        let checkboxes = selectUserModal.querySelectorAll('input[name="selectedUsers[]"]:checked');
        let currentUsers = currentModal.querySelector('input[name="assigned_users"]').value;
        let tbody = currentModal.querySelector('tbody');

        for(let i = 0; i < checkboxes.length; i++){
            if(!CheckExist(currentUsers,checkboxes[i].value)){
                currentUsers = AddToUsers(currentUsers,checkboxes[i].value);

                let tr = document.createElement("tr");
                tr.classList = "user"+checkboxes[i].value;
                tr.innerHTML = "<td>"+checkboxes[i].parentNode.parentNode.childNodes[1].innerHTML +"</td>" +
                    "<td>"+checkboxes[i].parentNode.parentNode.childNodes[2].innerHTML+"</td>" +
                    "<td>" +
                    "<button type='button' onclick='RemoveUserFromTable(this)' class=\"minus\" ><i class=\"fas fa-minus\"></i></button>" +
                    "</td>";

                tbody.appendChild(tr);

                currentModal.querySelector('input[name="assigned_users"]').value = currentUsers;
            }
        }


        selectUserModal.querySelector(".cancel").click();
    });



});





