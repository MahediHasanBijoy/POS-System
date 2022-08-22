@extends('backend.mastering.master')

@section('content')

	<div class="row row-sm">
		<div class="col-md-6">
			<form action="{{route('branch.update', $branch->id)}}" method="post">
				@csrf
				<div class="form-group">
					<input type="text" name="name" class="form-control mt-3" placeholder="Enter branch name" value="{{$branch->name}}">
				</div>
				<div class="form-group">
					<input type="text" name="manager" class="form-control mt-3" placeholder="Enter manager name" value="{{ $branch->manager }}">
				</div>
				<div class="form-group">
					<input type="text" name="phone" class="form-control mt-3" placeholder="Enter phone number" value="{{ $branch->phone }}">
				</div>
				<div class="form-group">
					<input type="text" name="email" class="form-control mt-3" placeholder="Enter branch email" value="{{ $branch->email }}">	
				</div>
				<div class="form-group">
					<select name="status" id="" class="form-control mt-3">
						<option value="">--Select Status--</option>
						<option value="1" @if($branch->status ==1) selected @endif>Active</option>
						<option value="2" @if($branch->status ==2) selected @endif>Inactive</option>
					</select>
				</div>
				<div class="form-group">
					<button class="form-control btn btn-primary mt-3" type="submit" name="submit">Update Branch</button>
				</div>
			</form>
		</div>
	</div>						

@endsection