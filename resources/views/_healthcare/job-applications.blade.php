<div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="job-tab">
    <div class="card">
        <div class="card-header bg-primary text-white">Job Applications</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Hospital Name</th>
                            <th>Application Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobApplications as $jobApplication)
                            <tr>
                                <td>{{ $jobApplication->doctor?->user?->name }}</td>
                                <td>{{ $jobApplication->jobAdd?->hospital?->user?->name }}</td>
                                <td>{{ $jobApplication->application_date }}</td>
                                <td>
                                    @if ($jobApplication->status->name == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif ($jobApplication->status->name == 'accepted')
                                        <span class="badge bg-success">Accepted</span>
                                    @elseif ($jobApplication->status->name == 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#jobApplicationModal{{ $jobApplication->id }}">
                                        View
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="jobApplicationModal{{ $jobApplication->id }}"
                                        tabindex="-1"
                                        aria-labelledby="jobApplicationModalLabel{{ $jobApplication->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="jobApplicationModalLabel{{ $jobApplication->id }}">Job
                                                        Application Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Add job application details here -->
                                                    <p>Doctor Name: {{ $jobApplication->doctor?->user?->name }}</p>
                                                    <p>Hospital Name:
                                                        {{ $jobApplication->jobAdd?->hospital?->user?->name }}</p>
                                                    <p>Application Date: {{ $jobApplication->application_date }}</p>
                                                    <p>Status: {{ $jobApplication->status }}</p>
                                                    <p>Notes: {{ $jobApplication->additional_notes }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
