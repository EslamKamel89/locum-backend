<div class="mt-0 tab-pane fade " id="analytics" role="tabpanel" aria-labelledby="setting-tab">
    <div class="mb-4 card" style="margin-bottom: 6rem !important">
        <div class="text-white card-header bg-primary">Analytics</div>
        <div class="card-body row">
            <div class="row">
                <div class="mt-1 text-center col-md-3 card me-1">
                    <div class="card-body">
                        <div class="card-title fw-bold">Total Jobs Applied</div>
                        <div class="card-value">{{ $jobApplications->where('status', 'accepted')->count() }}</div>
                    </div>
                </div>
                <div class="mt-1 text-center col-md-3 card me-1">
                    <div class="card-body">
                        <div class="card-title fw-bold">Total Jobs Rejected</div>
                        <div class="card-value">{{ $jobApplications->where('status', 'rejected')->count() }}</div>
                    </div>
                </div>
                <div class="mt-1 text-center col-md-3 card me-1">
                    <div class="card-body">
                        <div class="card-title fw-bold">Total Jobs Pending</div>
                        <div class="card-value">{{ $jobApplications->where('status', 'pending')->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
