  <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.5.1.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>

    <script>
        $(document).ready(function()
        {
            // Add cart
           $('.add_cart').on('click',function(e)
           {
                e.preventDefault();
                var idBarang= $(this).attr('data-idBarang');
                var namaBarang= $(this).attr('data-namaBarang');
                var photo= $(this).attr('data-photo');
                var harga= $(this).attr('data-harga');
                // Khusus stok, kita tambahkan "#" Apalagi kan id untuk ambil kode barang sudah dibuat jadi tinggal dipanggil saja
                var stok= $('#' + idBarang).val();
                var link = $('#csrf').val();
                var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
                var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

                var dataJson = { [csrfName]: csrfHash, link: link }


                if(stok != '' && stok > 0)
                {
                    $.ajax({
                        url:'<?php echo base_url('shoppingCart/add_cart') ?>',
                        method:"POST",
                        data:{
                            idBarang: idBarang, photo:photo, namaBarang: namaBarang, harga:harga, qty:stok, dataJson
                        },
                        success:function(data){
                            var obj = $('#detail_cart').html(data);
                            var new_hash=obj.csrfHash;
                            $('#csrf').val(new_hash);
                            // alert('Input stok anda melebihi batas maksimum!');
                            // data.available;
                            window.location.reload();
                        }
                    });
                }
                else
                {
                    alert('Please enter quantity');
                }
           });

           // function checkQty() { 
           //      //Grab current forms input field values.
           //      var id = $('.id').val();
           //      var qty = $('.qty').val();

           //      //Connect to database and verify Quantity Ordered isnt greater than Quantity In Stock.
           //      $.ajax({
           //          type: "POST",
           //          url: "<?php echo site_url('user/index') ?>",
           //          data: 'id=' + id + '&id=' + qty,
           //          }).done(function(data){
           //              alert('Stok melebihi batas max!')
           //              data.available;
           //          });            
           //  }


           // Delete Cart. Oh ya, khusus delete chart, kasih $(document).on('click','.hapus_cart',function(){}). Jangan langsung $(document).on('click') karena fungsi delete pasti tidak akan jalan
           $(document).on('click','.hapus_cart',function(e)
           {
                e.preventDefault();
                // Ambil atribut id yang memanggil field rowid di dalam cart
                var row_id = $(this).attr('id');
                $.ajax({
                    url:'<?php echo site_url('shoppingCart/delete_cart') ?>',
                    method:'POST',
                    data:{
                        rowid: row_id
                    },
                    success:function(data)
                    {
                        $('#detail_cart').html(data);
                        window.location.reload();
                    }
                })
           });

            // Load cart
           $('#detail_cart').load('<?php echo site_url('shoppingCart/load_cart') ?>');


        })
    </script>

</body>

</html>