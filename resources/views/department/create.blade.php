@extends("layouts.app")
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-outline-secondary">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Создание отдела</h3>
                </div>
                <div class="card-body pl-5">
                    <form action="{{route('department.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label">Название</label>
                                    <div class="col-9">
                                        <input class="form-control" id="title" type="text" name="title"
                                               value="{{old('title')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 offset-5">
                                <div class="form-group">
                                    <button class="btn btn-success btn-lg " type="submit">Создать</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
