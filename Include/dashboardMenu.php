<!DOCTYPE html>
<html>
<body>
<h1>Shivani</h1>
		    <ul id="Side_Menu" class="nav nav-pills nav-stacked">
		 		<li><a href=Dashboard.php>
		 		<span class="glyphicon glyphicon-th"></span>Dashboard</a></li>

		 		<li><a href="addNewPost.php">
		 		<span class="glyphicon glyphicon-list-alt"></span> 
		 		<button onclick="setActiveNewPost()">Add New Post</button></a></li>

		 		<li><a href="Categories.php">
		 		<span class="glyphicon glyphicon-tags"></span>  Categories</a></li>
		 		<li><a href="EditPost.php">
		 		<span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
		 		<li><a href=#>
		 		<span class="glyphicon glyphicon-user"></span> Manage Admin</a></li>
		 		<li><a href="Comments.php">
		 		<span class="glyphicon glyphicon-comment"></span> Comments</a></li>
		 		<li><a href=#>
		 		<span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
		 		<li><a href=#>
		 		<span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

			</ul>
<script>
function setActiveNewPost() {
    document.getElementById("demo").style.color = "red";
}
</script>

</body>
</html>
