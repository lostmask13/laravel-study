@extends('layout.admin', ['title' => 'Items'])

@section('content')
    <h1>Items</h1>
    <ul>

    </ul>
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-4">
        Create item
    </a>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>
                <a href="{{ route('admin.product.show', ['product' => $product->id]) }}">
                    {{ $product->name }}
                </a>
            </td>
            <td>{{ iconv_substr($product->content, 0, 150) }}</td>
            <td>
                <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                      method="post" onsubmit="return confirm('Удалить этот товар?')">
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
    {{ $products->links() }}
@endsection
