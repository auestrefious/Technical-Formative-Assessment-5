@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
    <header class="page-heading">
        <p class="eyebrow">SHARKBYTE / CREW DIRECTORY</p>
        <h1>User Accounts</h1>
        <p class="lead">Meet the crew behind Sharkbyte. Find staff account details and when each account was created.</p>
    </header>

    <section class="directory" aria-labelledby="users-table-title">
        <div class="directory-heading">
            <h2 id="users-table-title">The crew</h2>
            <span class="record-count"><span class="count-dot" aria-hidden="true"></span>{{ count($users) }} users</span>
        </div>
        <div class="table-scroll" role="region" aria-label="User account table" tabindex="0">
            <table>
                <caption class="sr-only">Staff account IDs, usernames, full names, and example creation dates.</caption>
                <thead>
                    <tr>
                        <th scope="col" class="id-column">ID</th>
                        <th scope="col" class="username-column">Username</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Date created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr data-record="user">
                            <td class="record-id">{{ $user['id'] }}</td>
                            <td><span class="username">{{ $user['username'] }}</span></td>
                            <td class="record-name">{{ $user['full_name'] }}</td>
                            <td class="record-date">{{ date('M d, Y', strtotime($user['created_at'])) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="table-note">Creation dates are examples.</p>
    </section>
@endsection
