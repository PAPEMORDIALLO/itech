@extends('layaout.tamplateadmin')
@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Ajouter un utilisateur</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Personal Information</h4>
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label for="prenom" class="col-lg-3 col-form-label">Prenom</label>
                                    <div class="col-lg-9">
                                        <input id="prenom" name="prenom" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nom" class="col-lg-3 col-form-label">Nom</label>
                                    <div class="col-lg-9">
                                        <input id="nom" name="nom" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">statut</label>
                                    <div class="col-lg-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="statut" id="active" value="active" checked>
                                            <label class="form-check-label" for="active">
                                                activer
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="statut" id="gender_female" value="desactive">
                                            <label class="form-check-label" for="gender_female">
                                                Desactiver
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label for="email" class="col-lg-3 col-form-label">Email</label>
                                    <div class="col-lg-9">
                                        <input id="email" name="email" type="email" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-lg-3 col-form-label">Password</label>
                                    <div class="col-lg-9">
                                        <input id="password" name="password" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirmpassword" class="col-lg-3 col-form-label">Confirmer Password</label>
                                    <div class="col-lg-9">
                                        <input id="confirmpassword" name="confirmpassword" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Address</h4>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label for="adresse" class="col-lg-3 col-form-label">Address </label>
                                    <div class="col-lg-9">
                                        <input id="adresse" name="adresse" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telephone" class="col-lg-3 col-form-label">Telephone</label>
                                    <div class="col-lg-9">
                                        <input id="telephone" name="telephone"  type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label for="cni" class="col-lg-3 col-form-label">Cni</label>
                                    <div class="col-lg-9">
                                        <input id="cni" name="cni" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pays" class="col-lg-3 col-form-label">Pays</label>
                                    <div class="col-lg-9">
                                        <input id="pays" name="pays" type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
