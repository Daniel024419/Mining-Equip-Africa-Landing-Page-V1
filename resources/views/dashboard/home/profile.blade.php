<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Home | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="fas fa-user"></i> Perfil
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- ACTIONS -->
    <section id="actions" class="py-4 mb-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="index.html" class="btn btn-light btn-block">
                        <i class="fas fa-arrow-left"></i> Voltar para o Dashboard
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-dark btn-block">
                        <i class="fas fa-lock"></i> Alterar Senha
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-danger btn-block">
                        <i class="fas fa-trash"></i> Deletar Conta
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFILE -->
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Perfil</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input name="name" type="text" class="form-control"
                                        value="Gideon Fernandes" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control"
                                        value="gideon@random.com" />
                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea name="editUserBio" class="form-control">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid unde at fugiat explicabo temporibus, tempora animi sunt iusto quod beatae optio veritatis velit natus odit error! Possimus esse quisquam quibusdam eveniet autem! Minus dolore quisquam nemo similique doloribus perspiciatis tempore.
                  </textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3>Seu Avatar</h3>
                    <img src="img/avatar.png" class="d-block img-fluid mb-3">
                    <button class="btn btn-primary btn-block">Alterar Imagem</button>
                    <button class="btn btn-danger btn-block">Deletar Imagem</button>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    @include('dashboard.partials.footer')

    <!-- MODALS -->

    <!-- ADD POST MODAL -->
    @include('dashboard.posts.add-post-modal')

    @include('dashboard.partials.script')
</body>

</html>
