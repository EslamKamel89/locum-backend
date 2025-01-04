<div class="tab-pane fade" id="adds" role="tabpanel" aria-labelledby="adds-tab">
    <div class="card">
        <div class="card-header bg-primary text-white">Job Adds</div>
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
                        @foreach ($jobAdds as $add)
                            <tr>
                                <td>{{ $add->doctor?->user?->name }}</td>
                                <td>{{ $add->jobAdd?->hospital?->user?->name }}</td>
                                <td>{{ $add->application_date }}</td>
                                <td>{{ $add->status }}</td>
                                <td>
                                    <a href="{{ route('healthcare.adds.show', $add->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('healthcare.adds.edit', $add->id) }}"
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
