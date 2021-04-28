function getOrganizationUk() {
    let url = window.location.href;
    return url.split("/organizations/")[1].split("/")[0];
}
