@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar mi imagen</div>
                <div class="card-body">
            	    <form method="post" enctype="multipart/form-data" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-7">
		                         @if($image->user->image)
		                         <div class="container-avatar"> 
		                            <img src="{{route('user.avatar',['filename'=>$image->user->image]) }}" class="avatar" />
		                        </div>
		                        @endif

                                <input id="image_path" type="file" name="image_path" class="form-control {{$errors->first('image_path') ? 'is-invalid' : ''}}" required>
                                @if($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                          <strong>{{ $errors->first('image_path') }}</strong>  
                                    </span> 
                                @endif 

                            </div>       
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">Descripcion</label>
                            <div class="col-md-7">
                                <textarea id="description"  name="description" class="form-control {{$errors->first('description') ? 'is-invalid' : ''}}" required>{{$image->description}}</textarea>
                                @if($errors->has('description'))
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                          <strong>{{ $errors->first('description') }}</strong>  
                                    </span> 
                                @endif 

                            </div>       
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Editar Imagen">
                            </div>       
                        </div>  

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection