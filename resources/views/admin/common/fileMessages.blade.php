@isset(session()->get( 'flDebug' )['errors'])
<div class="alert alert-danger">
  <ul>
    @foreach (session()->get( 'flDebug' )['errors'] as $error)
    <li>{{ $error['message'] }}</li>
    @endforeach
  </ul>
</div>
@endisset
@isset(session()->get( 'flDebug' )['success'])
<div class="alert alert-success">
    <ul class="list-group-item">
      @foreach (session()->get( 'flDebug' )['success'] as $success)
      <li>{{ $success['path'] }}</li>
      @endforeach
    </ul>          
</div>
@endisset

{{-- @isset($fileurls)
<table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
  <thead>
    <th>url</th>
    <th>file</th>
    <th>size: kb</th>
  </thead>
  <tbody>     
  @for ($i = 0; $i < count($fileurls); $i++)
  <tr>
    <td><span>{{$fileurls[$i]['url']}}</span></td>
    <td><a href="{{$fileurls[$i]['url']}}" target="_blank">{{$fileurls[$i]['url']}}</a></td>
    <td><span>{{$fileurls[$i]['size']}}</span></td>      
  </tr>
  @endfor
</tbody>
</table>        
@endisset --}}


@if (session()->get('docStatusMessage') !== null)
<div class="alert alert-success" style="margin-bottom:0px">
  <p class="lead">{{ session()->get('docStatusMessage') }}</p>          
</div>
@endif