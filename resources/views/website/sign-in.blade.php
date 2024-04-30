@extends('website.layout')
@section('content')

    <div class="user-form-area ptb-100">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="form-item">
                        <form action="{{ route('sign-in-attempt') }}" method="post">
                            @csrf
                            <h2>Sign In</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="user_name" class="form-control"
                                            placeholder="Email/Username">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn common-btn" style="width:100%;">
                                        Sign In
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
