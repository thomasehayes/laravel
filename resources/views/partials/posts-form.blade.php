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
	</div>

	<div class="form-group">
		<label for="content">Write whatever you want here</label>
		<input 
            type="text" 
            id="content" 
            name="content" 
            class="form-control" 
            value="{{old('content')}}"
        >
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
	</div>