@include('healthcare.pages.styles.post-style')
<div class="mt-0 tab-pane fade" id="posts" role="tabpanel" aria-labelledby="setting-tab">
    <div class="mb-4 card" style="margin-bottom: 6rem !important">
        {{-- <div class="text-white card-header bg-primary">Posts</div> --}}
        <div class="card-body">
            <div class="container-fluid">
                <div class="post-section">
                    <div class="post-header"> <img src="profile-pic.jpg" alt="Profile Picture" class="profile-pic">
                        <input type="text" placeholder="What's on your mind?" class="post-input">
                    </div>
                    <div class="post-options">
                        <button class="option-btn"><i class="fas fa-smile"></i> Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 bg-white shadow fixed-bottom border-top">
        <button type="submit" class="btn btn-primary btn-lg w-100">Save</button>
    </div>
</div>
