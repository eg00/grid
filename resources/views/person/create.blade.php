@extends("layouts.app")
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-outline-secondary">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Создание сотрудника</h3>
                </div>
                <div class="card-body pl-5">
                    <form action="{{route('person.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group row">
                                    <label for="firstName" class="col-sm-3 col-form-label">Имя</label>
                                    <div class="col-9">
                                        <input class="form-control" id="firstName" type="text" name="firstName"
                                               value="{{old('firstName')}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastName" class="col-sm-3 col-form-label">Фамилия</label>
                                    <div class="col-9">
                                        <input class="form-control" id="lastName" type="text" name="lastName"
                                               value="{{old('lastName')}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middleName" class="col-sm-3 col-form-label">Отчество</label>
                                    <div class="col-9">
                                        <input class="form-control" id="middleName" type="text" name="middleName"
                                               value="{{old('middleName')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Пол</div>
                                    <div class="col-sm-9">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" value="male">
                                                Мужской
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender"
                                                       value="female">
                                                Женский
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="salary" class="col-sm-3 col-form-label normal-wrap">Заработная
                                        плата</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="salary" type="text" name="salary"
                                               value="{{old('salary')}}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-5">
                                @foreach($departments as $department)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$department->id}}"
                                               id="department{{$department->id}}" name="departments[]"
                                        @if(old('departments'))
                                            {{in_array($department->id, old('departments')) ? 'checked': ''}}
                                        @endif
                                        >
                                        <label class="form-check-label" for="department{{$department->id}}">
                                            {{$department->title}}
                                        </label>
                                    </div>
                                @endforeach
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
