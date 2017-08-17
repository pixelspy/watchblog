
@extends('layouts.blog')

@section('content')
    <h1>Search</h1>
    <hr>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Info</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search">
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Info1</th>
                            <th>Info2</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection