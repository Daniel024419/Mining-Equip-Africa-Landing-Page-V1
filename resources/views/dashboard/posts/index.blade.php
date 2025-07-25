<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.partials.head') 
    <title>Mining Equip Africa | Posts | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')
    
    <!-- HEADER -->
    <header id="main-header" class="text-white bg-primary py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-cog"></i> Posts</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- ACTIONS -->
    <section id="actions" class="bg-light mb-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="btn btn-block btn-primary" data-toggle="modal"
                        data-target="#addPostModal">
                        <i class="fas fa-plus"></i> Add Post / Article
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- POSTS & INFOS -->
    <main id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Últimos Posts</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Categoria</th>
                                    <th>Data</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Post Um</td>
                                    <td>Desenvolvimento Web</td>
                                    <td>10 de julho de 2020</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Mais Detalhes
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Post Dois</td>
                                    <td>Desenvolvimento Mobile</td>
                                    <td>5 de julho de 2020</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Mais Detalhes
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Post Três</td>
                                    <td>Desenvolvimento Desktop</td>
                                    <td>30 de junho de 2020</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Mais Detalhes
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Post Quatro</td>
                                    <td>Negócios</td>
                                    <td>22 de junho de 2020</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Mais Detalhes
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Post Cinco</td>
                                    <td>Marketing</td>
                                    <td>16 de junho de 2020</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Mais Detalhes
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Post Seis</td>
                                    <td>Desenvolvimento Web</td>
                                    <td>4 de junho de 2020</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Mais Detalhes
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Post Sete</td>
                                    <td>Desenvolvimento Mobile</td>
                                    <td>30 de maio de 2020</td>
                                    <td>
                                        <a href="details.html" class="btn btn-secondary">
                                            <i class="fas fa-angle-double-right"></i> Mais Detalhes
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center text-white bg-primary mb-3">
                        <div class="card-body">
                            <h3>Posts</h3>
                            <h4 class="display-4">
                                <i class="fas fa-pencil-alt"></i> 7
                            </h4>
                            <a href="posts.html" class="btn btn-sm btn-outline-light">Ver Todos</a>
                        </div>
                    </div>

                    <div class="card text-center text-white bg-success mb-3">
                        <div class="card-body">
                            <h3>Categorias</h3>
                            <h4 class="display-4">
                                <i class="fas fa-folder"></i> 5
                            </h4>
                            <a href="categories.html" class="btn btn-sm btn-outline-light">Ver Todas</a>
                        </div>
                    </div>

                    <div class="card text-center text-white bg-warning mb-3">
                        <div class="card-body">
                            <h3>Usuários</h3>
                            <h4 class="display-4">
                                <i class="fas fa-users"></i> 4
                            </h4>
                            <a href="users.html" class="btn btn-sm btn-outline-light">Ver Todos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD POST MODAL -->
    @include('dashboard.posts.add-post-modal')

    @include('dashboard.partials.script')
</body>

</html>
