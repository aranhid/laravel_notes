<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
            value="@if(isset($note)){{$note->title}}@else{{session('title', '')}}@endif"
            autocomplete="title" autofocus>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>

    <div class="col-md-6">
        <textarea id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text"
            autocomplete="text">@if(isset($note)){{$note->text}}@else{{session('text', '')}}@endif</textarea>

        @error('text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
