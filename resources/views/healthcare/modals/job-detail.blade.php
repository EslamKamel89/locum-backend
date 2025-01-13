<div class="modal fade" id="details" tabindex="-1" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Job Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="job-title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="job-title" required>
                </div>
                <div class="mb-3">
                    <label for="job-description" class="form-label">Description</label>
                    <textarea class="form-control" id="job-description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="mb-3">
                    <label for="shift-type" class="form-label">Shift Type</label>
                    <select class="form-select" id="shift-type" name="shift_preference" required>
                        @foreach ($shiftPreference as $shift)
                            <option value="{{ $shift }}">{{ $shift }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="shift-time" class="form-label">Shift Time</label>
                    <div class="input-group">
                        <span class="input-group-text">From</span>
                        <input type="time" class="form-control" id="shift-time-from" required>
                        <span class="input-group-text">To</span>
                        <input type="time" class="form-control" id="shift-time-to" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="required-date" class="form-label">Required Date</label>
                    {{-- <input type="date" class="form-control" id="required-date" required> --}}
                    <input type="text" id="datetime-picker" class="form-control" required
                        placeholder="Select date">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="px-5 border border-muted btn btn-primary rounded-3 font-weight-bold"
                    data-bs-toggle="modal" data-bs-target="#compensation">Next <i
                        class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datetime-picker", {
            enableTime: false,
            dateFormat: "Y-m-d H:i",
            time_24hr: false,
            locale: "en",
        });
    });
</script>
