@extends("layouts.app")


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h2>Список сотрудников</h2>
                <a href="{{route('person.create')}}" class="btn btn-success">
                    <i class="material-icons">add_circle</i>
                    <span>Добавить нового</span>
                </a>
            </div>
            @if( method_exists($people,'links') )
                <div class="card-header d-flex justify-content-between ">
                    <p class="text-muted mt-0">Показано <b>{{$people->lastItem()}}</b> из <b>{{$people->total()}}</b>
                        записей
                    </p>
                    {{ $people->links() }}
                </div>
            @endif
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Отчество</th>
                        <th scope="col">Пол</th>
                        <th scope="col">ЗП</th>
                        <th scope="col">Отделы</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($people as $person)
                        <tr>
                            <td>{{$person->last_name}}</td>
                            <td>{{$person->first_name}}</td>
                            <td>{{$person->middle_name}}</td>
                            <td>{{$person->gender}}</td>
                            <td>{{$person->salary}}</td>
                            <td>
                                @foreach($person->departments as $department)
                                    {{$department->title}}{{!$loop->last ? ',': ''}}
                                @endforeach
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{route('person.edit', $person->id)}}" class="btn btn-link px-1 py-0 ">
                                    <i class="material-icons edit">edit</i>
                                </a>
                                <form action="{{ route('person.destroy', $person->id)}}" method="post" >

                                    <input type="hidden" name="_method" value="delete"/>
                                    @csrf
                                    <button type="submit" class="btn btn-link m-0  px-1 py-0"><i class="material-icons delete">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if( method_exists($people,'links') )
                <div class="card-footer d-flex justify-content-between">
                    <div class="text-muted">Показано <b>{{$people->lastItem()}}</b> из <b>{{$people->total()}}</b>
                        записей
                    </div>
                    {{ $people->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
