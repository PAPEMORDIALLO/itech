@extends('layaout.tamplateadmin')
@section('container')
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h4 class="card-title mb-0">Ajouter un categorie</h4>
            </div>
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="image" class="col-lg-3 col-form-label">Image</label>
                        <div class="col-lg-9">
                            <input id="image" name="image" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="libelle" class="col-lg-3 col-form-label">Libelle</label>
                        <div class="col-lg-9">
                            <input id="libelle" name="libelle" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="{{route('categories.index')}}" class="btn btn-primary">Retour</a>
@endsection
