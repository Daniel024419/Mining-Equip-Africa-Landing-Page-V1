<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Posts | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- ACTIONS -->
    <section id="actions" class="bg-light mb-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addPostModal">
                        <i class="fas fa-plus"></i> Add Post / Article
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- POSTS & INFOS -->
    <div class="card">
        <div class="card-header">
            <h4>All Posts</h4>
        </div>

        <table class="table table-striped table-scroll">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Data</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $index => $post)
                    <tr>
                        <td>{{ $index + 1 }}</td>
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
                            <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Not post created yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD POST MODAL -->
    @include('dashboard.posts.add-post-modal')

    @include('dashboard.partials.script')
</body>

</html>
