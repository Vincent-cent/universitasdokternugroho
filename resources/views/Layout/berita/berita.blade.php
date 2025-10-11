@extends('Layout.mainLayout')

@section('title', 'Detail Berita - Universitas Doktor Nugroho')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th> ID </th>
                <th> Title </th>
                <th> Author </th>
                <th> Tahun </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritas as $pro)
                <tr>
                    <td> <a href = "/berita/{{ $pro["id"] }}">{{ $pro ['id']}} </a></td>
                    <td> {{ $pro ['title'] }} </td>
                    <td> {{ $pro ['author']}} </td>
                    <td> {{ $pro ['published_at'] }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection