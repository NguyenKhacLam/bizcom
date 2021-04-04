function getOrganizationUk() {
    let url = window.location.href;
    return url.split("/organization/")[1].split("/")[0];
}

$("#editForm").on("show.bs.modal", function(e) {
    let id = $(e.relatedTarget).data("id");
    let name = $(e.relatedTarget).data("name");

    $("#editForm h4").text(name);
    const content = $("#editForm .content");

    $.get(
        `/organization/${getOrganizationUk()}/roles/${id}`,
        (data, status) => {
            data.forEach(e => {
                content.append(`<p>${e.name}</p>`);
            });
        }
    );
});
