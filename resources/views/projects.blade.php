@extends('master')
@section('title', 'Projects')
@section('content')
<h1>Projects</h1>
<div class="grid">
    <div class="project-card">
        <h2>CutlerTech Website</h2>
        <a href="#"><img src="{{asset('images/project_image.png')}}" alt="CutlerTech Website link"></a>
        <b>Web Development</b>
        <p>Stack: Laravel</p>
        <p>Developer: Alex Cutler</p>
    </div>
</div>
<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: auto;
    }
    .project-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 3px solid black;
        width: 25%;
        margin: 1rem auto;
        text-align: center;
        padding: 0.5rem;
        background-color: #ffa900;
    }
    .project-card img {
        width: 100%;
        height: auto;
        padding: 1rem;
    }
    p {
        padding: 0 !important;
    }
</style>
@endsection