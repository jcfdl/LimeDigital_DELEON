<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Edit Profile: {{ $user->name }}</h4>
	</div>
	<div class="col-md-12"> 
		<div class="widget p-lg">
			<div class="row"> 
				@if(Session::has('profile_success'))
					<div class="alert alert-success" role="alert">
						<strong>Success!</strong> {{session('profile_success')}}
					</div>
				@elseif(Session::has('profile_fail'))
					<div class="alert alert-danger" role="alert">
						<strong>Warning!</strong> {{session('profile_fail')}}
					</div>
				@endif
				{!! Form::model($user, ['route' => 'admin.saveProfile', 'method' => 'post', 'class'=>'form-page', 'files'=>true]) !!}
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i>
							Save
						</button>
						<a href="#" class="show-page btn btn-danger" data-page="category">
							<i class="fa fa-times"></i>
							Cancel
						</a>
					</div>					
					<div class="col-md-3">	
						<img src="{{ $user->media ? $user->media->name : 'http://place-hold.it/283x283' }}" class="mx-auto img-fluid mb-1">						
						{{ Form::file('media', ['class'=>'form-control mb-1'])}}						
            <small class="form-text text-muted">Reminder: Profile image should have a dimension of 283x283 pixels only and only accepts JPEG images or PNG images.</small>	
					</div>
					<div class="col-md-9">
						<label>Name:</label>
						{!! Form::text('name', null, ['class'=>'form-control mb-1', 'required', 'placeholder'=>'Name']) !!}
						<label>Email:</label>
						{!! Form::text('', $user->email, ['class'=>'form-control mb-1', 'disabled']) !!}
						<label>Password:</label>
						{!! Form::password('password', ['class'=>'form-control']) !!}
						{!! Form::hidden('update', $user->id) !!}
					</div>								
				{!! Form::close() !!}				
			</div>
		</div>
	</div>
</div>