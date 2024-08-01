<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh">
            <main class="form-signin bg-light w-50 shadow rounded p-5">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="first_name" placeholder="Enter First Name"
                        value="{{ $contact->first_name }}" name="first_name" readonly>
                    <label for="first_name">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name"
                        name="last_name" value="{{ $contact->last_name }}" readonly>
                    <label for="last_name">Last Name</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="phone"
                        value="{{ $contact->phone }}" readonly>
                    <label for="phone">Phone Number</label>
                </div>
                <div class="mt-3">

                </div>
                <a href="{{ route('contact') }}" type="button" class="btn btn-primary w-100 mt-4">Close</a>
            </main>
        </div>
    </div>
</body>

</html>
