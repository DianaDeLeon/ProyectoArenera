@extends('layouts.app')

@section('template_title')
    Costumer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Costumer') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('costumers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <tr>
                                        <th>No</th>
                                        
										<th>First Name</th>
										<th>Last Name</th>
										<th>Phone Number</th>
										<th>Nit</th>
										<th>Adress</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($costumers as $costumer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $costumer->first_name }}</td>
											<td>{{ $costumer->last_name }}</td>
											<td>{{ $costumer->phone_number }}</td>
											<td>{{ $costumer->nit }}</td>
											<td>{{ $costumer->adress }}</td>
											<td>{{ $costumer->status }}</td>

                                            <td>
                                                <form action="{{ route('costumers.destroy',$costumer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('costumers.show',$costumer->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('costumers.edit',$costumer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $costumers->links() !!}
            </div>
        </div>
    </div>
@endsection
