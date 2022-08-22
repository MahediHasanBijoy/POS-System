{{-- custom template for using in my pages --}}

@extends('backend.mastering.master')

@section('content')

	{{-- custom content will go here --}}

			<table class="table bg-white rounded">
				<thead>
					<tr>
						<th>Sl#</th>
						<th>Branch Name</th>
						<th>Manager Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
						$sl = 1;
					@endphp
					@foreach($branches as $branch)
					<tr>
						<td>{{$sl}}</td>
						<td>{{$branch->name}}</td>
						<td>{{$branch->manager}}</td>
						<td>{{$branch->phone}}</td>
						<td>{{$branch->email}}</td>
						@if ($branch->status == 1)
							<td><a href="#" class="btn btn-info btn-sm">Active</a></td>
						@else
							<td><a href="#" class="btn btn-secondary btn-sm">Inactive</a></td>
						@endif
						<td>
							<a href="{{ route('branch.edit', $branch->id) }}" class="btn btn-info btn-sm">Edit</a>
							<a href="{{ route('branch.destroy', $branch->id) }}" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
					@php
						$sl++;
					@endphp
					@endforeach
				</tbody>
			</table>

	
@endsection