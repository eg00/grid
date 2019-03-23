@extends("layouts.app")


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h2>Список отделов</h2>
                <a href="{{route('department.create')}}" class="btn btn-success">
                    <i class="material-icons">add_circle</i>
                    <span>Добавить новый</span>
                </a>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="text-muted">Показано <b>{{$departments->lastItem()}}</b> из
                    <b>{{$departments->total()}}</b>
                    записей
                </div>
                {{ $departments->links() }}
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Количество сотрудников</th>
                        <th scope="col">Макс. ЗП</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{$department->title}}</td>
                            <td>{{$department->people_count}}</td>
                            <td>{{$department->max_salary}}</td>
                            <td class="d-flex">
                                <a href="{{route('department.edit', $department->id)}}"
                                   class="btn btn-link px-1 py-0 ">
                                    <i class="material-icons edit">edit</i>
                                </a>
                                {{--@if($department->people_count===0)--}}
                                    <form action="{{ route('department.destroy', $department->id)}}" method="post">
                                        <input type="hidden" name="_method" value="delete"/>
                                        @csrf
                                        <button type="submit" class="btn btn-link m-0  px-1 py-0">
                                            <i class="material-icons delete">delete</i>
                                        </button>
                                    </form>
                                {{--@endif--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-header d-flex justify-content-between">
                <div class="text-muted">Показано <b>{{$departments->lastItem()}}</b> из
                    <b>{{$departments->total()}}</b>
                    записей
                </div>
                {{ $departments->links() }}
            </div>
        </div>
    </div>
@endsection
