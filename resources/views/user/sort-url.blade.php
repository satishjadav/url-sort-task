<html>

<head>
    <title>Convert a Sort Url</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <a href="{{ route('add-user')}}" class="btn btn-primary">add user</a>&nbsp;&nbsp;&nbsp;
            <a href="{{ route('login')}}" class="btn btn-primary">login</a>
        </div>
        <form action="{{ route('sort-url-convert')}}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <label for="">Enter Long Url</label>
                        <input type="text" name="url" class="form-control" placeholder="Enter Log Url">
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