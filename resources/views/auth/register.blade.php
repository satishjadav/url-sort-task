<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <a href="{{ route('add-user')}}" class="btn btn-primary">add user</a>&nbsp;&nbsp;&nbsp;
            <a href="{{ route('login')}}" class="btn btn-primary">login</a>
        </div>
        <form action="{{ route('register-save')}}" method="post" class="mt-4">
            @csrf
            <div class="row justify-content-center" style="box-shadow: 17px 13px 54px -23px;">
                <div class="col-md-3 mt-4">
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter User Name">
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="form-group">
                        <label for="">User Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter User Email Id">
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success form-control">
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>