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

    <!-- Tambahkan ini untuk enable ajax. Terus di dalam data untuk eksekusi ajax, tambahkan csrf_test_name: $.cookie('csrf_cookie_name')  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>


    <script>
        $(document).ready(function()
        {
            $('.checkRole').on('click', function(e)
            {
                e.preventDefault();
                const roleId= $(this).attr('data-roleID');
                const menuId= $(this).attr('data-menuID');

                $.ajax({
                    url:'<?php echo site_url('admin/changeAccess') ?>',
                    type:'POST',
                    data:{
                        idRole: roleId, idMenu:menuId, csrf_test_name: $.cookie('csrf_cookie_name')
                    },
                    success:function()
                    {
                        // Mari redirect dengan const roleId, bukan const idRole
                        document.location.href = "<?php echo base_url('admin/roleAccess/');?>"+roleId;
                    }
                })
            })
        })

        $('.imageEdit').change(function(e) { 
                var fileName = e.target.files[0].name; 
                $(".labelEditImage").html(fileName); 
  
        }); 
    </script>

</body>

</html>