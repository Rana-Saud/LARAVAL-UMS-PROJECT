<!-- Delete User Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="contactModalLabel">
                    Create New Contact
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <main class="form-signin pb-0">
                    <form class="" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name" placeholder="Enter First Name" name="first_name" required>
                            <label for="first_name">First Name</label>
                            @error('first_name')
                                <div class="alert alert-danger" role="alert">
                                    <strong>required*</strong> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                id="last_name" placeholder="Enter First Name" name="last_name" required>
                            <label for="last_name">Last Name</label>
                            @error('last_name')
                                <div class="alert alert-danger" role="alert">
                                    <strong>required*</strong> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" name="phone" placeholder="phone" required>
                            <label for="phone">Phone Number</label>
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    <strong>required*</strong> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" id="image" placeholder="choose image" value="{{ old('image') }}" />
                            @error('image')
                                <div class="alert" role="alert">
                                    <strong>required*</strong> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer mt-3 pb-0">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
