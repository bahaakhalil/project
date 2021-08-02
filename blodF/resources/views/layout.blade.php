<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Blog 2021</title>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous"> --}}
        <link rel="stylesheet"  href="https://bootswatch.com/3/darkly/bootstrap.min.css">
    <style>
        .form-search{
    margin-bottom: 15px;
   }
   </style>
</head>

<body>

    @include('_header')
    <div class="container">
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $("#btnSearch").click(function(){
            var text = $("#search").val();
            $.get("/search/"+ text ).done(function(result){
                $("#posts").replaceWith(result);
            });
        });
    </script>
</body>

</html>
