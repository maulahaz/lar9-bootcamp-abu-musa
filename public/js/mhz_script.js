//-- Sumber dari Stack Developer:
$(document).ready(function(){
    $(".updateStatusUser").click(function(){
        var status = $(this).text();
        var user_id = $(this).attr("user_id");
        $.ajax({
            type: "POST",
            url: "/admin/user/update-status-user",
            data: {status: status, user_id: user_id},
            success: function(resp){
                // console.log(resp);
                if(resp['status'] == 'Active'){
                    $('#user-'+user_id).html('<a class="updateStatusUser" href="javascript:void(0)">Active</a>');
                }else if(resp['status'] == 'Inactive'){
                    $('#user-'+user_id).html('<a class="updateStatusUser" href="javascript:void(0)">Inactive</a>')
                }
            },
            error: function(){
                alert("Error updateStatusUser");
            } 
        });
    });

    //--Delete Record:
    $(".confirmDelete").click(function(){
        var record = $(this).attr("record");
        var record_id = $(this).attr("record_id");
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            console.log(result);
            if(result.value){
                window.location.href = "/admin/"+record+"/hapus/"+record_id;
            }
        });
    });

    //--Updating Confirmation:
    $(".confirmUpdate").click(function(){
        var controller = $(this).attr("controller");
        var record_id = $(this).attr("record_id");
        Swal.fire({
            title: "Confirmation",
            text: "You are about to update this data. Proceed?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            console.log(result);
            if(result.value){
                window.location.href = controller+"/update/"+record_id;
            }
        });
    });

});
