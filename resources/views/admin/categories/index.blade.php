@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    <h2>Category List</h2>
    
    <div class="table-responsive">
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary pull-right">
            Create Category
            <i class="fa fa-plus"></i>
          </a>
        <table class="table table-bordered table-striped table-hover">          
            <thead>
                <tr>
                    <th>Row</th>
                    <th>Title</th>
                    <th>Published At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
              @forelse ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at ??'no-date'}}</td>
                    <td class="text-center">
                      {{--['id'=>$category->id]--}}
                      <form action="{{ route('admin.category.destroy', $category) }}" onsubmit="if(confirm('Delete ?')) { return true } else {return false}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a class="cat-edit btn btn-default" href="{{ route('admin.category.edit', $category) }}">
                          <i class="glyphicon glyphicon-edit"></i>                        
                        </a>
                        <button type="submit" class="btn btn-danger">
                          <i class="glyphicon glyphicon-trash"></i>
                        </button>
                      </form>
                    </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4">
                    <h3>No data to show!</h3>
                  </td>
                </tr>
              @endforelse               
            </tbody>
            <tfoot>
              <tr class="text-center">
                <td colspan="4">
                    {{ $categories->links() }}
                </td>
              </tr>
            </tfoot>
        </table>
    </div>    
  </div>
@endsection