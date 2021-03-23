
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">

                    <div class="signup-form">
                        <p><img width="100px" src="<?= base_url() . 'assets/Gambar/Website/Title_SMA.png'; ?>"></p>
                        <p>
                            Selamat Datang di Sistem Pencatatan Ikatan Alumni
                            <br>
                            <br>
                            Silahkan isi data kalian, sesuai dengan syarat berikut ini:
                            <br>
                            <br>
                            <li> Masukkan Nama Panjang anda</li>
                            <br>
                            <li> Masukkan Email anda</li>
                            <br>
                            <li> Masukkan NIS anda</li>
                            <br>
                            <li> Masukkan Password 6 karakter atau lebih</li>
                            <br>
                            <b>
                                <font color="black" size="2px">Note : (<font color="red" size="4px">*</font>) wajib diisi</font>
                            </b>
                        </p>
                        <a href="<?= base_url() . 'Admin/login'; ?>" class="signup-image-link">I am already account</a>
                    </div>

                    <div class="signup-form">
                        <!-- Alert Nama Tidak Tersedia-->
                        <?php if ($this->session->flashdata('not_alumni') == TRUE) : ?>
                            <div class="alert alert-info alert-danger">
                                <a href="login" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <br>
                                <?php echo $this->session->flashdata('not_alumni'); ?>
                            </div>
                        <?php endif; ?>
                        <!----------------------->
                        <h2 class="form-title" style="margin-top: 40%; font-size: 28px">Registrasi Alumni</h2>
                        <form class="register-form" action="register" role="form" autocomplete="off" id="formlogin">


                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="no_induk"><i class="zmdi zmdi-account-box-mail"> </i>
                                            <font color="red" size="3px">*</font>
                                        </label>
                                        <input type="number" name="no_induk" id="no_induk" placeholder="NIS" value="<?= set_value('no_induk'); ?>" />
                                        <?= form_error('no_induk', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-sm" type="button" id="check-nis">Cek NIS</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i>
                                            
                                        </label>
                                        <input type="text" name="nama" id="name" placeholder="Nama" value="<?= set_value('nama'); ?>" disabled/>
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telfon"><i class="zmdi zmdi-phone"> </i>

                                        </label>
                                        <input type="number" name="no_telfon" id="no_telfon" placeholder="No Telfon" value="<?= set_value('no_telfon'); ?>" disabled/>
                                        <?= form_error('no_telfon', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"> </i>
                                    <font color="red" size="4px">*</font>
                                </label>
                                <input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>"/>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="btn-register" class="form-submit" value="Register" />
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>


<script>
    $(function() {

        var base_url = "<?php echo base_url() ?>";
        
        var btnRegister = $('#btn-register');

        // inisialisasi awal 
        btnRegister.val("Cari NIS terlebih dahulu");


        // event klik
        $('#check-nis').click(function() {

            // ambil nilai NIS
            let nis = $('input[name="no_induk"]').val();
            // nis = 1868135063

            // Pengecekan validasi
            if (nis.length > 0) {

                // proses pengecekan nis 
                $.ajax({

                    type: "GET", // type {GET, POST}
                    url: base_url + 'Admin/register/checkDataNIS', // link 
                    data: 'nis=' + nis, // data yang dikirim
                    dataType: "json",

                    success: function(result) { // hasil or result

                        // true (siswa ditemukan)
                        if (result.status) {


                            $('input[name="nama"]').val(result.data[0].nama);

                            $('input[name="no_telfon"]').val(result.data[0].no_telfon);
                            $('input[name="email"]').val(result.data[0].email);

                            $('input[name="no_induk"]').css('border-bottom', '2px solid green');

                            btnRegister.val("Registrasi Alumni Sekarang");
                        } else {


                            alert("Kosong atau nis tidak terdaftar");
                            $('input[name="no_induk"]').css('border-bottom', '1px solid red');
                        }

                    }

                });


                $('input[name="no_induk"]').css('border-bottom', '1px solid green');
            } else {

                $('input[name="no_induk"]').css('border-bottom', '1px solid red');
                
                Swal.fire({
                    icon: 'error',
                    title: 'Maaf',
                    text: 'Harap masukkan NIS Anda',
                    timer: 1000,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                        const content = Swal.getContent()
                        if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                            b.textContent = Swal.getTimerLeft()
                            }
                        }
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                })
            }

        });



        // click event btn register
        $('#formlogin').submit(function( e ) {

            var nis   = $('input[name="no_induk"]').val();
            var email = $('input[name="email"]').val();


            if ( (email.length > 0) && (nis.length > 0) ) {
            

                $.ajax({

                    type : "POST",
                    url  : base_url + 'Admin/register/prosesRegistrasiSiswa',
                    data : $(this).serialize(), // get all attribute name with value | no_induk=1868135063&email=ika@gmail.com
                    dataType : "json",

                    success: function( result ) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Registrasi Alumni',
                            html: 'Permintaan anda sedang diproses <br> <small>Selalu cek email <b>'+ email +'</b> untuk mengetahui hasil konfirmasi BK</small>',
                            showConfirmButton: true,
                        }).then( function( isConfirm ) {

                            window.location.href = base_url + 'User/dashboard_user';
                        } );
                    }
                });

                alert();


            } else {

                $('input[name="email"]').css('border-bottom', '1px solid red');
            }


            // disable refresh
            e.preventDefault();
        })
        

    });






    function myFunction() {
        var x = document.getElementById("myInput1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("myInput2");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>