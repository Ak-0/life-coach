@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $goal->name }}</div>
                    <div class="panel-body">
                        {{ $goal->desc }}
                    </div>
                </div>

                {{-- Reasons Begin--}}
                <div class="panel panel-default">
                    <div class="panel-heading">Reasons</div>
                    <div class="panel-body">
                        @if (count($reasons) > 0)
                            <table class="table table-striped user-table">

{{--
                                <thead>
                                <th>No</th>
                                <th>description</th>
                                <th>&nbsp;</th>
                                </thead>
--}}
                                <tbody>
                                @foreach ($reasons as $reason)
                                    <tr>
                                        <td class="table-text"><div>{{ $reason->desc }}</div></td>
                                        <!-- user Delete Button -->
                                        <td>
                                            <form action="{{ url('reasons/'.$reason->id) . '/goal/' .$goal->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a href="{{ url('/reasons/create/goal/'.$goal->id) }}">Add a reason </a>

                        @else
                            There is no reasons yet. <a href="{{ url('/reasons/create/goal/'.$goal->id) }}">Add a reason! </a>
                        @endif
                    </div>
                </div>
                {{-- Reasons End  --}}

                {{-- Sub Goals Begin--}}
                <div class="panel panel-default">
                    <div class="panel-heading">Sub Goals</div>
                    <div class="panel-body">
                        @if (count($sub_goals) > 0)
                            <table class="table table-striped user-table">
                                <thead>
                                <th>name</th>
                                <th>description</th>
                                <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                @foreach ($sub_goals as $subgoal)
                                    <tr>
                                        <td class="table-text"><a href="{{ url('goals/'.$subgoal->id) }}"><div>{{ $subgoal->name }}</div></a></td>
                                        <td class="table-text"><a href="{{ url('goals/'.$subgoal->id) }}"><div>{{ $subgoal->desc }}</div></a></td>

                                        <!-- subgoal delete Button -->
                                        <td>
                                            <form action="{{ url('goals/'.$goal->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a href="{{ url('goal/create-sub/'.$goal->id) }}">Create a sub-goal </a>
                            <br>
                            or <a href="{{ url('goal/associate/select-sub/'.$goal->id) }}"> select from existing goals!</a>
                        @else
                            There is no sub-goals yet. <a href="{{ url('/goals/create') }}">Create a sub-goal </a>
                            <br>
                            or <a href="{{ url('goal/associate/select-sub/'.$goal->id) }}"> select from existing goals!</a>
                        @endif
                    </div>
                </div>

                {{-- Sub Goals End  --}}
            </div>
        </div>
    </div>
@endsection