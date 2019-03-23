@extends("layouts.app")
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-outline-secondary">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Изменение отдела</h3>
                </div>
                <div class="card-body pl-5">
                    <form action="{{route('department.update', $department->id)}}" method="post">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-4 col-form-label">Название</label>
                                    <div class="col-8">
                                        <input class="form-control" id="title" type="text" name="title"
                                               value="{{$department->title}}" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-success btn-lg " type="submit">Изменить</button>
                        </div>
                        @if(count($department->people)>0)
                            <div class="row">
                                <div class="col">
                                    <h4>Сотрудники отдела</h4>
                                    <ul class="list-group">
                                        @foreach($department->people as $person)
                                            <li class="list-group-item">
                                                {{$person->last_name}}
                                                {{$person->first_name}}
                                                {{$person->middle_name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
