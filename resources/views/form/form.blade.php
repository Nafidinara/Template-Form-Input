@extends('base')
@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        .file-input {
            display: inline-block;
            text-align: left;
            background: #dddddd;
            padding: 16px;
            position: relative;
            border-radius: 5px;
        }

        .file-input > [type='file'] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 10;
            cursor: pointer;
        }

        .file-input > .button {
            display: inline-block;
            cursor: pointer;
            background: #eee;
            padding: 8px 50px;
            border-radius: 2px;
            margin-right: 8px;
        }

        .file-input:hover > .button {
            background: dodgerblue;
            color: white;
        }

        .file-input > .label {
            color: #303030;
            white-space: nowrap;
            opacity: .3;
        }

        .file-input.-chosen > .label {
            opacity: 1;
        }
    </style>
    <div class="card" style="margin-top:5%; ">
        <h5 class="card-header">Form Input Dokumen</h5>
        <div class="card-body col" style="padding: 5%;">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form action="{{url('proses-input')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <label title="Ditandatangani oleh Kepala Kampung Induk dan Bamuskam, diketahui Kepala Distrik">Surat Permohonan</label>
                    <div class="file-input col">
                        <input type="file" name="surat_permohonan" required>
                        <span class="button">Choose</span>
                        <span class="label" data-js-label>No file selected</span>
                    </div>
                </div>

                <div class="mt-4">
                    <label>Surat Rekomendasi Bamuskam Kampung Induk</label>
                    <div class="file-input col">
                        <input type="file" name="surat_rekomendasi" required>
                        <span class="button">Choose</span>
                        <span class="label" data-js-label>No file selected</span>
                    </div>
                </div>

                <div class="mt-4">
                    <label>Batas-batas Wilayah</label>
                    <div class="file-input col">
                        <input type="file" name="batas_wilayah" required>
                        <span class="button">Choose</span>
                        <span class="label" data-js-label>No file selected</span>
                    </div>
                </div>

                <div class="mt-4">
                    <label title="Laki-laki dan perempuan minimal 100 jiwa">Jumlah Penduduk</label>
                    <div class="file-input col">
                        <input type="file" name="jml_penduduk" required>
                        <span class="button">Choose</span>
                        <span class="label" data-js-label>No file selected</span>
                    </div>
                </div>

                <div class="mt-4">
                    <label>Peta Wilayah Distrik</label>
                    <div class="file-input col">
                        <input type="file" name="peta_wilayah_distrik" required>
                        <span class="button">Choose</span>
                        <span class="label" data-js-label>No file selected</span>
                    </div>
                </div>

                <div class="mt-4">
                    <label>Peta Wilayah Kampung Induk dan Persiapan</label>
                    <div class="file-input col">
                        <input type="file" name="peta_wil_kampung" required>
                        <span class="button">Choose</span>
                        <span class="label" data-js-label>No file selected</span>
                    </div>
                </div>

                <div class="mt-4">
                    <label>Foto Kantor Kampung Persiapan</label>
                    <div class="file-input col">
                        <input type="file" name="foto_kantor" required>
                        <span class="button">Choose</span>
                        <span class="label" data-js-label>No file selected</span>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Kirim Dokumen</button>
                </div>

            </form>

        </div>
    </div>

    <script>
        var inputs = document.querySelectorAll('.file-input')

        for (var i = 0, len = inputs.length; i < len; i++) {
            customInput(inputs[i])
        }

        function customInput (el) {
            const fileInput = el.querySelector('[type="file"]')
            const label = el.querySelector('[data-js-label]')

            fileInput.onchange =
                fileInput.onmouseout = function () {
                    if (!fileInput.value) return

                    var value = fileInput.value.replace(/^.*[\\\/]/, '')
                    el.className += ' -chosen'
                    label.innerText = value
                }
        }
    </script>
    @endsection
