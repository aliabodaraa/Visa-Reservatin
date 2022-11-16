@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        @auth
            <h2>Hello From My Application</h2>



        @endauth

        @guest
        <h1>Homepage</h1>
        
        @endguest
    </div>
@endsection
