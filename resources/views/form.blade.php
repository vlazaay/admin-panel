@extends('adminlte::page')

@section('title', isset($position)? 'Update '.$position->name :'Create position')

@section('content_header')
    <h1 class="m-0 text-dark">Positions</h1>
@stop

@section('content')

    <form method="POST" name="form"
          @if(isset($position))
          action="{{route('positions.update', $position)}}"
          @else
          action="{{route('positions.store')}}"
          @endif
          class="mt-3">
        @csrf
        @isset($position)
            @method('PUT')
        @endisset
        <label for="position">Name</label>
        <input class="mb-4" type="text" name="name" value="{{isset($position)?$position->name : null}}"/>
        @isset($position)
            <div class="row">
                <p class="col-md-3" id="created_at"><span style="font-weight: bold;">Created at: </span>{{$position->created_at}}</p>
                <p class="col-md-3" id="admin_created_id "><span style="font-weight: bold;">Admin created id: </span>{{$position->admin_created_id }}</p>

            </div>
            <div class="row">
                <p class="col-md-3" id="updated_at"><span style="font-weight: bold;">Updated at: </span>{{$position->updated_at}}</p>
                <p class="col-md-3" id="admin_updated_id"><span style="font-weight: bold;">Admin updated id: </span>{{$position->admin_updated_id}}</p>

            </div>
        @endisset
        <div class="row mt-2">
{{--            <button type="submit" class="btn btn-primary">Cancel</button>--}}
            <a type="button" class="btn btn-light mt-2" href="{{route('positions.index')}}">Cancel</a>
            <button type="submit" class="btn btn-secondary  mt-2">Save</button>
        </div>

    </form>
@stop
