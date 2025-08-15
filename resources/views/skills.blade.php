@extends('master')
@section('title', 'Skills and Tech Stacks')
@section('content')
<h1>Team Skillset and Tech Stack</h1>
<div class="grid-container">
    <div class="skill-card">
        <h4 class="title">Alex Cutler</h4>
        <small><b>CEO/Owner</b></small>
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
</div>
<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: auto;
    }
    .skill-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 3px solid black;
        margin: 2rem auto 0;
        width: 50%;
        padding: 0 2rem;
        background-color: #ffa900;
    }
    .title {
        margin-top: 1rem;
    }
    .title ~ small b {
        padding: 0.5rem 2rem;
        border-bottom: 2px solid black;
    }
    .card-lists {
        display: flex;
        flex-direction: row;
        gap: 10rem;
        margin-top: 1rem;
    }
    @media screen and (max-width: 1200px) {
        .skill-card {
            width: 70%;
        }
    }
    @media screen and (max-width: 768px) {
        .grid-container {
            display: flex;
            flex-direction: column;
        }
        .skill-card {
            width: 60%;
        }
        .card-lists {
            gap: 3rem;
        }
    }
</style>
@endsection