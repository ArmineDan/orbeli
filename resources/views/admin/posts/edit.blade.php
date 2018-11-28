@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h2>Edit Post <small>№ {{ $post->id }} <code>lang:{{$locale}}</code></small> </h2>

        {{-- @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @isset(session()->get( 'imgDebug' )['errors'])
        <div class="alert alert-danger">
            <ul>
            @foreach (session()->get( 'imgDebug' )['errors'] as $error)
            <li>{{ $error['message'] }}</li>
            @endforeach
            </ul>
        </div>
        @endisset
        @isset(session()->get( 'imgDebug' )['success'])
        <div class="alert alert-success">
            <ul class="list-group-item">
                @foreach (session()->get( 'imgDebug' )['success'] as $success)
                <li>{{ $success['path'] }}</li>
                @endforeach
            </ul>         
        </div>
        @endisset --}}
        @include('admin.common.imgMessages')

        <div class="row">
        <form action="{{ route('admin.document.uploadimage', $locale) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-3">    
                <input type="file" name="images[]" id="images" multiple="multiple" class="btn btn-default">
                <input type="text" hidden name="post_id" value="{{$post->id}}">
                <input type="text" hidden name="folder_name" id="" value="{{$folder_name}}">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success" style="margin-top:5px; width:130px">Upload Images</button>
            </div>     
        </form>
        </div>
        <hr>

        @isset($imageurls)
        <table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
        <thead>
            <th>url</th>
            <th>image</th>
            <th>size: kb</th>
        </thead>
        <tbody>     
        @foreach ($imageurls as $image)
        <tr>
            <td><span>{{$image['url']}}</span></td>
            <td><img src="{{$image['url']}}" alt="" width="120px"></td>
            <td><span>{{$image['size']}}</span></td>      
        </tr>
        @endforeach
        </tbody>
        </table>        
        @endisset


        <form action="{{ route('admin.post.update', [$post,$locale]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <input type="text" hidden name="lang_id" id="" value="{{$post['lang_id']}}">
            <input type="text" name="author_id" value="1" hidden>


            <div class="panel panel-info">
                <div class="panel-heading"><label for="post_typ">Category</label></div>
                <div class="panel-body">
                    <select name="post_typ" class="form-control" onchange="checkCategory()">
                            <option value="">Select Category</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if ($post['post_typ'] == $category['id'])
                                    selected="selected"
                                @endif
                                >                        
                                {{ $category->name }}
                            </option>
                        @empty
                            <option value="">Category is empty.</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <hr>        
        
            <label for="title">Title
                <span class="label label-default">max number of chars = 80</span>
            </label>
            <input type="text" name="title" class="form-control" value="{{ $post['title'] }}" maxlength="80">
            <hr>

            <label for="status">Status</label>
            <select name="status" class="form-control" >
                <option value="" style="display:none">Select Post status</option>
                <option value="published" @if($post->status =='published') selected @endif >Published</option>
                <option value="main" @if($post->status =='main') selected @endif >Main Post</option>
                <option value="not_published" @if($post->status == 'not_published') selected @endif>Not published</option>       
            </select>
            <hr>

            {{-- <label for="authors_id">Author</label>
            <select name="author_id" class="form-control">
                <option value="">Select Author</option>
                @forelse ($authors as $author)
                <option value="{{ $author->id }}"
                    @if ($post['author_id'] == $author['id'])
                        selected='selected'
                    @endif
                    >
                    {{ $author->name }} {{ $author->lastname }} 
                </option>
                @empty
                    <option value="">Please Insert One Author, then update the Post.</option>
                @endforelse
            </select>
            <hr> --}}

            <label>Authors</label><br>
            <select name="authors[]" class="form-control" id="ex-search-2" multiple>        
                @forelse ($authors as $author)
                <option value="{{ $author->id }}"
                    @foreach ($relAuthors as $rel)
                        @if ($author->id == $rel->pivot->author_id)
                            selected
                        @endif                    
                    @endforeach
                    > 
                    {{ $author->name }} {{ $author->lastname }} 
                </option>
                @empty
                <option value="">Please Insert One Author, then update the Video.</option>
                @endforelse        
            </select>
            <hr>

            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $post['date'] }}">
            <hr>
          
            <label for="post_short_text">Short Description
                <span class="label label-default">max number of chars = 100</span>
            </label>
            <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control">       
                {{ $post['short_text'] }}
            </textarea>
            <hr>

            <label for="post_long_text">Long Description
                <span class="label label-default">max number of chars = 300</span>
            </label><br>
            <span class="text text-info">only for "Economy"-category</span>
            <div id="long_text_wrap" style="display:none">
                <textarea name="long_text" id="post_long_text" cols="30" rows="10" class="form-control" placeholder="Input long description">       
                    {{ $post['long_text'] }}
                </textarea>
            </div>
            <hr>

            <label for="post_full_text">Full Content</label>
            <textarea name="html_code" id="post_full_text" cols="30" rows="10" class="form-control">       
                {{ $post['html_code'] }}
            </textarea>
            <hr>
          
            <label for="img">Main image 900x600: <code>/storage/post/14/clouds-picture.jpg</code></label>
            <input type="text" name="img" id="img" class="form-control" value="{{ $post['img']}}" >
            <hr>
          
            <label for="thumb_img">Croped image 450x600: <code>/storage/post/14/cropped-clouds-picture.jpg</code></label><br>
            <span class="text text-info">only for "Economy"-category</span>
            <div id="thumb_img_wrap" style="display:none">
                <input type="text" name="thumb_img" id="thumb_img" class="form-control" value="{{ $post['thumb_img'] }}" >
            </div>
            <hr>

            <label for="duration">Duration <code>minute</code>
                <span class="btn btn-danger" onclick="CountDuration()">count</span>
                <span style="margin-left:20px"> <span id="time_text"></span> <span id="time_words"></span> </span>
            </label>
              <input type="text" name="p_duratioan" id="duration" class="form-control" value="{{$post['p_duratioan']}}">
              <hr>

            {{-- <label for="" style="display:block">Post tags <kbd>without spaces</kbd></label>
            <p>{{$allTagsList}}</p>
            <input type="text" name="tags" class="form-control" value="{{ $postTagsList }}">
            <hr> --}}

            <label for="" style="display:block">Post tags</label>            
            <input type="text" name="new_tag" id="new_tag" value="">
            <span onclick="addPostNewTag(event)" id="add_tag_btn">Add</span><br>
            <select name="tags[]" id="ex-search-1" multiple="multiple">
                @if ($atags)
                    @for ($i = 0; $i < count($atags); $i++)
                        <option value="{{$atags[$i]}}"
                        @if (in_array($atags[$i], $ptags))
                            selected="selected"
                        @endif                    
                        >{{$atags[$i]}}</option>
                    @endfor
                @else
                <option value="">No tags in list. Please add new tags manually.</option>        
                @endif
            </select>
            <hr>

            <label for="">Viewed</label>
            <input type="text" name="view" value="{{ $post->view }}" class="form-control" readonly>
            <hr>

            <h4>Meta data</h4>
            <label for="meta_k">Meta keywords <kbd>without spaces</kbd></label>
            <input type="text" name="meta_k" class="form-control" value="{{ $post->meta_k }}">
            <label for="meta_d">Meta description</label>
            <input type="text" name="meta_d" class="form-control" value="{{ $post->meta_d }}">
            <hr>

            <label for="post_files">Post files</label>
            <div class="panel panel-default">
                <div class="panel-heading">
                    To manage Files and Comments, please, push here
                    <a href="{{route('admin.post.show',[$post, $locale])}}" class="btn btn-info" target="_blank">
                        Manage Files and Comments
                        <i class="glyphicon glyphicon-comment"></i>
                        <i class="glyphicon glyphicon-paperclip"></i>
                    </a>                    
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @forelse($docsObject as $key => $doc)
                        <li class="list-group-item">
                            {{$doc->link}}
                        </li>
                        @empty
                        <li class="list-group-item">
                            <mark>Current Post doesn't have attached files.</mark>
                        </li>                                                    
                        @endforelse
                    </ul>
                </div>
            </div>
            <hr>

            <div class="well">
                <button type="submit" class="btn btn-info" style="width:15%">Update</button>
            </div>
        </form>
    </div>
@endsection