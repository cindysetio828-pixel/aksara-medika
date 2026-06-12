<div class="form-page-center">
    <div class="main-card">
        <div class="content">

            <div class="logo-box">
                <img src="<?= base_url('assets/img/aksara-medika-logo-transparan.png'); ?>" alt="Aksara Medika" class="logo-img">

                <h3>Form Pendaftaran Berobat</h3>
                <p>Isi data kunjungan dan pilih dokter spesialis yang ingin dikunjungi.</p>
            </div>

            <form action="<?= base_url('pasien/simpan-pendaftaran'); ?>" method="post">

                <div class="row g-3">

                    <div class="col-md-12">
                        <label class="form-label">Nama Pasien</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            value="<?= $this->session->userdata('nama_pasien'); ?>" 
                            readonly>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Pilih Dokter Spesialis</label>

                        <select name="id_dokter" class="form-select" required>
                            <option value="">-- Pilih Dokter --</option>

                            <?php foreach ($dokter as $d) : ?>
                                <option value="<?= $d->id_dokter; ?>">
                                    <?= $d->nama_dokter; ?> - <?= $d->spesialis; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Kunjungan</label>

                        <input 
                            type="date" 
                            name="tanggal_kunjungan" 
                            class="form-control" 
                            min="<?= date('Y-m-d'); ?>" 
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jam Kunjungan</label>

                        <input 
                            type="time" 
                            name="jam_kunjungan" 
                            class="form-control" 
                            required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Keluhan Penyakit</label>

                        <textarea 
                            name="keluhan" 
                            class="form-control" 
                            rows="4" 
                            placeholder="Contoh: Demam, pusing, batuk, nyeri perut, dan sebagainya." 
                            required></textarea>
                    </div>

                </div>

                <div class="row g-3 mt-4">
                    <div class="col-md-6">
                        <a href="<?= base_url('pasien/dashboard'); ?>" class="btn-back">
                            <i class="fa-solid fa-arrow-left me-1"></i>
                            Kembali ke Dashboard
                        </a>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-submit w-100">
                            <i class="fa-solid fa-paper-plane me-1"></i>
                            Kirim Pendaftaran
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>