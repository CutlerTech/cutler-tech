@extends('master')
@section('title', 'Pricing')
@section('content')
<h1>Pricing</h1>
<h2>Software Development</h2>
<p>Hourly rate starting at $25/hour.  This is used for projects with unclear/shifting scopes or applying frequent iterations/revisions to projects.</p>
<div class="grid">
    <div class="pricing-card">
        <h3>Websites</h3>
        <ul>
            <li>Single person and small groups starting at $200/project</li>
            <li>Small businesses starting at $300/project</li>
        </ul>
    </div>
    <div class="pricing-card">
        <h3>Web Applications</h3>
        <ul>
            <li>Single person and small groups starting at $250/project</li>
            <li>Small businesses starting at $400/project</li>
        </ul>
    </div>
    <div class="pricing-card">
        <h3>Mobile Applications</h3>
        <ul>
            <li>Single person and small groups starting at $400/project</li>
            <li>Small businesses starting at $600/project</li>
        </ul>
    </div>
</div>
<div class="consulting">
    <h2>Software/IT Consulting</h2>
    <p>Hourly rate starting at $20/hour.</p>
</div>
<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(3, 3fr);
        grid-template-rows: auto;
        gap: 1rem;
    }
    .pricing-card {
        display: flex;
        flex-direction: column;
        border: 3px solid black;
        justify-content: center;
        width: 100%;
        margin: 1rem auto;
        text-align: center;
        padding: 0.5rem;
        background-color: #ffa900;
    }
    ul {
        margin: 0 auto;
        padding: 0 auto;
    }
    .consulting, h2 {
        text-align: center;
    }
    p {
        padding: 0 !important;
    }
</style>
@endsection