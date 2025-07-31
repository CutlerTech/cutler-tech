@extends('master')
@section('title', 'Login')
@section('content')
<h1>Login Form</h1>
<form action="" method="POST">
    <label for="email">Email *</label>
    <input type="email" name="email" id="email" placeholder="Your email (e.g. test@gmail.com)">
    <label for="password">Password *</label>
    <input type="password" name="password" id="password" placeholder="Your password">
    <input type="submit" name="submit" class="submit">
</form>
@endsection