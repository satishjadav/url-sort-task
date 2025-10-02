<html>

<head>
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.min.css">

</head>

<body>
    <div class="container">
        <div class="row mb-4">
            <a href="{{ route('add-user')}}" class="btn btn-primary">add user</a>&nbsp;&nbsp;&nbsp;
            <a href="{{ route('login')}}" class="btn btn-primary">login</a>
        </div>
        <div class="row justify-content-center" style="box-shadow: 17px 13px 54px -23px;">
            <div class="col-md-3 mt-4">
                <div class="form-group">
                    <label for="">User Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter User Email Id">
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" id="password" class="form-control" placeholder="Enter Valid Password">
                </div>
                <div class="form-group">
                    <input type="button" onclick="check()" class="btn btn-success form-control" value="Login">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.min.js"></script>

</body>
<script>
    function check() {
        $.ajax({
            url: "{{ url('api/user-login')}}",
            data: {
                "email": $('#email').val(),
                "password": $('#password').val(),
                '_token': "{{ csrf_token() }}"
            },
            dataType: "json",
            type: "post",
            success: function(data) {
                if (data.status == 1) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "login Success",
                        showConfirmButton: false,
                        timer: 1000
                    });
                 window.location.href=`{{ route('admin.dashboard')}}`;
                } else {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Email and Password Invalid",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }
</script>

</html>