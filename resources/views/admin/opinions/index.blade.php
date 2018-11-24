@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h3>Opinion List <small><code> lang:{{$locale}}</code><small></h3>

    <div class="table-responsive">
        <a href="{{ route('admin.opinion.create', $locale) }}" class="btn btn-primary pull-right">
          Create Opinion
          <i class="fa fa-plus"></i>
        </a>
        <table class="table table-bordered table-striped table-hover">          
            <thead>
                <tr>
                    <th>Row</th>
                    <th>Title</th>
                    <th>Viewed</th>
                    <th>Duration</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody style="font-weight:600; font-size:13px">
              @forelse ($opinions as $opinion)           
                <tr>
                    <td>{{$opinion->id}}</td>
                    <td>{{$opinion->title}}</td>
                    <td>{{$opinion->view}}</td>
                    <td>{{$opinion->o_duration}}</td>
                    <td>{{$opinion->date ??'no-date'}}</td>
                    
                    @if ($opinion->status == 'not_published')
                    <td class="alert alert-danger">{{$opinion->status}}</td>
                    @else
                    <td>{{$opinion->status}}</td>
                    @endif                  
                    <td class="text-center" style="min-width:15%">
                      {{--['id'=>$category->id]--}}
                      <form action="{{ route('admin.opinion.destroy', [$opinion, $locale]) }}" onsubmit="if(confirm('Delete ?')) { return true } else {return false}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="btn-group">
                          <a class="btn btn-default" href="{{ route('admin.opinion.edit',[$opinion, $locale]) }}">
                            <i class="glyphicon glyphicon-edit"></i>                        
                          </a>
                          <a class="btn btn-info" href="{{route('admin.opinion.show', [$opinion, $locale])}}">                          
                              <i class="glyphicon glyphicon-comment"></i>
                              <i class="glyphicon glyphicon-paperclip"></i>
                          </a>
                          <button type="submit" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                          </button>
                        </div>
                      </form>
                    </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5">
                    <h3>No data to show!</h3>
                  </td>
                </tr>
              @endforelse               
            </tbody>
            <tfoot>
              <tr class="text-center">
                <td colspan="5">
                    {{ $opinions->links() }}
                </td>
              </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection