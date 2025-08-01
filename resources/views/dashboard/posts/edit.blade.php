<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Posts | Edit</title>
    <!-- Include any additional CSS for editors -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .image-preview {
            max-width: 300px;
            max-height: 200px;
            margin-top: 10px;
            display: none;
        }
        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
        .slug-preview {
            color: #6c757d;
            font-style: italic;
            margin-top: 5px;
        }
        .publish-status {
            display: flex;
            align-items: center;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-left: 10px;
        }
        .published {
            background-color: #d4edda;
            color: #155724;
        }
        .draft {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- POSTS & INFOS -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit Post</h4>
            <div class="publish-status">
                <span>Status:</span>
                <span class="status-badge {{ $post->published_at ? 'published' : 'draft' }}">
                    {{ $post->published_at ? 'Published' : 'Draft' }}
                </span>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title Section -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-3">
                        <label>Slug</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="slug" name="slug" 
                                   value="{{ old('slug', $post->slug) }}" required>
                        </div>
                        <div class="slug-preview">
                            URL: {{ url('/posts') }}/<span id="slug-preview">{{ $post->slug }}</span>
                        </div>
                        @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Image Section -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="image">Featured Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" 
                               onchange="previewImage(this)">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mt-2">
                            @if($post->image)
                                <p>Current Image:</p>
                                <img src="{{ asset('files/' . $post->image) }}" alt="Current featured image" 
                                     class="img-thumbnail" style="max-height: 200px;">
                            @else
                                <p>No featured image set</p>
                            @endif
                        </div>
                        
                        <img id="image-preview" class="image-preview img-thumbnail" alt="Image preview">
                    </div>
                </div>

                <!-- Excerpt Section -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="excerpt">Excerpt (Summary)</label>
                        <textarea class="form-control" id="excerpt" name="excerpt" rows="3" 
                                  required>{{ old('excerpt', $post->excerpt) }}</textarea>
                        <small class="form-text text-muted">
                            A short summary of your post that will appear in listings.
                        </small>
                        @error('excerpt')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Content Section -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="10" 
                                  required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Publish Section -->
                <div class="form-section">
                    <div class="form-group">
                        <label for="published_at">Publish Date & Time</label>
                        <input type="datetime-local" class="form-control" id="published_at" name="published_at" 
                               value="{{ old('published_at', $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}">
                        <small class="form-text text-muted">
                            Leave empty to keep as draft or set to schedule publication.
                        </small>
                        @error('published_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                    <a href="{{ route('dashboard.posts.index') }}" class="btn btn-secondary">Cancel</a>
                    @if($post->published_at)
                        <button type="button" class="btn btn-warning" onclick="unpublishPost()">Unpublish</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    @include('dashboard.partials.script')
    
    <!-- Include Summernote WYSIWYG editor -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
    <script>
        // Initialize Summernote editor
        $(document).ready(function() {
            $('#content').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            
            // Auto-generate slug from title
            $('#title').on('keyup', function() {
                const title = $(this).val();
                const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
                $('#slug').val(slug);
                $('#slug-preview').text(slug);
            });
            
            // Allow manual slug editing
            $('#slug').on('keyup', function() {
                const slug = $(this).val();
                $('#slug-preview').text(slug);
            });
        });
        
        // Image preview function
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            const file = input.files[0];
            const reader = new FileReader();
            
            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
        
        // Unpublish post confirmation
        function unpublishPost() {
            if (confirm('Are you sure you want to unpublish this post?')) {
                // You would typically make an AJAX request here or have a separate form
                // For simplicity, we'll just clear the published_at field
                document.getElementById('published_at').value = '';
                document.querySelector('form').submit();
            }
        }
    </script>
</body>

</html>