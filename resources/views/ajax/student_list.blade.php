@foreach($students as $value)
<tr id="{{ $value->id }}">
	 {{ csrf_field() }}
	<td>{{ $value->id }}</td>
	<td>{{ $value->name }}</td>
	<td>{{ $value->slug }}</td>
	<td>{{ $value->gender }}</td>
	<td>
		<a  class="btn btn-info btn-xs" id="view" data-id='{{ $value->id }}'>View</a>
		<a  class="btn btn-success btn-xs" id="edit" data-id='{{ $value->id }}'>Edit</a>
		<a class="btn btn-danger btn-xs" id='delete' data-id='{{ $value->id }}'>Delete</a>
	</td>
</tr>
@endforeach