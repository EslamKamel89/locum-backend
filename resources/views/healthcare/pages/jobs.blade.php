<div class="mt-0 tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
    <div class="mb-4 card" style="margin-bottom: 6rem !important">
        <div class="text-white card-header bg-primary">Jobs</div>
        <div class="card-body row">
            @foreach ($jobAdds as $job)
                <div class="mb-1 card me-1" style="flex: 1 1 30%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text">{{ $job->description }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#jobAddModal{{ $job->id }}">
                            View Detail
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="jobAddModal{{ $job->id }}" tabindex="-1"
                    aria-labelledby="jobAddModalLabel{{ $job->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="jobAddModalLabel{{ $job->id }}">{{ $job->title }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><b>Description: </b>{{ $job->description }}</p>
                                <p><b>Speciality: </b>{{ $job->specialty->name }}</p>
                                <p><b>Job name: </b>{{ $job->jobInfo->name }}</p>
                                <p><b>Job type: </b>{{ $job->job_type }}</p>
                                <p><b>Required Documents: </b>{{ $job->required_documents }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="p-3 bg-white shadow fixed-bottom border-top">
        <button type="submit" class="btn btn-primary btn-lg w-100">Save</button>
    </div> --}}
</div>
