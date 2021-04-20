<table>
	<tr>
        @foreach($products as $product)
			<td>{{$product['id']}}</td>
			<td><a href="/olds/{{$product['id']}}/delete">delete</a></td>
		@endforeach
	</tr>
</table>
