@csrf
<div class="card card-round">
    <div class="card-header">
        <div class="card-head-row card-tools-still-right">
            <div class="card-title">{{ isset($budget) ? 'Edit' : 'Tambah' }} Anggaran</div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-6 col-lg-12">
            {{-- Tanggal --}}
            <div class="form-group">
                <label for="tanggal_anggaran">Tanggal Anggaran</label>
                <input type="date" class="form-control" id="tanggal_anggaran" name="tanggal_anggaran"
                    value="{{ old('tanggal_anggaran', $budget->tanggal_anggaran ?? '') }}" required>
            </div>

            {{-- Judul --}}
            <div class="form-group">
                <label for="judul">Kegiatan</label>
                <select class="form-select" id="judul" name="judul">
                    <option value="">Pilih Kegiatan</option>
                    @foreach ($judulList as $judulItem)
                        <option value="{{ $judulItem }}"
                            {{ old('judul', $budget->judul ?? '') == $judulItem ? 'selected' : '' }}>{{ $judulItem }}
                        </option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="judul_baru" name="judul_baru"
                    value="{{ old('judul_baru', $budget->judul_baru ?? '') }}"
                    placeholder="Atau tambahkan kegiatan baru">
            </div>

            {{-- Sub Judul --}}
            <div class="form-group">
                <label for="sub_judul">Sub Kegiatan</label>
                <select class="form-select" id="sub_judul" name="sub_judul">
                    <option value="">Pilih Sub Kegiatan</option>
                    @foreach ($subJudulList as $subJudulItem)
                        <option value="{{ $subJudulItem }}"
                            {{ old('sub_judul', $budget->sub_judul ?? '') == $subJudulItem ? 'selected' : '' }}>
                            {{ $subJudulItem }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="sub_judul_baru" name="sub_judul_baru"
                    value="{{ old('sub_judul_baru', $budget->sub_judul_baru ?? '') }}"
                    placeholder="Atau tambahkan sub kegiatan baru">
            </div>

            {{-- Sub Sub Judul --}}
            <div class="form-group">
                <label for="sub_sub_judul">Sub Sub Kegiatan</label>
                <select class="form-select" id="sub_sub_judul" name="sub_sub_judul">
                    <option value="">Pilih Sub Sub Kegiatan</option>
                    @foreach ($subSubJudulList as $subSubJudulItem)
                        <option value="{{ $subSubJudulItem }}"
                            {{ old('sub_sub_judul', $budget->sub_sub_judul ?? '') == $subSubJudulItem ? 'selected' : '' }}>
                            {{ $subSubJudulItem }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="sub_sub_judul_baru" name="sub_sub_judul_baru"
                    value="{{ old('sub_sub_judul_baru', $budget->sub_sub_judul_baru ?? '') }}"
                    placeholder="Atau tambahkan sub sub kegiatan baru">
            </div>

            {{-- Uraian --}}
            <div class="form-group">
                <label for="uraian">Uraian</label>
                <select class="form-select" id="uraian" name="uraian">
                    <option value="">Pilih Uraian</option>
                    @foreach ($uraianList as $uraianItem)
                        <option value="{{ $uraianItem }}"
                            {{ old('uraian', $budget->uraian ?? '') == $uraianItem ? 'selected' : '' }}>
                            {{ $uraianItem }}</option>
                    @endforeach
                </select>
                <textarea class="form-control mt-2" id="uraian_baru" name="uraian_baru" placeholder="Atau tambahkan uraian baru">{{ old('uraian_baru', $budget->uraian_baru ?? '') }}</textarea>
            </div>

            {{-- Pejabat / Penanggung Jawab --}}
            <div class="form-group">
                <label for="pejabat_penanggung_jawab">Pejabat / Penanggung Jawab</label>
                <textarea class="form-control" id="pejabat_penanggung_jawab" name="pejabat_penanggung_jawab">{{ old('pejabat_penanggung_jawab', $budget->pejabat_penanggung_jawab ?? '') }}</textarea>
            </div>

            {{-- Waktu Pelaksanaan --}}
            <div class="form-group">
                <label for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
                <input type="time" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan"
                    value="{{ old('waktu_pelaksanaan', $budget->waktu_pelaksanaan ?? '') }}">
            </div>

            {{-- Volume --}}
            <div class="form-group">
                <label for="volume">Volume</label>
                <input type="number" step="0.01" class="form-control" id="volume" name="volume"
                    value="{{ old('volume', $budget->volume ?? '') }}">
            </div>

            {{-- Satuan --}}
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <select class="form-select" id="satuan" name="satuan">
                    <option value="">Pilih Satuan</option>
                    @foreach ($satuanList as $satuanItem)
                        <option value="{{ $satuanItem }}"
                            {{ old('satuan', $budget->satuan ?? '') == $satuanItem ? 'selected' : '' }}>
                            {{ $satuanItem }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="satuan_baru" name="satuan_baru"
                    value="{{ old('satuan_baru', $budget->satuan_baru ?? '') }}"
                    placeholder="Atau tambahkan satuan baru">
            </div>

            {{-- Harga Satuan --}}
            <div class="form-group">
                <label for="harga_satuan">Harga Satuan</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" step="0.01" class="form-control" id="harga_satuan" name="harga_satuan"
                        value="{{ old('harga_satuan', $budget->harga_satuan ?? '') }}" />
                </div>
            </div>

            {{-- Jumlah --}}
            <div class="form-group">
                <label for="jumlah_anggaran">Jumlah Anggaran</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" class="form-control" id="jumlah_anggaran" readonly
                        value="{{ old('jumlah_anggaran', $budget->jumlah_anggaran ?? '') }}" />
                </div>
            </div>

            {{-- Rencana Realisasi --}}
            <h6 class="fw-bold mt-2">Rencana Realisasi</h6>
            <div class="form-group">
                <label for="volume_nominal_rr">Volume / Nominal</label>
                <input type="number" step="0.01" class="form-control" id="volume_nominal_rr"
                    name="volume_nominal_rr"
                    value="{{ old('volume_nominal_rr', $budget->volume_nominal_rr ?? '') }}">
            </div>
            <div class="form-group">
                <label for="satuan_rr">Satuan</label>
                <select class="form-select" id="satuan_rr" name="satuan_rr">
                    <option value="">Pilih Satuan</option>
                    @foreach ($satuan_rrList as $satuan_rr)
                        <option value="{{ $satuan_rr }}"
                            {{ old('satuan_rr', $budget->satuan_rr ?? '') == $satuan_rr ? 'selected' : '' }}>
                            {{ $satuan_rr }}
                        </option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="satuan_rr_baru" name="satuan_rr_baru"
                    value="{{ old('satuan_rr_baru', $budget->satuan_rr_baru ?? '') }}"
                    placeholder="Atau tambahkan satuan baru">
            </div>
            <div class="form-group">
                <label for="fisik_rr">Fisik</label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control" id="fisik_rr" name="fisik_rr"
                        value="{{ old('fisik_rr', $budget->fisik_rr ?? '') }}">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            <div class="form-group">
                <label for="tertimbang_rr">Tertimbang</label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control" id="tertimbang_rr"
                        name="tertimbang_rr" value="{{ old('tertimbang_rr', $budget->tertimbang_rr ?? '') }}">
                    <span class="input-group-text">%</span>
                </div>
            </div>

            {{-- Realisasi Fisik --}}
            <h6 class="fw-bold mt-2">Realisasi Fisik</h6>
            <div class="form-group">
                <label for="volume_nominal_rf">Volume / Nominal</label>
                <input type="number" step="0.01" class="form-control" id="volume_nominal_rf"
                    name="volume_nominal_rf"
                    value="{{ old('volume_nominal_rf', $budget->volume_nominal_rf ?? '') }}">
            </div>
            <div class="form-group">
                <label for="satuan_rf">Satuan</label>
                <select class="form-select" id="satuan_rf" name="satuan_rf">
                    <option value="">Pilih Satuan</option>
                    @foreach ($satuan_rfList as $satuan_rf)
                        <option value="{{ $satuan_rf }}"
                            {{ old('satuan_rf', $budget->satuan_rf ?? '') == $satuan_rf ? 'selected' : '' }}>
                            {{ $satuan_rf }}
                        </option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="satuan_rf_baru" name="satuan_rf_baru"
                    value="{{ old('satuan_rf_baru', $budget->satuan_rf_baru ?? '') }}"
                    placeholder="Atau tambahkan satuan baru">
            </div>
            <div class="form-group">
                <label for="fisik_rf">Fisik</label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control" id="fisik_rf" name="fisik_rf"
                        value="{{ old('fisik_rf', $budget->fisik_rf ?? '') }}">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            <div class="form-group">
                <label for="tertimbang_rf">Tertimbang</label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control" id="tertimbang_rf"
                        name="tertimbang_rf" value="{{ old('tertimbang_rf', $budget->tertimbang_rf ?? '') }}">
                    <span class="input-group-text">%</span>
                </div>
            </div>

            {{-- Realisasi Keuangan --}}
            <h6 class="fw-bold mt-2">Realisasi Keuangan</h6>
            <div class="form-group">
                <label for="rupiah_rk">Rupiah</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" step="0.01" class="form-control" id="rupiah_rk" name="rupiah_rk"
                        value="{{ old('rupiah_rk', $budget->rupiah_rk ?? '') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="persentase_rk">Persentase</label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control" id="persentase_rk"
                        name="persentase_rk" value="{{ old('persentase_rk', $budget->persentase_rk ?? '') }}">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            <div class="form-group">
                <label for="tertimbang_rk">Tertimbang</label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control" id="tertimbang_rk"
                        name="tertimbang_rk" value="{{ old('tertimbang_rk', $budget->tertimbang_rk ?? '') }}">
                    <span class="input-group-text">%</span>
                </div>
            </div>

            {{-- Sisa Anggaran --}}
            <div class="form-group">
                <label for="sisa_anggaran">Sisa Anggaran</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" step="0.01" class="form-control" id="sisa_anggaran"
                        name="sisa_anggaran" value="{{ old('sisa_anggaran', $budget->sisa_anggaran ?? '') }}" />
                </div>
            </div>
        </div>
    </div>
    <div class="card-action">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('budgets.index') }}" class="btn btn-dark">Batal</a>
    </div>
</div>
