<html>

<head>
    <title>list</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
</head>

<body>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <table class="table" id="example">
                        <thead>
                            <tr>
                                <td>Sno.</td>
                                <td>New Url</td>
                                <td>Old Url</td>
                                <td>Option</td>
                            </tr>
                        </thead>
                         <tbody>
                            @if($sortUrl)
                            @foreach($sortUrl as $key=>$val)
                            <tr>
                                <td>{{ $loop->index}}</td>
                                <td>{{ route('url',['id'=>($val['newurl'])])}}</td>
                                <td>{{ $val['oldurl']}}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('admin.update-url',['id'=>$val['id']]) }}" class="btn-sm btn btn-info">Edit</a>
                                        <a href="{{ route('admin.delete-url',['id'=>$val['id']]) }}" class="btn-sm btn btn-danger">Delete</a>
                                        @if($val['status'] == 1)
                                        <a href="{{ route('admin.status-update',['id'=>$val['id']]) }}" class="btn-sm btn btn-success">Active</a>
                                        @else 
                                        <a href="{{ route('admin.status-update',['id'=>$val['id']]) }}" class="btn-sm btn btn-warning">Inactive</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script>
    new DataTable('#example', {
    order: [[3, 'desc']]
});
</script>
</body>

</html>