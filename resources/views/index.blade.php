@extends("layouts.app")
@section('content')
    @isset($people)
        <table class="table table-bordered bg-white">
            <thead>
            <tr>
                <th scope="col" class="white"></th>
                @foreach($departments as $department)
                    <th scope="col">
                        <a href="{{route('department.edit', $department->id)}}">
                            {{$department->title}}
                        </a>
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($people as $person)
                <tr>
                    <th scope="row">
                        <a class="person" href="{{route('person.edit', $person->id)}}">
                            {{$person->first_name}}
                            {{$person->middle_name}}
                            {{$person->last_name}}
                        </a>
                    </th>
                    @foreach($departments as $department)
                        <td class="text-center">
                            {{--https://laravel.com/docs/5.6/collections#method-contains--}}
                            @if($person
                                ->departments
                                ->pluck('id')
                                ->contains($department->id))
                                <i class="material-icons md-36">done</i>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    @endisset
@endsection
