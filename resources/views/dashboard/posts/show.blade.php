<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Posts | View</title>
    <style>
        .post-detail-card {
            border-left: 4px solid #007bff;
            margin-bottom: 20px;
        }
        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .post-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .status-published {
            background-color: #d4edda;
            color: #155724;
        }
        .status-draft {
            background-color: #fff3cd;
            color: #856404;
        }
        .post-image {
            max-width: 100%;
            max-height: 400px;
            object-fit: contain;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .detail-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }
        .detail-value {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .content-container {
            line-height: 1.6;
        }
        .content-container img {
            max-width: 100%;
            height: auto;
        }
        .action-buttons {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }
        .metadata {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: #6c757d;
        }
        .metadata-item {
            display: flex;
            align-items: center;
        }
        .metadata-item i {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- POSTS & INFOS -->
    <div class="card post-detail-card">
        <div class="card-header">
            <div class="post-header">
                <h4>View Post</h4>
                <span class="post-status {{ $post->published_at ? 'status-published' : 'status-draft' }}">
                    {{ $post->published_at ? 'Published' : 'Draft' }}
                </span>
            </div>
        </div>

        <div class="card-body">
            <!-- Post Metadata -->
            <div class="metadata">
                <div class="metadata-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>
                        {{ $post->published_at ? 'Published: ' . $post->published_at : 'Created: ' . $post->created_at->format('M d, Y H:i') }}
                    </span>
                </div>
                <div class="metadata-item">
                    <i class="fas fa-edit"></i>
                    <span>
                        Last updated: {{ $post->updated_at->format('M d, Y H:i') }}
                    </span>
                </div>
                <div class="metadata-item">
                    <i class="fas fa-link"></i>
                    <span>
                        Slug: {{ $post->slug }}
                    </span>
                </div>
            </div>

            <!-- Featured Image -->
            @if($post->image)
                <div class="detail-label">Featured Image</div>
                <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt="Featured image">
            @endif

            <!-- Title -->
            <div class="detail-label">Title</div>
            <div class="detail-value">{{ $post->title }}</div>

            <!-- Excerpt -->
            <div class="detail-label">Excerpt</div>
            <div class="detail-value">{{ $post->excerpt }}</div>

            <!-- Content -->
            <div class="detail-label">Content</div>
            <div class="detail-value content-container">
                {!! $post->content !!}
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('dashboard.posts.edit', $post->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Post
                </a>
                <a href="{{ route('dashboard.posts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Posts
                </a>
                @if($post->published_at)
                    <a href="{{ route( 'frontend.home.showPost', $post->slug) }}" target="_blank" class="btn btn-success">
                        <i class="fas fa-eye"></i> View Live
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    @include('dashboard.partials.script')
    <!-- Include Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>