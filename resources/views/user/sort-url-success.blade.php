<html>
    <head>
        <title>Sort Url Success</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            
                <div class="row justify-content-center">
                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="">New Url</label><br>
                            <a href="{{ route('url',['id'=>($sortUrl['newurl'])])}}" target="_blank" rel="noopener noreferrer">{{ route('url',['id'=>($sortUrl['newurl'])])}}</a>
                        </div>
                        <div class="form-group">
                            
                        </div>
                    </div>                    
                </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    </body>
</html>