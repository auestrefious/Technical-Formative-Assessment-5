@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
    <header class="page-heading">
        <p class="eyebrow">SHARKBYTE / CUSTOMER DIRECTORY</p>
        <h1>Customer Accounts</h1>
        <p class="lead">Know who's on board. Find customer contact details and account creation dates in one place.</p>
    </header>

    <section class="directory" aria-labelledby="customers-table-title">
        <div class="directory-heading">
            <h2 id="customers-table-title">All customers</h2>
            <span class="record-count"><span class="count-dot" aria-hidden="true"></span>{{ count($customers) }} customers</span>
        </div>
        <div class="table-scroll" role="region" aria-label="Customer account table" tabindex="0">
            <table>
                <caption class="sr-only">Customer row numbers, full names, email addresses, example phone numbers, and example creation dates. Row numbers indicate listing order.</caption>
                <thead>
                    <tr>
                        <th scope="col" class="id-column">#</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email address</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Date created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr data-record="customer">
                            <td class="record-id">{{ $loop->iteration }}</td>
                            <td class="record-name">{{ $customer['full_name'] }}</td>
                            <td class="record-email">{{ $customer['email'] }}</td>
                            <td class="record-phone">{{ $customer['phone'] }}</td>
                            <td class="record-date">{{ date('M d, Y', strtotime($customer['created_at'])) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="table-note">Phone numbers and creation dates are examples.</p>
    </section>
@endsection
