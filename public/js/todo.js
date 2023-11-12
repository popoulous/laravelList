document.addEventListener("DOMContentLoaded", function(){

    /* Delete */
    var deleteModal = document.getElementById('deleteConfirmModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {

        var button = event.relatedTarget;
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
    var editModal = document.getElementById('editModal');
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

        httpRequest.send(href);

    });




});





