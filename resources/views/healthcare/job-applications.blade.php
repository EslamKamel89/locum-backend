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
                                <td>{{ $jobApplication->status }}</td>
                                <td>
                                    <a href="{{ route('healthcare.applications.show', $jobApplication->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('healthcare.applications.edit', $jobApplication->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
