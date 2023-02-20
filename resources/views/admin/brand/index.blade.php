@extends('layout.admin', ['title' => 'Brands'])

@section('content')
    <h1>Brands</h1>
    <a href="{{ route('admin.brand.create') }}" class="btn btn-primary mb-4">
        Create brand
    </a>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Describe</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($brands as $brand)
            <tr>
                <td>
                    <a href="{{ route('admin.brand.show', ['brand' => $brand->id]) }}">
                        {{ $brand->name }}
                    </a>
                </td>
                <td>{{ iconv_substr($brand->content, 0, 150) }}</td>
                <td>
                    <a href="{{ route('admin.brand.edit', ['brand' => $brand->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}"
                          method="post" onsubmit="return confirm('Delete brand')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                            <i class="far fa-trash-alt text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
