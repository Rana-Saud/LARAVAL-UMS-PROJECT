<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh">
            <main class="form-signin bg-light w-50 shadow rounded p-5">
                <form class="" action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            id="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}" name="first_name" required>
                        <label for="first_name">First Name</label>
                        @error('first_name')
                            <div class="alert alert-danger" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                            id="last_name" placeholder="Enter First Name" name="last_name" value="{{ old('last_name') }}" required>
                        <label for="last_name">Last Name</label>
                        @error('last_name')
                            <div class="alert alert-danger" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" placeholder="phone" value="{{ old('phone') }}" required>
                        <label for="phone">Phone Number</label>
                        @error('phone')
                            <div class="alert alert-danger" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" accept="image/*" required/>
                        @error('image')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4">Create</button>
                </form>
            </main>
        </div>
    </div>
</body>

</html>
