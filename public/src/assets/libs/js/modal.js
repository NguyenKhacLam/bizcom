function getOrganizationUk() {
    let url = window.location.href;
    return url.split("/organizations/")[1].split("/")[0];
}

$("#userDetailsModal").on("show.bs.modal", function(e) {
    let id = $(e.relatedTarget).data("id");
    userData = users.filter(i => id == i.id)[0];

    $("#userDetailsModal .modal-header h4").text(
        `${userData.first_name} ${userData.last_name}`
    );
    // console.log(id);
});
