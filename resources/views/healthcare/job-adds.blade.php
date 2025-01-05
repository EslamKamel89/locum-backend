<div class="tab-pane fade" id="adds" role="tabpanel" aria-labelledby="adds-tab">
    <div class="card">
        <div class="card-header bg-primary text-white">Job Adds</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Speciality</th>
                            <th>Job name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobAdds as $add)
                            <tr>
                                <td>{{ $add->title }}</td>
                                <td>{{ $add->specialty->name }}</td>
                                <td>{{ $add->jobInfo->name }}</td>
                                <td>{{ $add->job_type }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#jobAddModal{{ $add->id }}">View</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="jobAddModal{{ $add->id }}" tabindex="-1"
                                        aria-labelledby="jobAddModalLabel{{ $add->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="jobAddModalLabel{{ $add->id }}">{{ $add->title }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Title: {{ $add->title }}</p>
                                                    <p>Speciality: {{ $add->specialty->name }}</p>
                                                    <p>Job name: {{ $add->jobInfo->name }}</p>
                                                    <p>Job type: {{ $add->job_type }}</p>
                                                    <p>Additional notes: {{ $add->additional_notes }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editJobAddModal{{ $add->id }}">Edit</button>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editJobAddModal{{ $add->id }}" tabindex="-1"
                                        aria-labelledby="editJobAddModalLabel{{ $add->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editJobAddModalLabel{{ $add->id }}">Edit Job Add</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('healthcare.adds.update', $add->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input type="text" class="form-control" id="title"
                                                                name="title" value="{{ $add->title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="specialty_id">Specialty</label>
                                                            <select class="form-control" id="specialty_id"
                                                                name="speciality_id">
                                                                @foreach ($specialties as $specialty)
                                                                    <option value="{{ $specialty->id }}"
                                                                        {{ $add->speciality_id == $specialty->id ? 'selected' : '' }}>
                                                                        {{ $specialty->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="job_id">Job</label>
                                                            <select class="form-control" id="job_id" name="job_info_id">
                                                                @foreach ($jobs as $job)
                                                                    <option value="{{ $job->id }}"
                                                                        {{ $add->job_info_id == $job->id ? 'selected' : '' }}>
                                                                        {{ $job->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="job_type">Job Type</label>
                                                            <input type="text" class="form-control" id="job_type"
                                                                name="job_type" value="{{ $add->job_type }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </form>
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
