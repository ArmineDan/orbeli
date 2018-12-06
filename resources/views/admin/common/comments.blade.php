{{ session()->get('CommStatusMessage') }}
    @if(session()->get('CommStatusMessage') !== null)
      <div class="alert alert-success" style="margin-bottom:0px">
        <p class="lead">{{ session()->get('CommStatusMessage') }}</p>          
      </div>
    @endif

    @isset($comments)
    <hr>        
    <table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
      <h3 id="comments">Comments</h3>
      <thead>
        <th>DB_id</th>
        <th>name</th>
        <th>email</th>
        <th>comment</th>
        <th class="text-center">actions</th>
      </thead>
      <tbody>
      @foreach($comments as $key => $comment)
      
      
      <tr>
        {{-- change comment status --}}
        <form action="{{ route('admin.comment.savecommentstatus', $locale)}}" method="POST" id="{{$comment->c_email}}">            
          <input type="hidden" name="_token" value="{{csrf_token()}}" form="{{$comment->c_email}}">
          <td>{{ $comment->id}}</td>
          <td>{{ $comment->c_name }}</td>
          <td>{{ $comment->c_email }}</td>
          <td style="width:80%">
            <textarea name="body" id="body" rows="5" form="{{$comment->c_email}}" style="width:100%">
              {{ $comment->body }}
            </textarea>  
          </td>
          <td style="text-align:center; width:45%">
            {{-- $comment->approved --}}              
              <input type="checkbox" name="cBox_{{$comment->id}}" onchange="getStatusChangeValue(event)" form="{{$comment->c_email}}"
              @if ($comment->approved == 1)
                  checked
              @endif
              >
              <input type="text" id="cBox_{{$comment->id}}" name="comment[{{$comment->id}}]" value="{{$comment->approved}}" form="{{$comment->c_email}}" hidden>              
              <button type="submit" class="btn btn-default" form="{{$comment->c_email}}">Save Status</button>                            
            </form>

            {{-- delete comment form --}} 
            <form action="{{ route('admin.comment.destroy', [$comment->id, $locale]) }}" id="{{$comment->c_email . $comment->id}}" onsubmit="if(confirm('Delete ?')) { return true } else {return false}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}" form="{{$comment->c_email . $comment->id}}">
              <input type="hidden" name="_method" value="DELETE" form="{{$comment->c_email . $comment->id}}">
              <input type="hidden" name="comment_id" value="{{$comment->id}}" form="{{$comment->c_email . $comment->id}}">
                <button type="submit" class="btn btn-danger" style="width:102px;margin-left:22px">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>          
            </form>
          </td>       
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
    <hr style="margin-bottom:40px">          
    @endisset