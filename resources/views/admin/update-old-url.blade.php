<html>

<head>
    <title>Update Sort Url</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="{{ route('admin.update-url-save',['id'=>$sortUrl['id']])}}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <label for="">Enter Long Url</label>
                        <input type="text" name="url" class="form-control" value="{{ $sortUrl['oldurl']}}" placeholder="Enter Log Url">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success form-control" value="Update">
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