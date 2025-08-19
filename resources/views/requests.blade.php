@extends('master')
@section('title', 'Requests')
@section('content')
<h1>Project Requests</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif
<form action="{{route('requests.store')}}" method="POST" id="requests-form">
    @csrf
    <label for="name">Name *</label>
    <input type="text" name="name" id="name" placeholder="Your name">
    <label for="goal">What are you hoping to accomplish? *</label>
    <input type="text" name="goal" placeholder="Goal">
    <label for="email">Email Address *</label>
    <input type="email" name="email" id="email" placeholder="Email Address">
    <label for="company-name">Name of your company or business</label>
    <input type="text" name="company-name" placeholder="Company/Business Name">
    <label for="website">Current Website</label>
    <input type="url" name="website" placeholder="Website">
    <label for="employees">Number of Employees</label>
    <input type="number" min="1" name="employees" id="employees" placeholder="Number of Employees">
    <label for="location">Location</label>
    <input type="text" name="location" placeholder="Location">
    <label for="phone">Phone Number</label>
    <input type="tel" name="phone" placeholder="Phone Number">
    <label for="challenge">Biggest Challenge</label>
    <input type="text" name="challenge" placeholder="Biggest Challenge">
    <label for="comments">Anything else</label>
    <textarea name="comments" id="comments" placeholder="Anything Else?"></textarea>
    <input type="submit" name="submit" class="submit">
</form>
<style>
    form {
        width: 25%;
        border: 3px solid black;
        background-color: #FFA900;
    }
</style>
@endsection