@extends('layouts.base')

@section('title', 'Home')

@section('content')



    @if(Auth::check())
    <p>Congrats you are logged in.</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    
    </form>
    @else
    <div style="border: 3px solid black; margin-bottom: 10px; padding: 10px;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        
        </form>
    
        </div>
        <div style="border: 3px solid black; padding: 10px;">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password">
                <button>Login</button>
            
            </form>
        
            </div>
    @endif


@endsection