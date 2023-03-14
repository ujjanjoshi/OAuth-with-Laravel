@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Clients') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    List of Client
                        @foreach ($clients as $client )
                            <h3>{{$client->name}}</h3>
                            <p>{{$client->redirect}}</p>
                            @endforeach
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
                <div class="card-body">
                    <form action="/oauth/clients" method="Post">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
                       </div>
                        <div class="form-group">
                          <label for="redirect url">Redirect uri</label>
                          <input type="text" class="form-control"  name="redirect uri" id="redirect url" placeholder="uri">
                        </div><br/>
                        @csrf
                        <button type="submit" class="btn btn-primary">Create Client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
