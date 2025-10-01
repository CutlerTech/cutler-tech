@extends('master')
@section('title', 'Pricing')
@section('content')
<h1>Pricing</h1>
<h2>Software Development</h2>
<p>Hourly rate starting at $25/hour.  This is used for projects with unclear or shifting scopes or applying frequent iterations, revisions, or updates to projects.</p>
<div class="grid">
    <div class="pricing-card">
        <h3>Websites</h3>
        <ul>
            <li>Single person and small groups starting at $200/project</li>
            <li>Small businesses starting at $300/project</li>
            <li>Designing website theme and brand</li>
            <li>Content Creation</li>
            <li>Website Maintance and Hosting - seperate small fee similar to the hourly rate but will be at a discounted rate</li>
        </ul>
    </div>
    <div class="pricing-card">
        <h3>Web Applications</h3>
        <ul>
            <li>Single person and small groups starting at $250/project</li>
            <li>Small businesses starting at $400/project</li>
            <li>Database</li>
            <li>Back-end Server</li>
            <li>Front-end User Interface</li>
        </ul>
    </div>
    <div class="pricing-card">
        <h3>Mobile Applications</h3>
        <ul>
            <li>Single person and small groups starting at $400/project</li>
            <li>Small businesses starting at $600/project</li>
            <li>Cross platform apps for both iOS and Android using Flutter or React Native</li>
            <li>Fully native platform apps using Swift/Swift for iOS or Kotlin/Jetpack Compose for Android</li>
        </ul>
    </div>
</div>
<div class="consulting">
    <h2>Software/IT Consulting</h2>
    <p>Hourly rate starting at $20/hour.</p>
</div>
<p id="footnote">All of these rates and plans are subject to specific needs and negotiations but will generally be close to, if not at least at, these starting prices and rates.</p>
<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(3, 3fr);
        grid-template-rows: auto;
        gap: 0.75rem;
    }
    .pricing-card {
        display: flex;
        flex-direction: column;
        border: 3px solid black;
        width: 100%;
        margin: 1rem auto;
        padding: 2rem;
        background-color: #ffa900;
    }
    .pricing-card h3 {
        text-align: center;
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
    #footnote {
        margin: 0;
        font-size: small;
    }
</style>
@endsection