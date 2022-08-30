<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>php-laravel</title>
</head>
<div class="container" style="margin-top: 1em">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">ФИО</th>
            <th scope="col">Компания</th>
            <th scope="col">Телефон</th>
            <th scope="col">Email</th>
            <th scope="col">Дата рождения</th>
            <th scope="col">Фото</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notebooks as $notebook)
            <tr style="vertical-align: middle;">
                <th scope="row">{{$notebook->id}}</th>
                <td>{{$notebook->full_name}}</td>
                <td>{{$notebook->company}}</td>
                <td>{{$notebook->tel}}</td>
                <td>{{$notebook->email}}</td>
                <td>{{date("d.m.Y г.", strtotime($notebook->date_birth))}}</td>
                <td>
                    <img src="{{$notebook->photo}}"
                         class="img-fluid rounded mx-auto d-block" style="max-width: 200px;">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$notebooks->links('pagination::bootstrap-5')}}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</html>
