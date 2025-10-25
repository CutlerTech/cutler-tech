@extends('master')
@section('title', 'Pricing')
@section('content')
<h1>Pricing</h1>
<h2>Software Development</h2>
<p>Hourly rate starting at $25/hour.  This is used for projects with unclear or shifting scopes or applying frequent iterations, revisions, or updates to projects.</p>
<div class="grid">
    <div class="pricing-card">
        <h3>Websites</h3>
        <p>High-quality development of websites with the most modern and high-quality design made at a professional level.</p>
        <ul>
            <li>Single person and small groups starting at $200/project</li>
            <li>Small businesses starting at $300/project</li>
            <li>Designing website theme and brand</li>
            <li>Content Creation</li>
            <li>Website/Content Maintance and Hosting - seperate small fee charged per month for making sure the software and content is up to date and the site remains online</li>
        </ul>
    </div>
    <div class="pricing-card">
        <h3>Web Applications</h3>
        <p>High-quality development of web applications at the professional level.</p>
        <ul>
            <li>Single person and small groups starting at $250/project</li>
            <li>Small businesses starting at $400/project</li>
            <li>Database</li>
            <li>Back-end Server</li>
            <li>Front-end User Interface</li>
            <li>Web Application Maintance and Hosting - seperate small fee charged per month for making sure the software is up to date and the site remains online</li>
        </ul>
    </div>
    <div class="pricing-card">
        <h3>Mobile Applications</h3>
        <p>Professional development of mobile applications for iOS and Android.</p>
        <ul>
            <li>Single person and small groups starting at $400/project</li>
            <li>Small businesses starting at $600/project</li>
            <li>Cross platform apps for both iOS and Android using Flutter or React Native</li>
            <li>Fully native platform apps using Swift/Swift for iOS or Kotlin/Jetpack Compose for Android</li>
        </ul>
    </div>
    <div class="pricing-card">
        <h3>Software Consulting</h3>
        <p>Professional guidance of software planning, designing, and implementation that drives real results.</p>
        <ul>
            <li>Hourly rate starting at $20/hour.</li>
            <li>Software architecture and system design</li>
            <li>Cloud migration and infrastructure planning</li>
            <li>Custom app development strategy</li>
            <li>API integration and automation</li>
            <li>Performance optimization and scalability planning</li>
            <li>Agile process and DevOps consulting</li>
        </ul>
    </div>
</div>
<p id="footnote">All of these rates and plans are subject to specific needs and negotiations but will generally be close to, if not at least at, these starting prices and rates.</p>
<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 2fr);
        grid-template-rows: auto;
        gap: 0.75rem;
    }
    .pricing-card {
        display: flex;
        flex-direction: column;
        border: 3px solid black;
        border-radius: 6px;
        width: 100%;
        margin: 0.5rem auto;
        padding: 2rem;
        background-color: #ffa900;
    }
    h3, h2 {
        text-align: center;
    }
    h3 {
        border-bottom: 2px solid black;
        margin: 0 auto;
        width: 50%;
    }
    ul {
        margin: 0 auto;
        padding: 0 auto;
    }
    p {
        padding: 0 !important;
    }
    .pricing-card p {
        margin-top: 1rem;
    }
    #footnote {
        margin: 1rem auto;
        font-size: small;
    }
    @media screen and (max-width: 992px) {
        .grid {
            display: flex;
            flex-direction: column;
        }
        .pricing-card {
            width: 70%;
        }
    }
</style>
@endsection
