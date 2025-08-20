<x-layouts.guest title="HERO">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($beritas as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->judul }}</td>
        <td>
          <button class="btn btn-danger" id="deleteBtn" data-id="{{ $item->id }}">Hapus</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <x-ui.delete-confirm />

  @push('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
          // // With Form
          //    $('#deleteBtn').click(function(e) {
          //        e.preventDefault();
          //        const id = $(this).data('id');
          //        $('#deleteForm').attr('action', '/cms/berita/' + id);
          //        $('#modalDelete').modal('show');
          //    });

          //    $('#buttonDelete').click(function() {
          //        $('#deleteForm').submit();
          //    });

                 // With AJAX
          let deleteItemId;
             $('#deleteBtn').click(function(e) {
                 e.preventDefault();
                 const id = $(this).data('id');
                 deleteItemId = id;
                 $('#modalDelete').modal('show');
             });

             $('#buttonDelete').click(function() {
                 $.ajax({
                     url: '/cms/berita/' + deleteItemId,
                     type: 'DELETE',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success: function(response) {
                         $('#modalDelete').modal('hide');
                         location.reload();
                     },
                     error: function(xhr, status, error) {
                         console.log(error);
                     }
                 });
             });
          });

      
  </script>
  @endpush
</x-layouts.guest>