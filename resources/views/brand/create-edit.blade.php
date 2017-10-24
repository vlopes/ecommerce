@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($brand))
            {{ html()->modelForm($brand, 'PUT', route('brands.update', ['brand_id' => $brand->id]))->open() }}
        @else
            {{ html()->form('POST', route('brands.store'))->open() }}
        @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label('Nome', 'name') }}
                                {{ html()->text('name')->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label('Url', 'url') }}
                                {{ html()->text('url')->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label('Path', 'path') }}
                                {{ html()->text('path')->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label('Ativo', 'active') }}
                                {{ html()->select('active', [0 => 'Não', 1 => 'Sim'])->class('form-control') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('brands.index') }}" class="btn btn-default">Cancel</a>
        {{ html()->form()->close() }}
    </div>
@endsection
