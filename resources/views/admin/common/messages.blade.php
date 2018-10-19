<!-- resources/views/admin/common/messages.blade.php -->

@if (count($errors) > 0)
  <!-- Список ошибок формы -->
  <div class="alert alert-danger">
    <h4>Error:</h4>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

{{-- @if (session('success'))
    <div class="alert alert-success">
      {{ $success_message }}
    </div>
@endif --}}