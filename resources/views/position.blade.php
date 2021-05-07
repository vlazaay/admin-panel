{{-- Setup data for datatables --}}
@php
        $heads = [
            'Name',
            'Last update',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
        $i = 0;
        $config['data'] = [];
        foreach ($positions as $v){
            $config['data'][$i] = [$v->name, $v->updated_at, '<nobr>
            <form method="POST" action="'.route('positions.destroy', $v).'">
            <a href="'.route('positions.edit', $v).'"class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>
            <input type="hidden" name="_token" value="'.csrf_token().'" />
            <input type="hidden" name="_method" value="delete" />
            <button class="btn btn-danger type="submit">Delete</button>
            </form>
            </nobr>'];
            $i++;
        }
        $config['order'] = [1, 'asc'];
        $config['columns'] = [null, null, ['orderable' => false]];
@endphp
@extends('adminlte::page')

@section('title', 'admin-panel')

@section('content_header')
    <div class="row">
        <h1 class="text-dark col-md-11">Positions</h1>
        <a href="{{route('positions.create')}}" class="col-md-offset-4 btn btn-secondary mb-3 btn text-right">Add position</a>
    </div>

@stop

@section('content')


    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="light" :config="$config"
                          striped hoverable bordered compressed/>

{{--    <x-adminlte-modal id="modalRemoveposition" title="Remove position" theme="purple"--}}
{{--                      icon="fas fa-bolt" size='lg' disable-animations>--}}
{{--        Are you sure you want to remove position--}}
{{--        <p></p>--}}
{{--        <x-slot name="footerSlot">--}}
{{--            <a type="button" class="btn btn-danger mt-2" href="">Cancel</a>--}}
{{--            <a type="button" class="btn btn-light mt-2" href="{{route('positions.index')}}">Cancel</a>--}}
{{--        </x-slot>--}}
{{--    </x-adminlte-modal>--}}
@stop

