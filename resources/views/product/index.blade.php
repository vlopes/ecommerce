@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Products</h3>

                <table>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <a href="{{ route('products.show', ['product_id' => $product->id]) }}"> {{ $product->name }}<a>
                            </td>
                            <td>
                                <a href="{{ route('products.destroy', ['product_id' => $product->id]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
