<script src="<?= url() ?>assets/dashboard/lib/jquery/jquery.js"></script>
<script src="<?= url() ?>assets/dashboard/lib/jquery-ui/jquery-ui.js"></script>
<script src="<?= url() ?>assets/dashboard/lib/popper.js/popper.js"></script>
<script src="<?= url() ?>assets/dashboard/lib/bootstrap/bootstrap.js"></script>
<script src="<?= url() ?>assets/dashboard/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?= url() ?>assets/dashboard/lib/sweetalert/sweetalert.min.js"></script>
<script src="<?= url() ?>assets/dashboard/js/starlight.js"></script>
<script src="<?= url() ?>assets/script.js"></script>

<script>
    <?php if (isset($_SESSION['delete'])) : ?>
        Swal.fire({
            title: 'Deleted!',
            text: '<?= show_session_data('delete') ?>',
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
        })
    <?php endif ?>
    <?php if (isset($_SESSION['success'])) : ?>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: "<?= show_session_data('success') ?>"
        })
    <?php endif ?>
    <?php if (isset($_SESSION['error'])) : ?>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: "<?= show_session_data('error') ?>"
        })
    <?php endif ?>
</script>

</body>

</html>