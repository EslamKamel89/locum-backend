<div class="card mb-4 mb-lg-0">
    <h5 class="mb-3 p-3 text-primary"><i class="bi bi-briefcase-fill"></i> Suggested Doctors</h5>
    <div class="card-body p-0">
        <ul class="list-group list-group-flush rounded-3">
            @foreach ($doctors as $doctor)
                @if (Auth::user()->id !== $doctor->user_id)
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex flex-column align-items-start">
                            <img src="{{ asset($doctor->photo) }}" alt="{{ $doctor->name }}"
                                class="rounded-circle mb-2"
                                style="width: 50px; height: 50px; object-fit: cover;">
                            <a href="{{-- {{ route('doctor.show', $doctor->id) }} --}}" class="text-decoration-none text-reset text-start">
                                <h6 class="mb-0">{{ $doctor->name }}</h6>
                                <p class="mb-0 text-muted" style="font-size: 0.80rem;">
                                    {{ $doctor->jobInfo?->name }}
                                </p>
                                <p class="mb-0 text-muted" style="font-size: 0.80rem;">
                                    {{ $doctor->user?->district?->name }} - {{ $doctor->user?->state?->name }}
                                </p>
                            </a>
                        </div>
                        <form action="#" method="{{-- POST --}}">
                            {{-- @csrf --}}
                            <button type="submit" class="btn btn-primary btn-sm">Follow</button>
                        </form>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
