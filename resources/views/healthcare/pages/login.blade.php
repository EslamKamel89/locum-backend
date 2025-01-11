<div class="mt-0 tab-pane fade" id="login" role="tabpanel" aria-labelledby="setting-tab">

  <div class="row">
    <div class="mt-0">
        <div class="mb-4 card" style="margin-bottom: 6rem !important">
            <div class="text-white card-header bg-primary">Login Data</div>
            <div class="card-body">
                {{-- Sub header --}}
                <form action="{{ route('healthcare.update-profile', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="mb-2 col-md-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ Auth::user()->email }}" required>
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
                </form>
            </div>
        </div>

    </div>
  </div>
</div>
