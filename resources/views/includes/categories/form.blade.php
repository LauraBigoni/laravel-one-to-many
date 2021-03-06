<div class="container">
    <div class="row">
        <div class="col-12">
            <header>
                @if ($category->exists)
                    <h1 class="text-center">Aggiorna la categoria</h1>
                @else
                    <h1 class="text-center">Crea una nuova categoria</h1>
                @endif
            </header>
            @if ($errors->any())
                <div class="alert alert-{{ session('type') ?? 'info' }} text-center" role="alert">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="d-flex justify-content-end align-items-center col-12 pt-3">
                <a class="btn btn-sm btn-info ml-auto" href="{{ route('admin.categories.index') }}">Indietro <i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>
            @if ($category->exists)
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                    class="col-12 d-flex flex-wrap align-items-center" novalidate>
                    @method('PUT')
                @else
                    <form action="{{ route('admin.categories.store') }}" method="POST"
                        class="col-12 d-flex flex-wrap align-items-center" novalidate>
            @endif
            @csrf
            <div class="form-group col-6">
                <label for="label">Nome:</label>
                <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label"
                    value="{{ old('label', $category->label) }}" required>
                @error('label')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="color">Colore:</label>
                <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color"
                    value="{{ old('color', $category->color) }}" required>
                @error('color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end align-items-center ml-auto pt-3">
                <button type="reset" class="btn btn-sm btn-info mr-2">Reset <i
                        class="fa-solid fa-arrow-rotate-left"></i></button>
                <button type="submit" class="btn btn-sm btn-info">Salva <i class="fa-solid fa-floppy-disk"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
