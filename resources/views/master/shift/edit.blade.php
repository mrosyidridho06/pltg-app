<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Shift</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{ route('shift.update', $shift->id) }}" method="POST" id="formAction">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="nama_shift" class="form-label">Nama Shift</label>
                        <input type="text" name="nama_shift" class="form-control" id="nama_shift" value="{{ $shift->nama_shift }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="shiftawal" class="form-label">Shift Awal</label>
                        <input type="time" name="shift_awal" class="form-control" id="shift_awal" value="{{ $shift->shift_awal }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="shiftakhir" class="form-label">Shift Akhir</label>
                        <input type="time" name="shift_akhir" class="form-control" id="shift_akhir" value="{{ $shift->shift_akhir }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
</div>
@push('js')
{{-- <script>
    $('body').on('click', '#btn-edit-shift', function(e){
        var id = $(this).data('id');

        alert('id isi' + id);
    });
</script> --}}
{{-- <script>
    //button create post event
    $('body').on('click', '#btn-edit-shift', function(e) {

        let shift_id = $(this).data('id');

        //fetch detail post with ajax
        $.ajax({
            url: `{{ url('master/shift/') }}/${shift_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#shift_id').val(response.data.shift_id);
                $('#nama_shift').val(response.data.nama_shift);
                $('#shift_awal').val(response.data.shift_awal);
                $('#shift_akhir').val(response.data.shift_akhir);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });

    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let post_id = $('#shift_id').val();
        let nama_shift = $('#nama_shift').val();
        let shift_awal = $('#shift_awal').val();
        let shift_akhir = $('#shift_akhir').val();
        let token   = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/master/shift/${shift_id}`,
            type: "PUT",
            cache: false,
            data: {
                "nama_shift": nama_shift,
                "shift_awal": shift_awal,
                "shift_akhir": shift_akhir,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.title}</td>
                        <td>${response.data.content}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-shift" data-id="${response.data.id}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" id="btn-delete-shift" data-id="${response.data.id}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                `;

                //append to post data
                $(`#index_${response.data.id}`).replaceWith(post);

                //close modal
                $('#modal-edit').modal('hide');


            },
            error:function(error){

                if(error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-title-edit').removeClass('d-none');
                    $('#alert-title-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-title-edit').html(error.responseJSON.title[0]);
                }

                if(error.responseJSON.content[0]) {

                    //show alert
                    $('#alert-content-edit').removeClass('d-none');
                    $('#alert-content-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-content-edit').html(error.responseJSON.content[0]);
                }

            }

        });

    });

</script> --}}
@endpush
