<script type="text/javascript">

    function yesnoCheck() {
        if (document.getElementById("adminchk").selected) {
            document.getElementById("adminpass").style.display = "block";
			document.getElementById("adminpass").required = true;

		} else {
            document.getElementById("adminpass").style.display = "none";
			document.getElementById("adminpass").required = false;
        }
    }

</script>


<script type="text/javascript">
	
$(document).ready(function() {
  $('#reservations').DataTable();
});

</script>
