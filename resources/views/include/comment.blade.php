{{--comments form--}}
    @if(Auth::guest())
        <div class="row">
            <div id="comment-form" class="col-md-10">
                {{ Form::open(['route' => ['comments.store', $post->id, 'method' => 'POST']]) }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('name', "Name:") }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::text('email', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                                {{ Form::label('comment', "Comment:") }}
                                {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                                {{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block']) }}
                            </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        @endif

        @if(Auth::user())
    <div class="row">
        <div id="comment-form" class="col-md-10">
            {{ Form::open(['route' => ['comments.store', $post->id, 'method' => 'POST']]) }}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', "Name:") }}
                    {{ Form::text('name', Auth::user()->name, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', Auth::user()->email, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('comment', "Comment:") }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                    {{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endif
