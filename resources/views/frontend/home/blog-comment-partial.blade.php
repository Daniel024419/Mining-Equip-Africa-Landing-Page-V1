<!-- Comments Section -->
<div class="mt-5 pt-4 border-top">
    <h4 class="mb-4">{{ $post->comments->count() }} Comments</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Comment Form -->
    @auth
        <div class="mb-5">
            <form action="{{ route('frontend.comments.store', $post) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea required name="content" class="form-control bg-light border-0 py-3" rows="3"
                        placeholder="Write your comment..."></textarea>
                </div>
                <button type="submit" class="btn btn-warning mt-3">Post Comment</button>
                <a href="{{ route('dashboard.auth.logout') }}"> <button type="button" class="btn btn-secondary mt-3"> <i
                            class="fa fa-lock"></i> Logout</button></a>
            </form>

        </div>
    @else
        <div class="alert alert-warning">
            Please <a href="{{ route('dashboard.auth.index') }}">login</a> or <a href="#" data-bs-toggle="modal"
                data-bs-target="#registrationModal"> create account</a> to post a comment.
        </div>
    @endauth

    <!-- Comments List -->
    <div class="comment-list">
        @foreach ($post->comments as $comment)
            <div class="comment mb-4 border-bottom pb-4">
                <div class="d-flex">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=random"
                        class="rounded-circle me-3" width="50" alt="User">
                    <div>
                        <h6 class="mb-1">{{ $comment->user->name }} @if (Auth::user()->id === $comment->user_id) (me) @endif</h6>
                        <small class="text-muted">
                            {{ $comment->created_at->diffForHumans() }}
                        </small>
                        <p class="mt-2 mb-3">{{ $comment->content }}</p>

                        <!-- Reply Button -->
                        @auth
                            <button class="btn btn-sm btn-outline-secondary reply-btn"
                                data-comment-id="{{ $comment->id }}">
                                Reply
                            </button>
                            @if (Auth::user()->id === $comment->user_id)
                                <button class="btn btn-sm btn-outline-warning reply-btn"
                                    data-comment-id="{{ $comment->id }}">
                                    Delete
                                </button>
                            @endif

                        @endauth
                    </div>
                </div>

                <!-- Replies -->
                @foreach ($comment->replies as $reply)
                    <div class="reply ms-5 mt-3 ps-3 border-start">
                        <div class="d-flex">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($reply->user->name) }}&background=random"
                                class="rounded-circle me-3" width="40" alt="User">
                            <div>
                                <h6 class="mb-1">{{ $reply->user->name }}</h6>
                                <small class="text-muted">
                                    {{ $reply->created_at->diffForHumans() }}
                                </small>
                                <p class="mt-2 mb-2">{{ $reply->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Reply Form (Hidden) -->
                @auth
                    <div class="reply-form ms-5 mt-3 d-none" id="reply-form-{{ $comment->id }}">
                        <form action="{{ route('frontend.comments.store', $post) }}" method="POST">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <div class="form-group">
                                <textarea name="content" class="form-control bg-light border-0 py-2" rows="2" placeholder="Write your reply..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary mt-2">Post Reply</button>
                        </form>
                    </div>
                @endauth
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function() {
                const formId = 'reply-form-' + this.dataset.commentId;
                document.getElementById(formId).classList.toggle('d-none');
            });
        });
    </script>
@endpush

@include('frontend.home.registration-modal')
