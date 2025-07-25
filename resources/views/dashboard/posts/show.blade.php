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
                    <h1><i class="fa fa-info-circle"></i> Post Um</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- ACTIONS -->
    <section id="actions" class="bg-light mb-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="index.html" class="btn btn-block btn-light">
                        <i class="fas fa-arrow-left"></i> Voltar para o Dashboard
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#" class="btn btn-block btn-success">
                        <i class="fas fa-check"></i> Salvar Alterações
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fas fa-trash"></i> Deletar Post
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- DETAILS -->
    <main id="details">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Post</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="title">Título</label>
                                    <input type="text" class="form-control" value="Post Um" />
                                </div>
                                <div class="form-group">
                                    <label for="category">Categoria</label>
                                    <select class="form-control">
                                        <option value="" selected>Desenvolvimento Web</option>
                                        <option value="">Desenvolvimento Mobile</option>
                                        <option value="">Desenvolvimento Desktop</option>
                                        <option value="">Negócios</option>
                                        <option value="">Marketing</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Subir Imagem</label>
                                    <div class="custom-file">
                                        <input type="file" id="image" class="custom-file-input"
                                            placeholder="enviar" />
                                        <label for="image" class="custom-file-label">Escolher Arquivo</label>
                                    </div>
                                    <small class="text-muted">Tamanho máximo de 3mb</small>
                                </div>
                                <div class="form-group">
                                    <label for="content">Conteúdo</label>
                                    <textarea name="editPostEditor" class="form-control">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis et animi amet illum, ab cum recusandae. Nesciunt unde accusamus velit ab est sint culpa quidem, excepturi vero, alias, similique fugiat quam ea dolore dolorum perspiciatis ex quaerat! Magni velit inventore dignissimos, voluptas accusamus voluptates expedita, voluptate illum impedit, asperiores quos.
                  </textarea>
                                </div>
                            </form>
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
