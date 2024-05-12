@extends('layaout.template')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ $category->exists ? 'Modifier une catégorie' : 'Créer une catégorie' }}
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ $category->exists
                        ? route('categories.update', $category)
                        : route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($category->exists)
                            @method('PUT')
                        @endif

                        @include('components.input', [
                            'label' => 'Nom', 'name' => 'name', 'value' => $category->name
                        ])

                        @include('components.input', [
                            'label' => 'Image', 'name' => 'image', 'value' => $category->image, 'type' => 'file'
                        ])

                        <div class="text-center form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i>
                                {{ $category->exists ? 'Modifier' : 'Créer' }}
                            </button>
                        </div>
                    </form> <!-- End Form Add | Edit form -->
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection
