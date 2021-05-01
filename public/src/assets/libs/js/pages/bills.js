// Create bills page
const addItemForm = $("#addItemForm");
const createBillForm = $("#createBillForm");
const itemsList = $("#itemsList");

let items = [];

if (typeof itemsListDb !== "undefined") {
    items = itemsListDb;
}

let total = 0;
let taxRate = 0;

const formatter = new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "VND"
});

$("#createBillForm #tax").on("input", () => {
    taxRate = $("#createBillForm #tax").val();
    $("#taxRate").text(`${$("#createBillForm #tax").val()}%`);
});

function deleteOrder(id) {
    // Alert
    // Ajax call
    // if success -> reload page
    swal({
        title: "Bạn thực sự muốn khóa đơn này?",
        icon: "warning",
        dangerMode: true,
        buttons: true
    }).then(willDelete => {
        if (willDelete) {
            $.ajax({
                url: `/organizations/bills/${id}`,
                type: "DELETE",
                data: id,
                success: function(data) {
                    // location.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.error("FAIL");
                }
            });
        }
    });
}

function deleteItem(id) {
    items = items.filter(i => i.id !== id);
    addItemRow(items);
}

function addItemRow(items) {
    itemsList.children("tbody").empty();
    items.forEach((item, index) => {
        const html = `<tr>
        <th scope="row">${index + 1}</th>
            <td>${item.name}</td>
            <td>${item.short_desc}</td>
            <td>${item.unit_price}</td>
            <td>${item.quantity}</td>
            <td>${formatter.format(item.unit_price * item.quantity)}</td>
            <td><button type='button' class="btn btn-danger" onClick='deleteItem(${
                item.id
            })'>Xóa</button></td>
        </tr>`;

        itemsList.children("tbody").append(html);
    });
}

addItemForm.on("submit", e => {
    e.preventDefault();
    let data = addItemForm.serializeArray();

    let dataObject = {
        id: Math.floor(Math.random() * 10),
        name: data[0].value,
        short_desc: data[1].value,
        unit_price: data[2].value,
        quantity: data[3].value,
        total: data[2].value * data[3].value
    };

    items.push(dataObject);
    addItemRow(items);
    total += data[2].value * data[3].value;

    if (typeof totalDB !== "undefined") {
        total += totalDB;
    }
    amount = total + (total * taxRate) / 100;
    $("#total").text(`${formatter.format(amount)}`);
    $("#addItemModal").modal("hide");

    addItemForm.trigger("reset");
});

createBillForm.on("submit", e => {
    e.preventDefault();
    const organization_id = getOrganizationUk();
    let data = createBillForm.serializeArray();

    let dataObject = {
        organization_id,
        type: data[1].value,
        tax: data[2].value,
        title: data[3].value,
        description: data[4].value,
        createdBy: $("#created_by").val(),
        createdAt: $("#created_at").val(),
        total,
        amount: total - (total * taxRate) / 100,
        senderInfo: {
            name: data[5].value,
            sender_phone: data[6].value,
            sender_email: data[7].value,
            sender_org: data[8].value
        },
        receiverInfo: {
            name: data[9].value,
            receiver_phone: data[10].value,
            receiver_email: data[11].value,
            receiver_org: data[12].value
        },
        items
    };

    // Ajax call here
    if (typeof itemsListDb !== "undefined" && typeof bill_id !== "undefined") {
        $.ajax({
            url: `/organizations/bills/${bill_id}`,
            type: "PUT",
            data: { ...dataObject, id: bill_id },
            success: function(data) {
                location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("Đã xảy ra lỗi");
            }
        });
    } else {
        $.ajax({
            url: "/organizations/bills",
            type: "POST",
            data: dataObject,
            success: function(data) {
                location.href = data.back_to;
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("Đã xảy ra lỗi");
            }
        });
    }
});

if (typeof itemsListDb !== "undefined") {
    addItemRow(itemsListDb);
    $("#taxRate").text(`${taxDB}%`);
    $("#total").text(`${formatter.format(totalDB)}`);
} else {
    addItemRow(items);
}
