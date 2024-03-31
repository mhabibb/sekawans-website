@extends('layouts.admin')

@section('content')
    <h1>Facility Details</h1>

    <ul>
        <li><strong>Name:</strong> {{ $facility->name }}</li>
        <li><strong>URL Map:</strong> {{ $facility->url_map }}</li>
        <li><strong>District:</strong> {{ $facility->district->name }}</li>
    </ul>
@endsection
