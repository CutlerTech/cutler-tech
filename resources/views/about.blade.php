@extends('master')
@section('title', 'About Us')
@section('content')
<h1>Meet the Team</h1>
<div class="about-card">
    <img src="" alt="Alex Cutler Headshot">
    <h4>Alex Cutler</h4>
    <b>CEO/Owner</b>
    <p>Alex is the software brains behind CutlerTech.</p>
</div>
<style>
    .about-card {
        text-align: center;
        padding: 1rem;
    }
    .about-card * {
        margin: 0.5rem;
    }
    .about-card h4 {
        border-top: 2px solid black;
        width: 10%;
        margin: 1rem auto 0.25rem;
    }
    .about-card p {
        margin: 0;
        padding: 1rem 0 0;
    }
</style>
@endsection