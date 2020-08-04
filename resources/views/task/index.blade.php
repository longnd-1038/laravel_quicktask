@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">{{trans('task.new')}}</div>
            <div class="panel-body">
                @include('common.error')
                <form action="{{route('tasks.store')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="task-name">{{trans('task.task_name')}}</label><input type="text" name="name"
                                                                                             id="task-name"
                                                                                             class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i> {{trans('task.btn_add')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">{{trans('task.current')}}</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <th>{{trans('task.task_name')}}</th>
                    <th>&nbsp&nbsp{{trans('task.action_title')}}</th>
                    </thead>
                    @if ($tasks)
                        @foreach($tasks as $task)
                            <tr>
                                <td class="table">{{$task['name']}}</td>
                                <td>
                                    <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>{{trans('task.btn_delete')}}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        {!! $tasks->links() !!}
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
