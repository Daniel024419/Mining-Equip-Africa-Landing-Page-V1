<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Posts | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- POSTS & INFOS -->
    <div class="card">
        <div class="card-header" style="display: flex;justify-content:space-between">
            <h4>All Posts ( {{ $posts->total() }}) </h4>
            <a href="#" style="width: 200px;" class="btn btn-block btn-primary" data-toggle="modal"
                data-target="#addPostModal">
                <i class="fas fa-plus"></i> Add Post / Article
            </a>
        </div>

        <table class="table table-striped table-scroll">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Data</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $index => $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('files/' . $post->image) }}" alt="{{ $post->title }}" width="60"
                                    height="60" style="object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug ?? '—' }}</td>
                        <td>{{ $post->published_at ? $post->published_at : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('dashboard.posts.show', $post->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Trigger Delete Modal -->
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deletePostModal{{ $post->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            @include('dashboard.posts.delete-post-modal')
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center">Not post created yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="row mt-5 wow fadeInUp mt-3 justify-content-center" data-wow-delay="0.3s">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>


    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD POST MODAL -->
    @include('dashboard.posts.add-post-modal')

    @include('dashboard.partials.script')
</body>

</html>
