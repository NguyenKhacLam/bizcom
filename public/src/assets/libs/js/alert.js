const closeOrganization = document.getElementById("closeOrganization");
const closeUserBtns = document.querySelectorAll("[data-userid]");

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

if (closeUserBtns) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    closeUserBtns.forEach(element => {
        element.addEventListener("click", () => {
            const userid = element.dataset.userid;
            swal({
                title: "Bạn thực sự muốn khóa tổ chức này?",
                icon: "warning",
                dangerMode: true,
                buttons: true
            }).then(willDelete => {
                if (willDelete) {
                    $.ajax({
                        url: "/organizations/users/" + userid,
                        type: "DELETE",
                        success: function(res) {
                            console.log(res);
                            location.reload();
                        },
                        error: function(e) {
                            console.error(e);
                            location.reload();
                        }
                    });
                }
            });
        });
    });
}
