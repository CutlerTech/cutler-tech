@extends('master')
@section('title', 'Skills and Tech Stacks')
@section('content')
<h1>Team Skillset and Tech Stack</h1>
<div class="skill-card">
    <h4 class="title">Alex Cutler - CEO/Owner</h4>
    <div class="card-lists">
        <div class="left-side">
            <b>Languages</b>
            <ul>
                <li>Python</li>
                <li>C</li>
                <li>C++</li>
                <li>C#</li>
                <li>RISC-V Assembly</li>
                <li>JavaScript</li>
                <li>TypeScript</li>
                <li>Swift</li>
                <li>Kotlin</li>
                <li>SQL</li>
                <li>PHP</li>
            </ul>
        </div>
        <div class="right-side">
            <b>Frameworks</b>
            <ul>
                <li>Flask</li>
                <li>Vue</li>
                <li>Express</li>
                <li>Node</li>
                <li>Angular</li>
                <li>MongoDB</li>
                <li>SQLite</li>
                <li>MySQL</li>
                <li>Laravel</li>
                <li>Unity</li>
            </ul>
        </div>
    </div>
</div>
<style>
    .skill-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 3px solid black;
        margin: 2rem auto 0;
        width: 20%;
    }
    .title {
        padding: 0.5rem 1rem;
        border-bottom: 2px solid black;
    }
    .card-lists {
        display: flex;
        flex-direction: row;
        gap: 2rem;
    }
</style>
@endsection