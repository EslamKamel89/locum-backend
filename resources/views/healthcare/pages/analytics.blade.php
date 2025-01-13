<div class="mt-0 tab-pane fade " id="analytics" role="tabpanel" aria-labelledby="setting-tab">
    <div class="mb-4 card" style="margin-bottom: 6rem !important">
        <div class="text-white card-header bg-primary">Analytics</div>
        <div class="card-body row">
            <div class="row">
                <div class="mt-1 text-center col-md-3 card me-1" onclick="getJobApplications('accepted')">
                    <div class="card-body">
                        <div class="card-title fw-bold">Total Jobs Applied</div>
                        <div class="card-value">{{ $jobApplications->where('status', 'accepted')->count() }}</div>
                    </div>
                </div>
                <div class="mt-1 text-center col-md-3 card me-1" onclick="getJobApplications('rejected')">
                    <div class="card-body">
                        <div class="card-title fw-bold">Total Jobs Denied</div>
                        <div class="card-value">{{ $jobApplications->where('status', 'rejected')->count() }}</div>
                    </div>
                </div>
                <div class="mt-1 text-center col-md-3 card me-1" onclick="getJobApplications('pending')">
                    <div class="card-body">
                        <div class="card-title fw-bold">Total Jobs Pending</div>
                        <div class="card-value">{{ $jobApplications->where('status', 'pending')->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 card" id="job-applications-card" style="margin-bottom: 6rem !important; display: none">
        <div class="text-white card-header bg-dark"><span id="job-applications-title"></span> Details</div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Job Add Title</th>
                        <th>Job Type</th>
                        <th>Location</th>
                        <th>Application Date</th>
                    </tr>
                </thead>
                <tbody id="job-applications-table">
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    function getJobApplications(status) {
        const route = `{{ route('healthcare.get-job-by-status', ['status' => ':status']) }}`
            .replace(':status', status) + `?t=${Date.now()}`; // منع الكاش
        const table = document.querySelector('#job-applications-table');
        const title = document.querySelector('#job-applications-title');
        const applicationsCard = document.querySelector('#job-applications-card');
        const fadeCard = document.querySelector('.fade');

        if (!table || !title || !fadeCard) {
            console.error('Table, title, or fade card not found!');
            return;
        }

        // تنظيف الجدول وعرض مؤشر التحميل
        fadeCard.classList.remove('fade'); // لإظهار العنصر
        title.textContent = `${status.charAt(0).toUpperCase() + status.slice(1)} Job Applications`.replace('Rejected', 'Denied');
        table.innerHTML = `
        <tr>
            <td colspan="5" class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </td>
        </tr>
    `;

        fetch(route)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                applicationsCard.style.display = 'block';
                table.innerHTML = ''; // تنظيف الجدول
                if (data.length === 0) {
                    table.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center text-muted">No applications found for this status.</td>
                    </tr>
                `;
                } else {
                    data.forEach(jobApplication => {
                        table.insertAdjacentHTML('beforeend', `
                        <tr>
                            <td>${jobApplication.doctor.user.name}</td>
                            <td>${jobApplication.job_add.title}</td>
                            <td>${jobApplication.job_add.job_type}</td>
                            <td>${jobApplication.job_add.location}</td>
                            <td>${jobApplication.application_date}</td>
                        </tr>
                    `);
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching job applications:', error);
                table.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-danger">
                        Error loading data. Please try again later.
                    </td>
                </tr>
            `;
            });
    }
</script>
