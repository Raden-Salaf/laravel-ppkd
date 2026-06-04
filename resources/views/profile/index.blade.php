<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
{{-- @dd($profiles) --}}
<!-- untuk menampilkan data yang ada di variabel $profiles, ini hanya untuk debugging, jadi nanti setelah dicek, bisa dihapus -->

<body>
    <table class="table table-bordered">
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        @foreach ($profiles as $profile)
            <tr>
                <td>{{ $profile->email }}</td>
                <td>{{ $profile->name }}</td>
                <td>{{ $profile->profiles->phone }}</td>
                <td>{{ $profile->profiles->address }}</td>
            </tr>
        @endforeach
    </table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
</body>

</html>
