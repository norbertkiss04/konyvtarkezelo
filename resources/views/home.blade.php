<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konyvtarkezelo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
    <x-new-book></x-new-book>
    <div class="d-flex justify-content-center">
        <button id="showModalButton" class="btn btn-dark">Új verseny</button>
    </div>
</div>


<div class="card-container"></div>

</body>
</html>
