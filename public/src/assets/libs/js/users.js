const userListTableRef = document
    .getElementsByClassName("usersTable")[0]
    .getElementsByTagName("tbody")[0];

users.forEach(item => {
    let newRow = userListTableRef.insertRow();
    let usernameCell = newRow.insertCell();
    let positionCell = newRow.insertCell();
    let organizationCell = newRow.insertCell();
    let birthdayCell = newRow.insertCell();
    let createAtCell = newRow.insertCell();
    let statusCell = newRow.insertCell();
    let actionCell = newRow.insertCell();

    let username = document.createTextNode(
        `${item.first_name} ${item.last_name}`
    );
    let dob = document.createTextNode(
        item.dob ? new Date(item.dob).toLocaleDateString("en-US") : "---"
    );
    let status = document.createTextNode(item.status);
    let created_at = document.createTextNode(
        new Date(item.created_at).toLocaleDateString("en-US")
    );

    let action = document.createElement("button");
    action.innerText = "Chi tiết";
    action.classList.add("btn", "btn-primary");
    // Set attr
    action.setAttribute("data-toggle", "modal");
    action.setAttribute("data-target", "#userDetailsModal");
    action.setAttribute("data-id", item.id);
    // demo text
    let role = document.createTextNode("Admin");
    let organization = document.createTextNode("HYS");

    usernameCell.appendChild(username);
    positionCell.appendChild(role);
    organizationCell.appendChild(organization);
    birthdayCell.appendChild(dob);
    createAtCell.appendChild(created_at);
    statusCell.appendChild(status);
    actionCell.appendChild(action);
});
