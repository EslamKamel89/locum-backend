<div class="mt-0 tab-pane fade" id="login" role="tabpanel" aria-labelledby="setting-tab">

    <div class="row">


        <div class="mt-0">
            <form action="{{ route('healthcare.update-profile', Auth::user()->id) }}" method="post">
                <div class="mb-2 card">
                    <div class="card-body">
                        <h3>Today's Action</h3>
                        <p class="text-muted">Pages that complete these actions regularly grow 4x faster</p>
                        <div class="p-3 mb-4 card">
                            <h4>Add Wallpaper</h4>
                            <p>Add a Wallpaper to help your Page standout and grow brand awareness.<a href=""
                                    class="text-decoration-none fw-bold">Add</a></p>
                        </div>
                        <div class="p-3 mb-4 card ">
                            <h4>Add logo</h4>
                            <p>Add a logo to help your Page standout and grow brand awareness.<a href=""
                                    class="text-decoration-none fw-bold">Add</a></p>
                        </div>

                    </div>
                </div>
                <div class="mb-4 card" style="margin-bottom: 6rem !important">
                    <div class="text-white card-header bg-primary">Account Settings</div>
                    <div class="card-body">
                        {{-- Sub header --}}
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="mb-2 col-md-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email" value="{{ Auth::user()->email }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label for="password">Old Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="New Password">
                            </div>
                            <div class="mb-2 col-md-12">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="New Password">
                            </div>
                            <div class="mb-2 col-md-12">
                                <label for="password">Retype Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="New Password">
                            </div>

                        </div>

                        <div class="row">
                            <div class="p-3 bg-white shadow ">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
