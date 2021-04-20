@extends('layouts.indexLayout')
@section('content')

<!-- Page Title-->
<div class="page-title d-flex" aria-label="Page title" style="background-image: url({{asset('assets/img/page-title/shop-pattern.jpg')}});">
  <div class="container text-left align-self-center">
    <h1 class="page-title-heading">My Orders</h1>
  </div>
</div>
<!-- Page Content-->
<div class="container mb-4">
  <div class="row">
    @include('includes.accountSidebar')
    <!-- Orders Table-->
    <div class="col-lg-8 pb-5">
      <div class="d-flex justify-content-end pb-3">
        <div class="form-inline">
          <label class="text-muted mr-3" for="order-sort">Sort Orders</label>
          <select class="form-control" id="order-sort">
            <option>All</option>
            <option>Delivered</option>
            <option>In Progress</option>
            <option>Delayed</option>
            <option>Canceled</option>
          </select>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th>Pedido</th>
              <th>Fecha</th>
              <th>Status</th>
              <th>Envio</th>
              <th>Total</th>
              <th>Factura</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td><a class="navi-link" href="#order-details" data-toggle="modal">A-{{str_pad($order->id, 4, "0", STR_PAD_LEFT)}}</a></td>
              <td>{{substr($order->created_at, 0, 11)}}</td>
              @if($order->statu->name == 'En Proceso')
                <td><span class="badge badge-warning m-0">{{$order->statu->name}}</span></td>
              @elseif($order->statu->name == 'Cancelado')
                <td><span class="badge badge-danger m-0">{{$order->statu->name}}</span></td>
              @else
                <td><span class="badge badge-success m-0">{{$order->statu->name}}</span></td>
              @endif
              <td><span>{{$order->shippingCompany->name}}</span></td>
              <td><span>${{formatMoney($order->total)}}</span></td>
              <td><span><a href="/users/orders/{{$order->id}}/invoice">Ver Factura</a></span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection