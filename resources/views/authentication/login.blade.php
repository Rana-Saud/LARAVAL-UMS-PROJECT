<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body style="height: 100vh" class="d-flex align-items-center py-4 bg-body-tertiary">
    <div class="container">
        @include('layouts.messages')
        <div class="row">
            <main class="form-signin w-50 m-auto shadow rounded p-4 bg-light">
                <form class="mb-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com"
                            name="email" required>
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="alert" role="alert">
                                <strong>required*</strong> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember me
                        </label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                </form>
                <p class="text-end">
                    Not Have An Account?
                    <a href="{{ route('signup') }}" class="text-decoration-none">
                        Signup now
                    </a>
                </p>
            </main>
        </div>
    </div>
</body>

</html>
