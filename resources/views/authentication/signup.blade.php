<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body style="height: 100vh" class="d-flex align-items-center py-4 bg-body-tertiary">
    <div class="container">
        <div class="row">
            <main class="form-signin w-50 m-auto shadow p-4 rounded bg-light">
                <form class="mb-3" action="{{ route('user.signup') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Create New Account</h1>
                    <div class="row">
                        <div class="col-6 pe-0">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    id="firstName" placeholder="Enter First Name" name="first_name" value="{{ old('first_name') }}" required>
                                <label for="firstName">First Name</label>
                                @error('first_name')
                                    <div class="alert" role="alert">
                                        <strong>required*</strong> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="lastName" name="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                                <label for="lastName">Last Name</label>
                                @error('last_name')
                                    <div class="alert" role="alert">
                                        <strong>required*</strong> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            id="phone" placeholder="phone number" value="{{ old('phone') }}" required>
                        <label for="phone">Phone</label>
                        @error('phone')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select @error('city_id') is-invalid @enderror" name="city_id" id="cities"
                            required>
                            <option selected>Select City</option>
                            <option value="1">Karachi</option>
                            <option value="2">Lahore</option>
                            <option value="3">Islamabad</option>
                            <option value="4">Peshawar</option>
                            <option value="5">KPK</option>
                            <option value="6">Multan</option>
                            <option value="7">Hyderabad</option>
                            <option value="8">Faisalabad</option>
                        </select>
                        @error('city_id')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            id="image" placeholder="choose image" value="{{ old('image') }}" required />
                        @error('image')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="male" name="gender" id="male"
                                checked required />
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                required />
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Sign Up</button>
                </form>
                <p class="text-end">
                    Already Have An Account?
                    <a href="{{ route('/') }}" class="text-decoration-none">
                        Login now
                    </a>
                </p>
            </main>
        </div>
    </div>
</body>

</html>
