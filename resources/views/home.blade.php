<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konyvtarkezelo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="{{asset('css/book-card.css')}}">
    <script src="{{asset('js/main.js')}}"></script>
</head>
<body>

<div class="container my-5 col-md-8 col-lg-6">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cím / Szerző">
        <div class="input-group-append">
            <span class="input-group-text">
                <box-icon name='search'></box-icon>
            </span>
        </div>
    </div>
</div>

<div class="card-container"></div>

</body>
</html>
