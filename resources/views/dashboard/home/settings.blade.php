<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Home | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- HEADER -->
    <header id="main-header" class="text-white bg-primary py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-cog"></i> Configurações</h1>
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
            </div>
        </div>
    </section>

    <!-- SETTINGS -->
    <main id="settings">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Setar Configurações</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <fieldset class="form-group">
                                    <legend>Permitir Registro de Usuário</legend>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="allow-user-registration"
                                                class="form-check-input" value="yes" checked /> Sim
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="allow-user-registration"
                                                class="form-check-input" value="no" /> Não
                                        </label>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group">
                                    <legend>Formato da Página Inicial</legend>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="homepage-format" class="form-check-input"
                                                value="blogpage" checked /> Página do Blog
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="homepage-format" class="form-check-input"
                                                value="homepage" /> Página Inicial
                                        </label>
                                    </div>
                                </fieldset>
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
