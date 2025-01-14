<div class="mt-0 tab-pane fade" id="login" role="tabpanel" aria-labelledby="setting-tab">

    <div class="row">


        <div class="mt-0">
            <form action="{{ route('healthcare.update-profile', Auth::user()->id) }}" id="updateProfileForm"
                method="post">
                @if ($hospital->photo === null)
                    <div class="mb-2 card">
                        <div class="card-body">
                            <h3>Today's Action</h3>
                            <p class="text-muted">Pages that complete these actions regularly grow 4x faster</p>
                            {{-- <div class="p-3 mb-4 card">
                            <h4>Add Wallpaper</h4>
                            <p>Add a Wallpaper to help your Page standout and grow brand awareness.<a href=""
                                    class="text-decoration-none fw-bold">Add</a></p>
                        </div> --}}
                            <div class="p-3 mb-4 card d-flex">
                                <h4>Add logo</h4>
                                <p>
                                    Add a logo to help your Page standout and grow brand awareness.
                                <div onclick="updateProfileImage()"
                                    class="text-decoration-none fw-bold text-primary cursor-pointer">Add</div>
                                </p>
                            </div>

                        </div>
                    </div>
                @endif
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


<script>
    const updateProfileImage = () => {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';

        input.addEventListener('change', async () => {
            const file = input.files[0];
            if (!file) return;

            // عرض الصورة في صفحة المستخدم
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                const img = document.querySelector('.profile-photo');
                img.src = reader.result;
                img.width = 100;
                img.height = 100;
            });

            reader.readAsDataURL(file);

            // رفع الملف مباشرةً باستخدام FormData
            const form = document.getElementById('updateProfileForm');

            // استخدام FormData لتضمين الملف
            const formData = new FormData(form);
            formData.append('photo', file);

            try {
                const response = await fetch(form.action, {
                    method: form.method.toUpperCase(),
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'), // إضافة CSRF Token
                    },
                });

                if (response.ok) {
                    console.log('Image uploaded successfully');
                    location.reload();
                } else {
                    console.error('Error uploading image:', response.statusText);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        input.click();
    };
</script>
