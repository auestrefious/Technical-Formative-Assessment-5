@extends('layouts.app')

@section('title', 'About')

@section('content')
    <header class="page-heading">
        <p class="eyebrow">SHARKBYTE / ABOUT US</p>
        <h1>Built for your crew.</h1>
        <p class="lead">Sharkbyte POS gives you a clear view of your customers and the people behind your store.</p>
    </header>

    <section class="about-panel" aria-labelledby="purpose-title">
        <div>
            <p class="eyebrow">OUR COURSE</p>
            <h2 id="purpose-title">Sharp focus.<br>Simple navigation.</h2>
        </div>
        <div class="prose">
            <p>Every store has a crew worth knowing. Sharkbyte POS brings customer names, emails, and phone numbers together with staff IDs, usernames, and full names. Both directories show when each account was created.</p>
            <p>Like a shark that keeps its course, Sharkbyte keeps the essentials in focus. Explore Customer Accounts to find a contact, or head to User Accounts to get to know the crew.</p>
            <p class="demo-note">Sharkbyte POS is a student account directory demonstration.</p>
        </div>
    </section>

    <div class="actions">
        <a class="button button-primary" href="{{ route('customers.index') }}">Customer Accounts <span aria-hidden="true">&rarr;</span></a>
        <a class="button button-secondary" href="{{ route('users.index') }}">Meet the crew <span aria-hidden="true">&rarr;</span></a>
    </div>
@endsection
