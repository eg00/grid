@extends("layouts.app")
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-outline-secondary">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Редактирование сотрудника</h3>
                </div>
                <div class="card-body pl-5">
                    <form action="{{route('person.update', $person->id)}}" method="post">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group row">
                                    <label for="firstName" class="col-sm-2 col-form-label">Имя</label>
                                    <div class="col-10">
                                        <input class="form-control" id="firstName" type="text" name="firstName"
                                               value="{{$person->first_name}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastName" class="col-sm-2 col-form-label">Фамилия</label>
                                    <div class="col-10">
                                        <input class="form-control" id="lastName" type="text" name="lastName"
                                               value="{{$person->last_name}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middleName" class="col-sm-2 col-form-label">Отчество</label>
                                    <div class="col-10">
                                        <input class="form-control" id="middleName" type="text" name="middleName"
                                               value="{{$person->middle_name}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">Пол</div>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" value="male"
                                                        {{$person->gender === 'мужской'? 'checked' : ''}}>
                                                Мужской
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" value="female"
                                                        {{$person->gender === 'женский' ? 'checked' : ''}}>
                                                Женский
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="salary" class="col-sm-2 col-form-label normal-wrap">Заработная
                                        плата</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="salary" type="text" name="salary"
                                               value="{{$person->salary}}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-4">
                                @foreach($departments as $department)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$department->id}}"
                                               id="department{{$department->id}}" name="departments[]"
                                                {{$person->departments->pluck('id')->contains($department->id) ? 'checked': ''}}>
                                        <label class="form-check-label" for="department{{$department->id}}">
                                            {{$department->title}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-2 offset-4">
                                <div class="form-group">
                                    <button class="btn btn-success btn-lg float-right" type="submit">Изменить</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
