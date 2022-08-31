<!doctype html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
            
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="{{asset('website/css/style.css')}}">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    </head>
    <body>	
		<div class="wrapper d-flex align-items-stretch">
            @yield('container')
		</div>

        <script src="{{asset('website/js/jquery.min.js')}}"></script>
        <script src="{{asset('website/js/popper.js')}}"></script>
        <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('website/js/main.js')}}"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
            $('#tabel').DataTable();
            } );
        </script>
    </body>
</html>