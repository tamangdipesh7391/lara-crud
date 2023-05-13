<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
</head>

<body class="container-fluid">
   <form action="{{route('customers.update', $customer->id)}}" method="POST">
       @csrf
       @method('PUT')
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" value="{{$customer->username}}" id="username" name="username">
            <a class="text-danger" href="">
                @error('username')
                    {{$message}}
                @enderror
            </a>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" value="{{$customer->address}}" id="address" name="address">
            <a class="text-danger" href="">
                @error('address')
                    {{$message}}
                @enderror
            </a>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" value="{{$customer->phone}}" id="phone" name="phone">
            <a class="text-danger" href="">
                @error('phone')
                    {{$message}}
                @enderror
            </a>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
   </form>

</body>

</html>