<table class="table table-striped jambo_table bulk_action">
  <thead>
    <tr class="headings">
      <th class="column-title">User </th>
      <th class="column-title">Address </th>
      <th class="column-title">Payment Method </th>
      <th class="column-title">Status </th>
      <th class="column-title">Shipping Company </th>
      <th class="column-title">Tolal </th>
      <th class="column-title">Subtolal </th>
      <th class="column-title">Tax </th>

    </tr>
  </thead>

  <tbody>
    @foreach($orders as $order)
    <tr class="even pointer">
      <td class=" ">{{ $order->user->name }}</td>
      <td class=" ">{{ $order->address->first_name }}</td>
      <td class=" ">{{ $order->paymentMethod->name }}</td>
      <td class=" ">{{ $order->statu->name }}</td>
      <td class=" ">{{ $order->shippingCompany->name }}</td>
      <td class=" ">{{ $order->total }}</td>
      <td class=" ">{{ $order->subtotal }}</td>
      <td class=" ">{{ $order->tax }}</td>
      <td>
        <a href="/admin/orders/{{ $order->id }}">Edit</a>
        <a href="/admin/orders/{{ $order->id }}/delete">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <div class="modal-footer">
      <a href="/admin/orders/create">Crear Order</a>
    </div>