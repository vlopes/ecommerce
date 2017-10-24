@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Brands</h3>

                <table>
                    @foreach($brands as $brand)
                        <tr>
                            <td>
                                <a href="{{ route('brands.show', ['brand_id' => $brand->id]) }}"> {{ $brand->name }}<a>
                            </td>
                            <td>
                                <a href="{{ route('brands.destroy', ['brand_id' => $brand->id]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
