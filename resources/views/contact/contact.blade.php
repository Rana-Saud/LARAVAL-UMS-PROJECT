<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>
    @include('layouts.nav')

    <section class="tables-page-section mt-5"="service">
        <div class="container">
            @include('layouts.messages')
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="section_title text-center d-flex justify-content-between align-items-center">
                        <h2 class="fw-bold">Contact List</h2>
                        <form class="d-flex align-items-center" role="search">
                            <input type="search" class="form-control me-2" placeholder="Search" aria-label="Search"
                                name="search" value="{{ request('search') }}">
                            <a href="{{ route('contact.create') }}" type="button" class="btn btn-primary w-50">
                                Add New
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class="table-responsive shadow rounded mb-3">
                        <table class="table table-striped table-secondary mb-0">
                            <thead class="">
                                <th>ID</th>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone No.</th>
                                <th>Actions</th>
                            </thead>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th>{{ $contact->id }}</th>
                                    <td>
                                        <img src="{{ isset($contact->image) ? asset('images/' . $contact->image) : asset('images/placeholder-img.png') }}"
                                            alt="user-avatar" class="img-responsive rounded shadow" width="30"
                                            height="30">
                                    </td>
                                    <td>{{ $contact->first_name }}</td>
                                    <td>{{ $contact->last_name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>
                                        <a href="{{ route('contact.view', $contact->id) }}" type="button"
                                            class="btn btn-warning btn-sm">
                                            <img src="{{ asset('icons/eye-fill.svg') }}" alt="view-btn">
                                        </a>
                                        <a href="{{ route('contact.edit', $contact->id) }}" type="button"
                                            class="btn btn-success btn-sm">
                                            <img src="{{ asset('icons/pencil-square.svg') }}" alt="edit-btn">
                                        </a>
                                        <a href="{{ route('contact.delete', $contact->id) }}" type="button"
                                            class="btn btn-danger btn-sm">
                                            <img src="{{ asset('icons/trash-fill.svg') }}" alt="delete-btn">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{-- search and pagination --}}
                    {!! $contacts->appends(['search' => request('search')])->links() !!}
                </div>
            </div>
        </div>
    </section>

    @include('contact-modal')

</body>

</html>
