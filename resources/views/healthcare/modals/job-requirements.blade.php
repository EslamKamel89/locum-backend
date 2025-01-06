<div class="modal fade" id="requirments" tabindex="-1" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Job Requirement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="requirements" class="form-label">Requirements</label>
                    <textarea class="form-control" id="requirements" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="specializations" class="form-label">Specializations</label>
                    <select class="form-select" id="specializations" multiple required>
                        <option value="general-practice">General Practice</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="anesthesiology">Anesthesiology</option>
                        <option value="surgery">Surgery</option>
                        <option value="psychiatry">Psychiatry</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="skills" class="form-label">Skills</label>
                    <textarea class="form-control" id="skills" rows="3"></textarea>
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
