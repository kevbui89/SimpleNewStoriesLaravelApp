@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Display this panel only if the user is authenticated -->
            @if (Auth::check())
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Story
                    </div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Story Form -->
                        <form action="/home" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Story Title -->
                            <div class="form-group">
                                <label for="story-title" class="col-sm-3 control-label">Title</label>

                                <div class="col-sm-6">
                                    <input type="text" name="title" id="story-title" class="form-control" value="{{ old('title') }}">
                                </div>
                            </div>
                            <!-- Story Post -->
                            <div class="form-group">
                                <label for="story-post" class="col-sm-3 control-label">Post</label>

                                <div class="col-sm-6">
                                    <input type="text" name="post" id="story-post" class="form-control" value="{{ old('post') }}">
                                </div>
                            </div>

                            <!-- Add a new Story Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Add new story
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        <!-- Current stories with pagination-->
            @if (count($stories) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current stories
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Top news stories</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($stories as $story)
                                <tr>
                                    <td class="table-text"><strong>{{ $story->title }}</strong>
                                        {{ $story->post }}</td>
                                @if (Auth::check() &&
                                         $story->userCanEdit(Auth::user()))
                                    <!-- Story Delete Button -->
                                        <td>
                                            <form action="/home/{{ $story->id }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}


                                                <button type="submit" id="delete-story-{{ $story->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $stories->render() !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
