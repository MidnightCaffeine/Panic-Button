$(document).ready(function () {
    
  $(document).ready(function () {
    $("#clientTable").DataTable({
      processing: true,
      serverSide: true,
      ajax: "lib/client/fetch_data.php",
    });
  });

  $("#addClientForm").submit(function (event) {
    event.preventDefault();

    var client_firstname = $("#client_firstname").val();
    var client_lastname = $("#client_lastname").val();
    var client_middlename = $("#client_middlename").val();
    var client_age = $("#client_age").val();
    var client_address = $("#client_address").val();
    var client_device_id = $("#client_device_id").val();
    var add_client = $("#add_client").val();

    $(".form-message").load("lib/client/add_client.php", {
      client_firstname: client_firstname,
      client_lastname: client_lastname,
      client_middlename: client_middlename,
      client_age: client_age,
      client_address: client_address,
      client_device_id: client_device_id,
      add_client: add_client
    });
  });

  $(document).on("click", ".delete", function () {
    var fee_id = $(this).attr("id");

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "lib/client/delete_client.php",
          method: "POST",
          data: {
            fee_id: fee_id,
          },
          success: function (data) {
            Swal.fire({
              title: "Delete Successfully!",
              text: "Fee has been deleted on the list",
              icon: "success",
              timer: 2000,
              timerProgressBar: true,
              showConfirmButton: false,
            });
            $("#clientTable").DataTable().ajax.reload();
          },
        });
      }
    });
  });

  $(document).on("click", ".update", function () {
    var member_id = $(this).attr("id");
    $.ajax({
      url: "lib/client/fetch_single.php",
      method: "POST",
      data: {
        member_id: member_id,
      },
      dataType: "json",
      success: function (data) {
        $("#editClient").modal("show");
        $("#edit_client_firstname").val(data.firstname);
        $("#edit_client_middlename").val(data.middlename);
        $("#edit_client_lastname").val(data.lastname);
        $("#edit_client_age").val(data.age);
        $("#edit_client_address").val(data.address);
        $("#edit_client_device_id").val(data.device_id);
        $("#hid").val(member_id);
      },
    });
  });

  $("#editClientForm").submit(function (event) {
    event.preventDefault();

    var edit_client_firstname = $("#edit_client_firstname").val();
    var edit_client_middlename = $("#edit_client_middlename").val();
    var edit_client_lastname = $("#edit_client_lastname").val();
    var edit_client_age = $("#edit_client_age").val();
    var edit_client_address = $("#edit_client_address").val();
    var edit_client_device_id = $("#edit_client_device_id").val();
    var edit_client = $("#edit_client").val();
    var hid = $("#hid").val();

    $(".form-message").load("lib/client/edit_client.php", {
      edit_client_firstname: edit_client_firstname,
      edit_client_middlename: edit_client_middlename,
      edit_client_lastname: edit_client_lastname,
      edit_client_age: edit_client_age,
      edit_client_address: edit_client_address,
      edit_client_device_id: edit_client_device_id,
      edit_client: edit_client,
      hid: hid,
    });
  });
});
