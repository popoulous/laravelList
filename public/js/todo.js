document.addEventListener("DOMContentLoaded", function(){

    /* Delete */
    let deleteModal = document.getElementById('deleteConfirmModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget;
        let href = button.getAttribute("href");

        document.getElementById('delete_href').href = href;
    });

    function alertContents(httpRequest) {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                alert(httpRequest.responseText);
            } else {
                alert("There was a problem with the request.");
            }
        }
    }

    /* Edit */
    let editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
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
                }else{

                }
                debugger;
            }else{

            }
        };

        httpRequest.send(href+"&mode=get");

    });

    /* Edit */
    let addUserModal = document.getElementById('addUserModal');
    addUserModal.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();

        var form = this;

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

                    let newmodal = document.querySelector('#addNewModal');

                    let tbody = newmodal.querySelector('tbody');

                    let tr = document.createElement("tr");
                    tr.classList = "user"+data.user.id;

                    tr.innerHTML = "<td>"+data.user.name+"</td>" +
                        "<td>"+data.user.email+"</td>" +
                        "<td>" +
                        "<button onclick='RemoveUserFromTable()' class=\"minus\" ><i class=\"fas fa-minus\"></i></button>" +
                        "</td>";

                    tbody.appendChild(tr);

                    let currentUsers = newmodal.querySelector('input[name="assigned_users"]').value;
                    newmodal.querySelector('input[name="assigned_users"]').value = AddToUsers(currentUsers,data.user.id);

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

    function RemoveUserFromTable() {

    }

    function RemoveUser(value,id) {
        let usersArray;
        let newArray = [];
        if(value === ""){
            usersArray = [];
        }else{
            usersArray = split(",",value);
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
            usersArray = value.split(",",value);
        }

        usersArray[usersArray.length] = id;

        return usersArray;
    }
});





