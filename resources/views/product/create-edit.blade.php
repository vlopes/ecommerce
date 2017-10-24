@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($product))
            {{ html()->modelForm($product, 'PUT', route('products.update', ['product_id' => $product->id]))->open() }}
        @else
            {{ html()->form('POST', route('products.store'))->open() }}
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

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label('Marca', 'brand') }}
                                {{ html()->select('brand_id', [ 1 => 'Teste'])->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label('Categoria', 'category') }}
                                {{ html()->select('category', [ 1 => 'Teste'])->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label('Preço', 'price') }}
                                {{ html()->input('number', 'price')->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label('Preço original', 'original_price') }}
                                {{ html()->input('number', 'original_price')->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label('Descrição curta', 'short_description') }}
                                {{ html()->text('short_description')->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label('Descrição', 'description') }}
                                {{ html()->text('description')->class('form-control') }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label('Status', 'status') }}
                                {{ html()->text('status')->class('form-control') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
        {{ html()->form()->close() }}
    </div>
@endsection
