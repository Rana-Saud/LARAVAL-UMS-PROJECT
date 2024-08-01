<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh">
            <main class="form-signin bg-light w-50 shadow rounded p-5">
                <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            id="first_name" placeholder="Enter First Name" value="{{ $contact->first_name }}"
                            name="first_name">
                        <label for="first_name">First Name</label>
                        @error('first_name')
                            <div class="alert alert-danger" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                            id="last_name" placeholder="Enter Last Name" name="last_name"
                            value="{{ $contact->last_name }}">
                        <label for="last_name">Last Name</label>
                        @error('last_name')
                            <div class="alert alert-danger" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" placeholder="phone" value="{{ $contact->phone }}" required>
                        <label for="phone">Phone Number</label>
                        @error('phone')
                            <div class="alert alert-danger" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            id="image" placeholder="choose image" value="{{ $contact->image }}" required />
                        @error('image')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('contact') }}" type="button" class="btn btn-secondary me-2">Close</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>

</html>
