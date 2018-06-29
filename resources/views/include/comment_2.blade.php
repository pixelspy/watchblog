{{--comments form--}}
@if(Auth::guest())
    <div class="row">
        <div id="comment-form" class="col-md-10">
            {{ Form::open(['route' => ['comments.store', $post->id, 'method' => 'POST']]) }}
                {{-- <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name', "Name:") }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-md-12">
                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                            {{-- <img src="/uploads/avatars/default.jpg" alt="efault Avatar"> --}}

                            {{Form::button(
                            '<img class="iconSmall" src="/img/bin.png" alt="deleting bin">',
                            ['type' => 'submit', 'class' => 'btnNoCss'] )
                            }}                             </div>
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
                <div class="col-md-2">
                    <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:32px; height: 32px; position:absolute; top:10px; left:10px; border-radius:50%;">
                    {{-- {{ Auth::user()->name }} --}}
                </div>
                <div class="col-md-10">
                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '1']) }}
                    {{Form::button(
                    '<img class="iconSmall" src="/img/bin.png" alt="deleting bin">',
                    ['type' => 'submit', 'class' => 'btnNoCss'] )
                    }}                             </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endif
