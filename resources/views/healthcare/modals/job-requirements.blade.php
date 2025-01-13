<div class="modal fade" id="requirments" tabindex="-1" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Job Requirement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="experience_required" class="form-label">Experience Requirements</label>
                    <textarea class="form-control" id="experience_required" rows="3" name="experience_required" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="speciality_id" class="form-label">Specializations</label>
                    <select class="select2-multiple" id="speciality_id" multiple required>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="job_info_id" class="form-label">Job Info</label>
                    <select class="select2-multiple" id="job_info_id" multiple required>
                        @foreach ($jobs as $job)
                            <option value="{{ $job->id }}">{{ $job->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="skills" class="form-label">Skills</label>
                    <select class="select2-multiple" id="skills" multiple required>
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="px-5 border border-muted btn btn-primary rounded-3 font-weight-bold"
                    data-bs-toggle="modal" data-bs-target="#job-type">Next <i
                        class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
