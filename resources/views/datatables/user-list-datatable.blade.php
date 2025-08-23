
<table id="datatable" class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
<script>
    $(function () {
        // Initialize DataTable
        var table = $('#datatable').DataTable({
            ajax: "{{ route('users.list') }}",
        columns:[
            { data: 'id'},
            { data: 'name'},
            { data: 'email'},
            { data: 'created_at'},
            { data: 'action',orderable: false, searchable: false },
        ]
    });     

        // Open Edit Modal and Load Data
        $(document).on('click', '.editUser', function () {
            $('#edit-id').val($(this).data('id'));
            $('#edit-name').val($(this).data('name'));
            $('#edit-email').val($(this).data('email'));
            $('#editUserModal').modal('show');
            
        });

        // Update User via AJAX
        $('#updateuser').click(function () {
            var id = $('#edit-id').val();
            var name = $('#edit-name').val();
            var email = $('#edit-email').val();

            $.ajax({
                url: '/dashboard/user/' + id,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}",
                    name: name,
                    email: email,    
                },
                success: function (response) {
                    $('#edituser').modal('hide');
                    table.ajax.reload();
                    toastr.success(res.message);
                },
                error: function (err) {
                    toastr.error(err.responseJSON.message);
                }
            });
        });
        
    });
</script>