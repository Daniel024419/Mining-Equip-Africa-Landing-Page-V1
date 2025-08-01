<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.partials.head')
    <title>Mining Equip Africa | Home | Index</title>
</head>

<body>
    @include('dashboard.partials.nav')

    <!-- SETTINGS -->
    <main id="settings">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="margin-top: 20px">
                        <div class="card-header" style="display: flex;justify-content:space-between">
                            <h4>Settings</h4>
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
