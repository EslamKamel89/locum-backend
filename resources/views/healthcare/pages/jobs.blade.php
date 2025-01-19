<div class="mt-0 tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
    <div class="mb-4 card" style="margin-bottom: 6rem !important">
        <div class="text-white card-header bg-primary">Jobs</div>
        <div class="card-body row">
            @foreach ($jobAdds as $job)
                <div class="mb-1 card me-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <small class="text-muted">{{ Carbon\Carbon::parse($job->updated_at)->diffForHumans() }}</small>
                        </div>
                        <p class="mb-3">
                            <span class="badge bg-primary p-2 me-1"><i class="bi bi-tag-fill"></i>
                                {{ $job->specialty?->name }}</span>
                            <span class="badge bg-secondary p-2 me-1"><i class="bi bi-person-badge-fill"></i>
                                {{ $job->jobInfo?->name }}</span>
                            <span class="badge bg-success p-2 me-1"><i class="bi bi-clock-fill"></i>
                                {{ $job->job_type }}</span>
                            <span class="badge bg-info p-2 me-1"><i class="bi bi-geo-alt-fill"></i>
                                {{ $job->location }}</span>
                            <span class="badge bg-danger p-2 me-1"><i class="bi bi-calendar-event-fill"></i>
                                {{ Carbon\Carbon::parse($job->application_deadline)->diffForHumans() }}</span>
                        </p>
                        <p class="card-text">{{ Str::limit($job->description, 200, '...') }}</p>
                        @if (strlen($job->description) > 200)
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#jobAddModal{{ $job->id }}">
                                View Detail
                            </button>
                        @endif
                    </div>
                    <div class="comments">
                        @if ($job->comments->isNotEmpty())
                            <h6 class="card-subtitle mb-3 text-muted">{{ $job->comments->count() }} Comments</h6>
                            <div class="list-group">
                                @foreach ($job->comments as $comment)
                                    <!-- Comments رئيسي -->
                                    <div class="list-group-item list-group-item-light mb-2 rounded shadow-sm">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $comment->user?->doctor?->photo ?? 'https://randomuser.me/api/portraits/women/' . fake()->numberBetween(1, 99) . '.jpg' }}"
                                                alt="avatar" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <span class="fw-bold">{{ $comment->user->name ?? 'Annonymous' }}</span>
                                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                </div>
                                                <p class="mb-0">{{ $comment->content }}</p>
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse"
                                                        data-bs-target="#replyForm{{ $comment->id }}">
                                                        Reply
                                                    </button>
                                                    <div class="collapse mt-2" id="replyForm{{ $comment->id }}">
                                                        <x-comment-form :action="route('healthcare.comments.store', $job->id)"
                                                            :parentId="$comment->id" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- عرض الردود -->
                                        @if ($comment->children?->isNotEmpty())
                                            <div class="mt-3 ms-5">
                                                @foreach ($comment->children as $reply)
                                                    <div class="list-group-item list-group-item-light mb-2 rounded shadow-sm">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ $reply->user?->doctor?->photo ?? 'https://randomuser.me/api/portraits/men/' . fake()->numberBetween(1, 99) . '.jpg' }}"
                                                                alt="avatar" class="rounded-circle me-3"
                                                                style="width: 30px; height: 30px;">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex justify-content-between">
                                                                    <span class="fw-bold">{{ $reply->user->name ?? 'Annonymous' }}</span>
                                                                    <small
                                                                        class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                                                </div>
                                                                <p class="mb-0">{{ $reply->content }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">Comments not found</p>
                        @endif

                        <!-- نموذج Add Comment جديد -->
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="collapse"
                                data-bs-target="#commentForm">
                                Add Comment
                            </button>
                            <div class="collapse mt-2" id="commentForm">
                                <x-comment-form :action="route('healthcare.comments.store', $job->id)" />
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach
        </div>
    </div>
</div>