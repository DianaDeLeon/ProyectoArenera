@extends('layouts.app', [
    'namePage' => 'Usuarios',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])


@section('template_title')
    User
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Usuarios</h2>
  </div>
<br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr class="table-title-row">
                                        <th>#</th>                               
										<th>Name</th>
										<th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>

                                            <td>
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
