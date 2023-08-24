$(document).ready(function () {
    
  $(document).ready(function () {
    $("#feesTable").DataTable({
      processing: true,
      serverSide: true,
      ajax: "lib/client/fetch_data.php",
    });
  });

  $("#addFeesForm").submit(function (event) {
    event.preventDefault();

    var fees_title = $("#fees_title").val();
    var fees_details = $("#fees_details").val();
    var fees_year = $("#fees_year").val();
    var fees_cost = $("#fees_cost").val();
    var deadline = $("#deadline").val();
    var add_fees = $("#add_fees").val();

    $(".form-message").load("lib/client/add_client.php", {
      fees_title: fees_title,
      fees_details: fees_details,
      fees_year: fees_year,
      fees_cost: fees_cost,
      deadline: deadline,
      add_fees: add_fees,
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
            $("#feesTable").DataTable().ajax.reload();
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
        $("#editFees").modal("show");
        $("#edit_fees_title").val(data.title);
        $("#edit_fees_details").val(data.descripton);
        $("#edit_fees_year").val(data.year);
        $("#edit_fees_cost").val(data.cost);
        $("#edit_deadline").val(data.deadline);
        $("#hid").val(member_id);
        $(".modal-title").text("Edit Fee Details");
      },
    });
  });

  $("#editFeesForm").submit(function (event) {
    event.preventDefault();

    var fees_title = $("#edit_fees_title").val();
    var fees_details = $("#edit_fees_details").val();
    var fees_year = $("#edit_fees_year").val();
    var fees_cost = $("#edit_fees_cost").val();
    var deadline = $("#edit_deadline").val();
    var edit_fees = $("#edit_fees").val();
    var hid = $("#hid").val();

    $(".form-message").load("lib/client/edit_client.php", {
      fees_title: fees_title,
      fees_details: fees_details,
      fees_year: fees_year,
      fees_cost: fees_cost,
      deadline: deadline,
      edit_fees: edit_fees,
      hid: hid,
    });
  });
});
