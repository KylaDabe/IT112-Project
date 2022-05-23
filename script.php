<script >
		var navLinks = document.getElementById("navLinks");
		function showMenu(){
			navLinks.style.right = "0";
		}
		function hideMenu(){
			navLinks.style.right = "-200px";
		}
		function display(){
			document.forms['search_form_results'].action = 'studentinfo.php';
			document.forms['search_form_results'].submit();
		}
		function displayall(){
			document.forms['search_form_results'].action = 'studentinfo.php';
			document.forms['search_form_results'].submit();
		}
</script>
