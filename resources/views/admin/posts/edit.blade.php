@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h3>Edit Post № <mark>{{ $post['id'] }}</mark></h3>
        @if(count($errors) > 0) 
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.post.update', [$post,$locale]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}
        
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post['title'] }}">
            <hr>
          
            <label for="post_short_text">Short Description</label>
            <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control">       
                {{ $post['short_text'] }}
            </textarea>
            <hr>
            <label for="post_html_code">Full Description</label>
            <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control">       
                {{ $post['html_code'] }}
            </textarea>
            <hr>
          
            <label for="img">Main image url 900x600: <code>photos/1/posts/image_name.jpg</code></label>
            <input type="text" name="img" id="img" class="form-control" value="{{ $post['img']}}" required>
            <hr>
          
            <label for="thumb_img">Croped thumb url 450x600: <code>photos/1/posts<mark>/thumbs/</mark>imahe_name.jpg</code></label>
            <input type="text" name="thumb_img" id="thumb_img" class="form-control" value="{{ $post['thumb_img'] }}" required>
            <hr>

            <label for="post_files">Post files:
                <code>files/1/posts/file_name.pdf,files/1/posts/file_name.epub</code>
            </label>
            @forelse($docsObject as $key => $doc)
                <input type="text" name="files[{{$doc->id}}]" id="" class="form-control" value="{{$doc->link}}">
            @empty
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Post doesn't have files.
                    <small>separate files by comma</small>
                </div>
                <div class="panel-body">
                    <input type="text" name="new_files" id="" class="form-control" value="" placeholder="Add new files, separated by comma">
                </div>
            </div>
            @endforelse        
            <hr>

            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $post['date'] }}">
            <hr>

            <label for="status">Status</label>
            <select name="status" class="form-control" >
                <option value="" style="display:none">Select Post status</option>
                <option value="published" @if($post->status =='published') selected @endif >Published</option>
                <option value="main" @if($post->status =='main') selected @endif >Main Post</option>
                <option value="not_published" @if($post->status == 'not_published') selected @endif>Not published</option>       
            </select>
            <hr>

            <label for="authors_id">Author</label>
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
            <hr>

            <label for="post_typ">Category</label>
            <select name="post_typ" class="form-control">
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
            <hr>


            <label for="" style="display:block">Post tags <kbd>without spaces</kbd></label>
            <p>{{$allTagsList}}</p>
            <input type="text" name="tags" class="form-control" value="{{ $postTagsList }}">
            <hr>

            <label for="">Viewed</label>
            <input type="text" name="view" value="{{ $post->view }}" class="form-control">
            <hr>

            <h4>Meta data</h4>
            <label for="meta_k">Meta keywords <kbd>without spaces</kbd></label>
            <input type="text" name="meta_k" class="form-control" value="{{ $post->meta_k }}">
            <label for="meta_d">Meta description</label>
            <input type="text" name="meta_d" class="form-control" value="{{ $post->meta_d }}">
            <hr>

            <button type="submit">Update</button>
        </form>
    </div>
@endsection