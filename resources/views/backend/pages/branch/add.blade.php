@extends('backend.mastering.master')

@section('content')

	<div class="row row-sm">
		<div class="col-md-6">
			<form action="{{route('branch.store')}}" method="post">
				@csrf
				<div class="form-group">
					<input type="text" name="name" class="form-control mt-3" placeholder="Enter branch name" value="{{ old('name') }}">
					<span class="text-danger">@error('name')
							{{ $message }}
							@enderror
					</span>	
				</div>
				<div class="form-group">
					<input type="text" name="manager" class="form-control mt-3" placeholder="Enter manager name" value="{{ old('manager') }}">
					<span class="text-danger">@error('manager')
							{{ $message }}
							@enderror
					</span>	
				</div>
				<div class="form-group">
					<input type="text" name="phone" class="form-control mt-3" placeholder="Enter phone number" value="{{ old('phone') }}">
					<span class="text-danger">@error('phone')
							{{ $message }}
							@enderror
					</span>	
				</div>
				<div class="form-group">
					<input type="text" name="email" class="form-control mt-3" placeholder="Enter branch email" value="{{ old('email') }}">
					<span class="text-danger">@error('email')
							{{ $message }}
							@enderror
					</span>	
				</div>
				<div class="form-group">
					<select name="status" id="" class="form-control mt-3">
						<option value="">--Select Status--</option>
						<option value="1" @if(old('status')==1) selected @endif>Active</option>
						<option value="2" @if(old('status')==2) selected @endif>Inactive</option>
					</select>
					<span class="text-danger">@error('status')
							{{ $message }}
							@enderror
					</span>	
				</div>
				<div class="form-group">
					<button class="form-control btn btn-primary mt-3" type="submit" name="submit">Add Branch</button>
				</div>
			</form>
		</div>
	</div>						

@endsection