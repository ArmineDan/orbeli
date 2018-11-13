{{ session()->get('CommStatusMessage') }}
    @if(session()->get('CommStatusMessage') !== null)
      <div class="alert alert-success" style="margin-bottom:0px">
        <p class="lead">{{ session()->get('CommStatusMessage') }}</p>          
      </div>
    @endif

    @isset($comments)
    <hr>        
    <table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
      <h4>Comments</h4>
      <thead>
        <th>DB_id</th>
        <th>name</th>
        <th>email</th>
        <th>comment</th>
        <th>approved</th>
      </thead>
      <tbody>
      @foreach($comments as $key => $comment)
      
      
      <tr>
        <form action="{{ route('admin.comment.savecommentstatus', $locale)}}" method="POST" id="{{$comment->c_email}}">            
          <input type="hidden" name="_token" value="{{csrf_token()}}" form="{{$comment->c_email}}">
          <td>{{ $comment->id}}</td>
          <td>{{ $comment->c_name }}</td>
          <td>{{ $comment->c_email }}</td>
          <td>
            <textarea name="body" id="body" cols="100" rows="5" form="{{$comment->c_email}}">{{ $comment->body }}</textarea>  
          </td>
          <td style="text-align:center">
            {{-- $comment->approved --}}              
              <input type="checkbox" name="cBox_{{$comment->id}}" onchange="getStatusChangeValue(event)" form="{{$comment->c_email}}"
              @if ($comment->approved == 1)
                  checked
              @endif
              >
              <input type="text" id="cBox_{{$comment->id}}" name="comment[{{$comment->id}}]" value="{{$comment->approved}}" form="{{$comment->c_email}}" hidden>
              
              
              <button type="submit" class="btn btn-default" form="{{$comment->c_email}}">Save</button>                            
          </td>
        </form>
      </tr>
      
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5" class="text-center">            
          -- commecnts --
        </td>                
      </tr>            
    </tfoot>
    </table>                  
    @endisset