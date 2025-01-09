<div class="modal fade" id="additional" tabindex="-1" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Additional Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="required-documents" class="form-label">Required Documents</label>
                    <textarea class="form-control" id="required-documents" name="required_documents" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="responsibilities" class="form-label">Responsibilities</label>
                    <textarea class="form-control" id="responsibilities" name="responsibilities" rows="3"></textarea>
                </div>
                {{-- <div class="mb-3">
                    <label for="terms-agreement" class="form-label">Agree to Terms</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-agreement" name="terms-agreement"
                            required>
                        <label class="form-check-label" for="terms-agreement">I agree to the terms and
                            conditions.</label>
                    </div>
                </div> --}}
                <div class="modal-footer">
                    <button type="button" onclick="postJob()"
                        class="px-5 border border-muted btn btn-primary rounded-3 font-weight-bold">Post </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function postJob() {
        let url = "{{ route('healthcare.job-add.store') }}";
        let data = {
            hospital_id: "{{ auth()->user()->hospital->id }}" ?? null,
            title: document.getElementById('job-title')?.value ?? null,
            description: document.getElementById('job-description')?.value ?? null,
            speciality_id: document.getElementById('speciality_id')?.value ?? null,
            job_info_id: document.getElementById('job_info_id')?.value ?? null,
            job_type: document.getElementById('job_type')?.value ?? null,
            location: document.getElementById('location')?.value ?? null,
            responsibilities: document.getElementById('responsibilities')?.value ?? null,
            qualifications: document.getElementById('qualifications')?.value ?? null,
            experience_required: document.getElementById('experience_required')?.value ?? null,
            salary_min: document.getElementById('salary_min')?.value ?? null,
            salary_max: document.getElementById('salary_max')?.value ?? null,
            benefits: document.getElementById('benefits')?.value ?? null,
            working_hours: document.getElementById('working_hours')?.value ?? null,
            application_deadline: document.getElementById('application_deadline')?.value ?? null,
            required_documents: document.getElementById('required-documents')?.value ?? null,
            _token: "{{ csrf_token() }}"
        };

        // حذف الحقول التي قيمتها null
        Object.keys(data).forEach(key => {
            if (data[key] === null) {
                delete data[key];
            }
        });

        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(responseData => {
                // reload the page
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                location.reload();
            });
    }
</script>
