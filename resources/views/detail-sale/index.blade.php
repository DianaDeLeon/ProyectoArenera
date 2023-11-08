@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    Detail Sale
@endsection

@section('content')
<br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detail Sale') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detail_sales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Sale</th>
										<th>Id Product</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Subtotal</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailSales as $detailSale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detailSale->id_sale }}</td>
											<td>{{ $detailSale->id_product }}</td>
											<td>{{ $detailSale->price }}</td>
											<td>{{ $detailSale->quantity }}</td>
											<td>{{ $detailSale->subtotal }}</td>

                                            <td>
                                                <form action="{{ route('detail_sales.destroy',$detailSale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detail_sales.show',$detailSale->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detail_sales.edit',$detailSale->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $detailSales->links() !!}
            </div>
        </div>
    </div>
@endsection
