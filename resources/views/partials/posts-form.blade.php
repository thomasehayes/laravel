    {!! csrf_field() !!} 
    <!-- This protects from cross-site request forgery -->
	
    <div class="form-group">
		<label for="title">Post's Title</label>
		<input 
            type="text" 
            id="title" 
            name="title" 
            class="form-control" 
            value="{{old('title')}}"
        >
        @if ($errors->has('title'))
            {{ $errors->first('title') }}
        @endif
	</div>

	<div class="form-group">
		<label for="content">Write whatever you want here</label>
		<textarea 
            type="text" 
            id="content" 
            name="content" 
            class="form-control" 
            value="{{old('content')}}"
        >
        </textarea>
	</div>

	<div class="form-group">
		<label for="url">Put your URL here</label>
		<input 
            type="text" 
            id="url" 
            name="url" 
            class="form-control" 
            value="{{old('url')}}"
        >
        @if ($errors->has('url'))
            {{$errors->first('url')}}
        @endif
	</div>