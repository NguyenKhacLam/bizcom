const closeOrganization = document.getElementById("closeOrganization");

if (closeOrganization) {
    closeOrganization.addEventListener("click", () => {
        swal("Bạn thực sự muốn đóng tổ chức này?", {
            dangerMode: true,
            buttons: true
        }).then(isConfirm => {
            // use axios here
            console.log("Close");
        });
    });
}
