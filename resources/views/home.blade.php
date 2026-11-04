@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="hero" aria-labelledby="home-title">
        <div class="hero-copy">
            <p class="eyebrow">SHARKBYTE / YOUR ACCOUNT WORKSPACE</p>
            <h1 id="home-title">Stay sharp.<br><span class="accent-text">Keep your crew close.</span></h1>
            <p class="lead">Customer contacts and crew accounts, all within reach. Navigate your store's people with Sharkbyte POS.</p>
            <div class="actions">
                <a class="button button-primary" href="{{ route('customers.index') }}">Customer Accounts <span aria-hidden="true">&rarr;</span></a>
                <a class="button button-secondary" href="{{ route('users.index') }}">Meet the crew <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
        <aside class="hero-note" aria-label="Account directory overview">
            <span class="note-number">THE SHARKBYTE WAY</span>
            <span class="note-monogram" aria-hidden="true">SB</span>
            <p class="note-title">A clear view.<br>A steady course.</p>
            <p>Keep track of the people<br>behind your business.</p>
            <a class="text-link" href="{{ route('about') }}">About Sharkbyte <span aria-hidden="true">&rarr;</span></a>
        </aside>
    </section>

    <section class="card-grid" aria-label="Explore Sharkbyte POS">
        <a class="feature-card" href="{{ route('customers.index') }}">
            <span class="card-label"><span class="card-index">01</span> CUSTOMER DIRECTORY</span>
            <h2>Know who's on board.</h2>
            <p>Find customer names, email addresses, phone numbers, and account creation dates.</p>
            <span class="card-link">View Customer Accounts <span aria-hidden="true">&nearr;</span></span>
        </a>
        <a class="feature-card" href="{{ route('users.index') }}">
            <span class="card-label"><span class="card-index">02</span> CREW DIRECTORY</span>
            <h2>Your crew. In clear view.</h2>
            <p>Look up staff members, usernames, account IDs, and creation dates in your crew directory.</p>
            <span class="card-link">View User Accounts <span aria-hidden="true">&nearr;</span></span>
        </a>
    </section>
@endsection
