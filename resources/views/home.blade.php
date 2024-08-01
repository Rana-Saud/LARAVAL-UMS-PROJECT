<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

<body>
    @include('layouts.nav')
    <div class="container">
        @include('layouts.messages')
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="section_title text-center d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">Existing Users</h2>
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
        <div class="row my-4 ps-2">
            @foreach ($users as $user)
                <div class="card mt-3 me-2 p-0 shadow" style="width:20rem;">
                    <img src="{{ $user->image ? asset('images') . '/' . $user->image : asset('images/placeholder-img.png') }}"
                        class="card-img-top" height="300px" width="100%" alt="user-profile">
                    <div class="card-body">
                        <h6 class="card-title text-capitalize"><strong>Name:
                            </strong>{{ $user->first_name . ' ' . $user->last_name }}
                        </h6>
                        <h6 class="card-title"><strong>Email: </strong>{{ $user->email }}</h6>
                        <h6 class="card-title"><strong>Phone: </strong>{{ $user->phone }}</h6>
                        <h6 class="card-title"><strong>Gender: </strong>{{ $user->gender }}</h6>
                        <h6 class="card-title"><strong>City: </strong>Karachi</h6>
                        <h6 class="card-title"><strong>Status: </strong>
                            <span class="badge {{ $user->id == Auth::id() ? 'bg-success' : 'bg-danger' }}">
                                @if ($user->id == Auth::user()->id)
                                    {{ 'Active' }}
                                @else
                                    {{ 'Inactive' }}
                                @endif
                            </span>
                        </h6>
                        <div class="d-flex gap-2">
                            <a href="{{ $user->id == Auth::id() ? route('contact') : '' }}" class="btn btn-primary">Contact</a>
                            <button class="btn btn-primary">Profile</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
