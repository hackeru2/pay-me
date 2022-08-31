{{-- @dd($responseBody)@enddd --}}
<!DOCTYPE html>
<html>
<head>
    <title>PAYMENT PAGE Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <a href="/sales"   > NAVIGATE TO SALES PAGE </button>
    <iframe style="width:100vw;height:100vh"   src="{{$responseBody['sale_url']}}"></iframe>
</body>
</html>