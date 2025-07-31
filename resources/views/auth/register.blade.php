@extends('master')
@section('title', 'Register')
@section('content')
<h1>Register Form</h1>
<form action="" method="POST">
    <label for="name">Name *</label>
    <input type="text" name="name" id="name" placeholder="Your name">
    <label for="email">Email *</label>
    <input type="email" name="email" id="email" placeholder="Your email (e.g. test@gmail.com)">
    <label for="password">Password *</label>
    <input type="password" name="password" id="password" placeholder="Your new password">
    <input type="submit" name="submit" class="submit">
</form>
@endsection