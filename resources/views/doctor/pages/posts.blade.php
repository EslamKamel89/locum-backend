<div class="row">
    <h5 class="mb-3 text-primary"><i class="bi bi-briefcase-fill"></i> Jobs</h5>
    @foreach ($jobAdds as $job)
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-body">
                <!-- Job Header -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-primary fw-bold mb-0">{{ $job->title }}</h6>
                    <small class="text-muted">{{ Carbon\Carbon::parse($job->updated_at)->diffForHumans() }}</small>
                </div>

                <!-- Job Details -->
                <p class="mb-3">
                    <span class="badge bg-primary p-2 me-1"><i class="bi bi-tag-fill"></i>
                        {{ $job->specialty?->name }}</span>
                    <span class="badge bg-secondary p-2 me-1"><i class="bi bi-person-badge-fill"></i>
                        {{ $job->jobInfo?->name }}</span>
                    <span class="badge bg-success p-2 me-1"><i class="bi bi-clock-fill"></i>
                        {{ $job->job_type }}</span>
                    <span class="badge bg-info p-2 me-1"><i class="bi bi-geo-alt-fill"></i>
                        {{ $job->location }}</span>
                    <span class="badge bg-danger p-2 me-1"><i class="bi bi-calendar-event-fill"></i>
                        {{ Carbon\Carbon::parse($job->application_deadline)->diffForHumans() }}</span>
                </p>

                <!-- Job Description -->
                <p class="text-muted mb-3">{{ Str::limit($job->description, 150, '...') }}</p>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="{{-- {{ route('job.details', $job->id) }} --}}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-box-arrow-right"></i> View Details
                    </a>
                    <button class="btn btn-primary btn-sm">
                        <i class="bi bi-send-check-fill"></i> Apply Now
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>
